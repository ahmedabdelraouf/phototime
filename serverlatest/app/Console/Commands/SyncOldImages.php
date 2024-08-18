<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\AlbumsController;
use App\Models\Album;
use Illuminate\Console\Command;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class SyncOldImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:old-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->syncDefaultImages();
        return 0;
    }

    function syncDefaultImages(): bool
    {
        $albums = Album::where('is_default_image_synced',false)->take(200)->get();
        $baseUrl = 'http://www.choemregdcdima.org/files/news/';
        foreach ($albums as $album) {
            $albumDefaultImageUrl = $baseUrl . $album->default_image;
            try {
                $albumDefaultImage = file_get_contents($albumDefaultImageUrl);
            } catch (\Exception $e) {
                continue;
            }
            if ($albumDefaultImage !== false) {
                $imageName = $album->default_image;
                $imagePath = "public/images/albums/$album->id";
                if (!Storage::exists($imagePath)) {
                    Storage::makeDirectory($imagePath);
                }
                // Store the image
                Storage::put("$imagePath/$imageName", $albumDefaultImage);
                // Update the album's default image path
                $album->default_image = $imageName;
                $album->is_default_image_synced = true;
                $album->save();
                print_r( "Album $album->id default image has been synced \n");
            }

        }
        return true;
    }

    public function getDate()
    {
        $date = \DB::table('synced_albums_dates')
            ->where('synced', 0)
            ->whereBetween('date', ["2024-01-01", "2024-12-01"])
            ->orderBy('date', 'asc')
            ->first();

        if ($date) {
            return $date->date;
        } else {
            print_r("no dates to be synced 24 \n");
            die;
        }
    }

}
