<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateShortDescLinksInAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {

            // Update the links in the short_desc column
            DB::statement("
            UPDATE albums
            SET short_desc = REPLACE(short_desc, 'http://phototime21.com/files/newsimage/logo_png-012.png', 'https://phototime21.com/resources/dashboard/images/logo.svg')
        ");

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
            // Optionally, reverse the link update if necessary
            DB::statement("
            UPDATE albums
            SET short_desc = REPLACE(short_desc, 'https://phototime21.com/resources/dashboard/images/logo.svg', 'http://phototime21.com/files/newsimage/logo_png-012.png')
        ");
        });
    }
}
