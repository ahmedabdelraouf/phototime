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
            // Add a temporary column
            $table->integer('temp_album_number')->nullable();
        });

        // Update the temporary column with the converted values only for valid integers
        DB::statement('UPDATE albums SET temp_album_number = CAST(album_number AS UNSIGNED) WHERE album_number REGEXP \'^[0-9]+$\'');

        // Optionally handle invalid entries, e.g., set to default value (0)
        DB::statement('UPDATE albums SET temp_album_number = 0 WHERE album_number IS NULL OR album_number REGEXP \'[^0-9]\';');

        Schema::table('albums', function (Blueprint $table) {
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
            // Add the original column back
//            $table->text('album_number')->nullable();
        });

        // Optionally reverse the data conversion if necessary
        DB::statement('UPDATE albums SET album_number = CAST(temp_album_number AS CHAR)');

        Schema::table('albums', function (Blueprint $table) {
            // Drop the temporary column
            $table->dropColumn('album_number');
        });
    }
}
