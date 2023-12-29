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
        Schema::table('albums', function (Blueprint $table) {
            $table->text("owner_phone")->nullable();
            $table->text("youtube_url")->nullable();
            $table->unsignedInteger("views_count")->nullable()->default(0);
            $table->boolean("is_featured")->nullable()->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('albums', function (Blueprint $table) {});
    }
};
