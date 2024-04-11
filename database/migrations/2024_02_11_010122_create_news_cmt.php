<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCmt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('news_cmt', function (Blueprint $table) {
//            $table->id();
//            $table->string('name', 500)->nullable();
//            $table->string('email', 500)->nullable();
//            $table->string('phone', 200)->nullable();
//            $table->text('body')->nullable();
//            $table->integer('flag')->nullable();
//            $table->dateTime('date')->nullable();
//            $table->integer('news_id')->nullable();
//            $table->integer('parent_id')->nullable();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_cmt');
    }
}
