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
        Schema::create('album_categories', function (Blueprint $table) {
            $table->id();
            $table->integer("album_id");
            $table->integer("category_id")->index();
            $table->boolean("is_featured")->default(false);
            $table->timestamps();
            $table->index(["category_id", "is_featured"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_categories');
    }
};
