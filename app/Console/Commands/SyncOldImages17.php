<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\AlbumsController;
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
        $AlbumsController = new AlbumsController();
        $date = $this->getDate();
        $AlbumsController->importOldNewsImagesToStorage($date);
        return 0;
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
