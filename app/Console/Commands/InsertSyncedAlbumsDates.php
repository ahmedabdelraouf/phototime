<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertSyncedAlbumsDates extends Command
{

    protected $signature = 'insert:synced-albums-dates {startYear : The start year} {endYear : The end year}';
    protected $description = 'Insert data into synced_albums_dates table for each month between the specified start and end years';

    public function handle()
    {
        $startYear = $this->argument('startYear');
        $endYear = $this->argument('endYear');

        $startDate = Carbon::create($startYear, 1, 1);
        $endDate = Carbon::create($endYear, 12, 1);
        DB::table('synced_albums_dates')->truncate();
        for ($currentDate = $startDate->copy(); $currentDate->lessThanOrEqualTo($endDate); $currentDate->addMonth()) {
            $formattedDate = $currentDate->format('Y-m-d');

            // Insert a new record for the start of the current month
            DB::table('synced_albums_dates')->insert([
                'date' => $formattedDate,
                'synced' => false,
            ]);

        }
        $this->info('Dates updated successfully.');
    }

    public function __construct()
    {
        parent::__construct();
    }

}
