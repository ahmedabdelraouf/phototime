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
        Schema::create('slider_banners', function (Blueprint $table) {
            $table->id();
            $table->char("language",2)->index();
            $table->string("title", 255);
            $table->string("description", 255)->nullable();
            $table->string("image", 255);
            $table->string("url", 255)->nullable();
            $table->integer("order")->default(1);
            $table->boolean("is_active")->index()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_banners');
    }
};
