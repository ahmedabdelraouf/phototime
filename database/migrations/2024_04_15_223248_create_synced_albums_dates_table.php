<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyncedAlbumsDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('synced_albums_dates', function (Blueprint $table) {
            $table->id();
            $table->string('date'); // Text field to store date in the format "YYYY-MM"
            $table->boolean('synced')->default(false); // Boolean field to indicate if synced or not
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('synced_albums_dates');
    }
}
