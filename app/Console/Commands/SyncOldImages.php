<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\AlbumsController;
use Illuminate\Console\Command;

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
        $AlbumsController = new AlbumsController();
        $AlbumsController->importOldNewsImagesToGoogle();
        return 0;
    }
}