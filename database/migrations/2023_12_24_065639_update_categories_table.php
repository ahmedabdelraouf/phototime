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
        Schema::dropIfExists('categories');
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255);
            $table->string("short_desc", 255);
            $table->string("meta_title")->nullable();
            $table->string("meta_description")->nullable();
            $table->text("meta_keywords")->fulltext()->nullable();
            $table->string("image", 255)->nullable();
            $table->boolean("is_active")->index()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
