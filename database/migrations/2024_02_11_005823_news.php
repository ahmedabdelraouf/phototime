<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->nullable();
            $table->text('body')->nullable();
            $table->string('newspic', 150)->nullable();
            $table->dateTime('date')->nullable();
            $table->tinyInteger('publish')->nullable();
            $table->integer('cat_id')->nullable();
            $table->integer('lang')->nullable();
            $table->integer('special')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('youtube_channels');
    }
}
