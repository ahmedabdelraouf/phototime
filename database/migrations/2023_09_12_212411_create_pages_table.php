<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->char("language", 2);
            $table->integer("type");
            $table->string("url")->nullable();
            $table->string("title");
            $table->string("short_desc",500)->nullable();
            $table->longText("content")->fulltext()->nullable();
            $table->string("meta_title")->nullable();
            $table->string("meta_description")->nullable();
            $table->text("meta_keywords")->fulltext()->nullable();
            $table->boolean("is_active")->index()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};