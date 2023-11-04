<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\WebsiteController;

Route::get('/', [HomeController::class, "homePage"])->name("home");
Route::get('About-Us.php', [HomeController::class, "homePage"])->name("about");
Route::get('/{id}/{slug}', [WebsiteController::class, "view"])->name("view_posts")->where('id', '[0-9]+');;
