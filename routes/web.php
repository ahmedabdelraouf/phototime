<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "homePage"])->name("home");
Route::get('blogs', [HomeController::class, "blogs"])->name("blogs");
Route::get('blog/{id}', [HomeController::class, "blogDetails"])->name("blogDetails");
Route::get('categories', [HomeController::class, "categories"])->name("categories");
Route::get('albums', [HomeController::class, "albums"])->name("albums");
Route::get('album-details/{id}', [HomeController::class, "albumDetails"])->name("albumDetails");
Route::get('about-us', [HomeController::class, "aboutUs"])->name("about");
Route::get('contact-us', [HomeController::class, "contactUs"])->name("contact");
Route::post('contact-us', [HomeController::class, "postContactUs"])->name("contactUsPost");
Route::get('/{slug}', [WebsiteController::class, "view"])->name("view_any");
