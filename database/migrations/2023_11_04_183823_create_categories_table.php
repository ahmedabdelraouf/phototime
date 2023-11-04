<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("title_ar", 255);
            $table->string("title_en")->nullable();
            $table->string("short_desc_ar", 255);
            $table->string("short_desc_en", 255)->nullable();
            $table->string("meta_title_ar")->nullable();
            $table->string("meta_title_en")->nullable();
            $table->string("meta_description_ar")->nullable();
            $table->string("meta_description_en")->nullable();
            $table->text("meta_keywords_ar")->fulltext()->nullable();
            $table->text("meta_keywords_en")->fulltext()->nullable();
            $table->string("image", 255)->nullable();
            $table->boolean("is_active")->index()->default(true);
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
        Schema::dropIfExists('categories');
    }
}
