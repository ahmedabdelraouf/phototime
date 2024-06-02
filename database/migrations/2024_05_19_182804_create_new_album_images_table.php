<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewAlbumImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_album_images', function (Blueprint $table) {
            $table->id();
            $table->integer("album_id");
            $table->string("image", 555);
            $table->integer("order")->nullable();
            $table->boolean("is_default")->default(false);
            $table->boolean("is_active")->default(true);
            $table->index(["album_id", "is_default", "is_active"]);
            $table->index(["album_id", "is_active"]);
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
        Schema::dropIfExists('new_album_images');
    }
}
