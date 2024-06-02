<?php

namespace App\Console\Commands;

use App\Models\Album;
use App\Models\AlbumImages;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SyncOldImages17 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:old-images17';

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
        $this->reorderAlbumImages();
        return 0;
    }

    function reorderAlbumImages()
    {

        $today = Carbon::today()->toDateString();

        $albumIds1 = \DB::table('album_images')
            ->select('album_id')
            ->distinct()
            ->whereDate('updated_at', '!=', $today)
            ->pluck('album_id');

        $albumIds2 = \DB::table('album_images')
            ->select('album_id')
            ->distinct()
            ->whereDate('updated_at', '=', $today)
            ->pluck('album_id');

        dd(count($albumIds1), count($albumIds2), Album::count());


        $dateThreshold = Carbon::createFromFormat('Y-m-d', '2024-05-31')->subDays(3);
        $albumIds = AlbumImages::where('updated_at', '<', $dateThreshold)->distinct()
            ->pluck("album_id");

        // Iterate through each album
        foreach ($albumIds as $albumId) {
            // Retrieve images for the current album ordered by 'order'
            $images = AlbumImages::where('album_id', $albumId)->orderBy('order')->get();

//dd($images[22]);
            // Calculate the new order for each image
            $imageCount = $images->count();
            foreach ($images as $image) {
                $newOrder = $imageCount - $image->order + 1; // Reverse the order
                $image->order = $newOrder;
                $image->save();
            }
            print_r("albumId is $albumId \n");
        }
        return 1;
    }

    public function getDate()
    {
        $date = \DB::table('synced_albums_dates')
            ->where('synced', 0)
            ->whereBetween('date', ["2017-01-01", "2017-12-01"])
            ->orderBy('date', 'asc')
            ->first();

        if ($date) {
            return $date->date;
        } else {
            print_r("no dates to be synced");
            die;
        }
    }

}
