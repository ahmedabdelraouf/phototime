<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAlbumNumberColumnTypeInAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {

            // Update the temporary column with the converted values
            DB::statement('UPDATE albums SET temp_album_number = CAST(album_number AS UNSIGNED)');

            // Drop the original column
            $table->dropColumn('album_number');

            // Rename the temporary column to the original column name
            $table->renameColumn('temp_album_number', 'album_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {
            // Revert changes
            $table->text('album_number')->nullable();

            // You may need to handle data conversion back to TEXT if necessary
            // $table->dropColumn('album_number');
            // $table->renameColumn('album_number', 'temp_album_number');
            // $table->text('album_number')->nullable();
            // DB::statement('UPDATE albums SET album_number = CAST(temp_album_number AS CHAR)');
            // $table->dropColumn('temp_album_number');
        });
    }
}
