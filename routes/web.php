<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\WebsiteController;

Route::get('/', [HomeController::class, "homePage"])->name("home");
Route::get('about-us', [HomeController::class, "aboutUs"])->name("about");
Route::get('contact-us', [HomeController::class, "contactUs"])->name("contact");
Route::post('contact-us', [HomeController::class, "postContactUs"])->name("contactUsPost");
Route::get('/{slug}', [WebsiteController::class, "view"])->name("view_posts");
