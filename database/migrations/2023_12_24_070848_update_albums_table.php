<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('albums');
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255);
            $table->longText("short_desc");
            $table->date("photo_date");
            $table->string("photo_owner_name", 255);
            $table->string("photo_place", 255);
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
        //
    }
};
