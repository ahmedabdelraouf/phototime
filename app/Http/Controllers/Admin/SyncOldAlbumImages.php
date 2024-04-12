<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\AlbumImages;
use App\Models\BlogImage;

trait SyncOldAlbumImages
{
    public function getAlbumOldImages($albumId)
    {
        $albumImages = BlogImage::where("blog_id", $albumId)->get();
        $resultArrayImages = [];

        // Base URL of the website
        $baseUrl = 'https://www.phototime21.com';
// Directory where the images are stored
//        $directory = dirname($_SERVER['SCRIPT_NAME']) . 'files/newsimage/';
        $directory = '/files/newsimage/';
        foreach ($albumImages as $row) {
            $image["name"] = $row->path;
            $image["url"] = $baseUrl . $directory . $row->path;
            $resultArrayImages[] = $image;
        }
        return $resultArrayImages;
    }

    public function importOldNewsImagesToGoogle()
    {
        $allAlbums = Album::limit(1)->where("is_synced", 0)->orderBy("photo_date", "ASC")->get();

//        dd($allAlbums);
        //        $allAlbums = Album::where("id", 4)->get();
        foreach ($allAlbums as $album) {
            print_r(" \n Start import for album ID = $album->id \n");
            $resultArrayImages = $this->getAlbumOldImages($album->id);
            $folderDirectory = $this->GSC->getAlbumFolderPath($album, "photo_date");
            foreach ($resultArrayImages as $image) {
                $gcsDUrl = $this->GSC->uploadImageToGCSFromURL($image["url"], $image["name"], $folderDirectory);
                if (!empty($gcsDUrl)) {
                    $countAlbumImages = count($album->images);
                    $album_images = new AlbumImages();
                    $album_images->album_id = $album->id;
                    $album_images->image = $gcsDUrl;
                    $album_images->is_default = 0;
                    $album_images->is_active = 1;
                    $album_images->order = 1 + $countAlbumImages;
                    $album_images->save();
                }
            }
            $album->is_synced = true;
            $album->save();
            print_r("Data imported for album ID = $album->id ** ");
        }
    }


}