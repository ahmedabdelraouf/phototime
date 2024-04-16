<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\AlbumImages;
use App\Models\BlogImage;
use GuzzleHttp\Client;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

trait SyncOldAlbumImages
{
    public function getAlbumOldImages($albumId)
    {
//        $albumImages = BlogImage::where("blog_id", $albumId)->limit(60)->get();
        $albumImages = BlogImage::where("blog_id", $albumId)->where("is_synced", 0)
            ->limit(70)->orderBy("id", "DESC")->get();
        $resultArrayImages = [];

        // Base URL of the website
        $baseUrl = 'https://www.phototime21.com';
// Directory where the images are stored
//        $directory = dirname($_SERVER['SCRIPT_NAME']) . 'files/newsimage/';
        $directory = '/files/newsimage/';
        $count = count($albumImages);
        print_r(" \n Total images for album is =  $count \n");
        foreach ($albumImages as $row) {
            $image["id"] = $row->id;
            $image["name"] = $row->path;
            $image["url"] = $baseUrl . $directory . $row->path;
            $resultArrayImages[] = $image;
        }
        return $resultArrayImages;
    }

    public function downloadFileFromURL($url)
    {
        $client = new Client();
        $response = $client->get($url);

        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else {
            \Log::info("failed for image url $url");
            return null;
        }
    }

    public function uploadImageToS3FromURL($url, $fileNameWithExt, $folderDirectory)
    {
        \Log::info("url for image $url");
        try {
            // Download the file from the URL
            $fileContents = $this->downloadFileFromURL($url);
            if ($fileContents === null) {
                // Handle error
                return null;
            }
//            // Download the file from the URL
//            $fileContents = file_get_contents($url);
            // Generate a unique file name with the original extension
            $fileName = $fileNameWithExt;
            // Store the file in a temporary location
            $tempFilePath = tempnam(sys_get_temp_dir(), 'tempfile');
            file_put_contents($tempFilePath, $fileContents);
            // Create a new Laravel File instance from the temporary file
            $file = new File($tempFilePath);
            // Upload the file to AWS S3
            $path = Storage::disk('s3')->putFileAs($folderDirectory, $file, $fileName, 'public');
            // Delete the temporary file
            unlink($tempFilePath);
            return $path;
        } catch (Exception $exception) {
            \Log::info("failed for image $url");
        }
    }

    public function importOldNewsImagesToStorage($date)
    {
        print_r(" \n Start import for Yearly-monthly date = $date \n");
        ini_set('memory_limit', '1024M');// Set memory limit to 256M
        ini_set('max_execution_time', 300);// Set max execution time to 300 seconds (5 minutes)
//       print_r(" No pending data for this date \n");
        $allAlbums = Album::whereYear('photo_date', substr($date, 0, 4))
            ->whereMonth('photo_date', substr($date, 5, 2)) // Month 1 represents January
            ->where('is_old', 1)
            ->where('is_synced', 0)
//            ->where('id', 4)
            ->limit(2)
            ->orderBy('photo_date', 'ASC')
            ->get();

        if (count($allAlbums) == 0) {
            $this->updateSyncedYearMonth($date);
            print_r(" No pending data for this date \n");
            die;
        }
        foreach ($allAlbums as $album) {
            print_r(" \n Start import for album ID = $album->id \n");
            $resultArrayImages = $this->getAlbumOldImages($album->id);
            $folderDirectory = $this->getAlbumFolderPath($album, "photo_date");
            $countAlbumImages = count($album->images);
            foreach ($resultArrayImages as $index => $image) {
                $imageName = $image['name'];
                // Extract the file extension from the original image name
                $extension = pathinfo($imageName, PATHINFO_EXTENSION);
                $uniqueID = uniqid();
                $newImageName = $uniqueID . '.' . $extension;
//                dd($newImageName);
//                $path = Storage::disk('s3')->putFileAs($folderDirectory, $file, $filename, "public");
                $s3Path = $this->uploadImageToS3FromURL($image["url"], $newImageName, $folderDirectory);
                $num = $index + 1;
                $ndt = now();
                $val = $ndt->format("Y-m-d H:i:s");
                print_r(" Import for Number $num Image $newImageName DateTime is $val  \n");
                if (!empty($s3Path)) {
                    $album_images = new AlbumImages();
                    $album_images->album_id = $album->id;
                    $album_images->image = $s3Path;
                    $album_images->is_default = 0;
                    $album_images->is_active = 1;
                    $album_images->order = $index + $countAlbumImages;
                    $album_images->save();
                    DB::table('blog_images')
                        ->where('id', $image['id'])
                        ->update(['is_synced' => true]);
                }
            }
            $countNotSynced = BlogImage::where("blog_id", $album->id)->where("is_synced", 0)->count();
            if ($countNotSynced == 0) {
                print_r(" Data imported for album ID = $album->id ** \n");
                $album->is_synced = true;
                $album->save();
            }
        }

        $remainingALbumsForMonth = Album::whereYear('photo_date', substr($date, 0, 4))
            ->whereMonth('photo_date', substr($date, 5, 2))
            ->where('is_synced', 0)->count();

        if ($remainingALbumsForMonth == 0) {
            $this->updateSyncedYearMonth($date);
        }
    }

    public function updateSyncedYearMonth($date)
    {
        DB::table('synced_albums_dates')->where('date', $date)->update(['synced' => 1]);
    }


}
