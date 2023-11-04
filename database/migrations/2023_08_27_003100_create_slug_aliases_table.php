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
        Schema::create('slug_aliases', function (Blueprint $table) {
            $table->id();
            $table->integer("module_id")->index();
            $table->string("slug")->index();
            $table->string("module",20)->index();
            $table->timestamps();
            $table->unique(["slug", "module"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slug_aliases');
    }
};
