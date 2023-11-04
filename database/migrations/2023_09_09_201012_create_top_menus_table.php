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
        Schema::create('top_menus', function (Blueprint $table) {
            $table->id();
            $table->integer("parent_id")->index();
            $table->string("title_en")->nullable();
            $table->string("title_ar");
            $table->string("a_title_en")->nullable();
            $table->string("a_title_ar");
            $table->string("url_en", 500)->nullable();
            $table->string("url_ar", 500);
            $table->boolean("is_active")->index()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_menus');
    }
};
