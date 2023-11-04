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
        Schema::create('album_images', function (Blueprint $table) {
            $table->id();
            $table->integer("album_id");
            $table->string("image", 255);
            $table->boolean("is_default")->default(false);
            $table->boolean("is_active")->default(true);
            $table->timestamps();
            $table->index(["album_id", "is_default", "is_active"]);
            $table->index(["album_id", "is_active"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_images');
    }
};
