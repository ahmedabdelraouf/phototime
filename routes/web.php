<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'redirect_old_urls'], function () {
    Route::get('/', [HomeController::class, "homePage"])->name("home");
    Route::get('blogs', [HomeController::class, "blogs"])->name("blogs");
    Route::get('blog/{id}', [HomeController::class, "blogDetails"])->name("blogDetails");
    Route::get('categories', [HomeController::class, "categories"])->name("categories");
    Route::get('category-details/{id}', [HomeController::class, "categoryDetails"])->name("categoryDetails");
    Route::get('albums', [HomeController::class, "albums"])->name("albums");
    Route::get('album-details/{id}', [HomeController::class, "albumDetails"])->name("albumDetails");
    Route::get('youtube-channel', [HomeController::class, "youtubeChannel"])->name("youtubechannel");
    Route::get('youtube-channel-details/{id}', [HomeController::class, "youtubeChannelDetails"])->name("youtubeChannelDetails");
    Route::get('about-us', [HomeController::class, "aboutUs"])->name("about");
    Route::get('contact-us', [HomeController::class, "contactUs"])->name("contact");
    Route::post('contact-us', [HomeController::class, "postContactUs"])->name("contactUsPost");
    Route::get('/{slug}', [WebsiteController::class, "view"])->name("view_any");
//    Route::get('category-info/{category}', [WebsiteController::class, "categoryDetails"])->name("webCategoryDetails");
    Route::get('category-info/{category}', function (\App\Models\Category  $category){
        return view("site.modules.show_category", get_defined_vars());
    })->name("webCategoryDetails");
});
