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
            $table->text("title")->nullable();
            $table->longText("short_desc")->nullable();
            $table->date("photo_date")->nullable();
            $table->text("photo_owner_name")->nullable();
            $table->text("photo_place")->nullable();
            $table->text("meta_title")->nullable();
            $table->text("meta_description")->nullable();
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
