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
        $yesterday = Carbon::yesterday()->toDateString();
        $allOrdered = \DB::table('album_images')
            ->select('album_id')
            ->distinct()
            ->whereDate('updated_at', '=', $today) // For today
            ->orWhereDate('updated_at', '=', $yesterday) // For yesterday
            ->pluck('album_id');

        dd(count($allOrdered),Album::count());
        $notOrderedAlbumIds = \DB::table('album_images')
            ->select('album_id')
            ->distinct()
            ->whereDate('updated_at', '!=', $today) // For today
            ->WhereDate('updated_at', '!=', $yesterday) // For yesterday
            ->pluck('album_id');

        $orderedAlbumIds = \DB::table('album_images')
            ->select('album_id')
            ->distinct()
            ->whereDate('updated_at', '=', $today)
            ->orWhereDate('updated_at', '=', $yesterday)
            ->pluck('album_id');

// Find the repeated album IDs
        $repeatedAlbumIds = array_intersect($orderedAlbumIds->toArray(), $notOrderedAlbumIds->toArray());

// Remove the repeated album IDs from the ordered album IDs
        $albumIds = array_diff($notOrderedAlbumIds->toArray(), $repeatedAlbumIds);

        // Iterate through each album
        foreach ($albumIds as $albumId) {
            // Retrieve images for the current album ordered by 'order'
            $images = AlbumImages::where('album_id', $albumId)->orderBy('order')->get();
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