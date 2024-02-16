<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\AlbumsController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\MeController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderBannersController;
use App\Http\Controllers\Admin\SocialMediaLinkController;
use App\Http\Controllers\Admin\SuccessPartnersController;
use App\Http\Controllers\Admin\TopMenuController;
use App\Http\Controllers\Admin\YoutubeChannelController;
use Illuminate\Support\Facades\Route;


Route::get("/", [MeController::class, "homepage"])->middleware("should_login")->name("home");

Route::as("auth.")->group(function () {
    Route::get("logout", [AuthenticationController::class, "logout"])
        ->middleware("should_login")->name("logout");
    Route::get("login", [AuthenticationController::class, "login"])
        ->middleware("should_guest")->name("login");
    Route::post("login", [AuthenticationController::class, "doLogin"])
        ->middleware("should_guest")->name("do_login");
});

Route::prefix("categories")->as("categories.")->middleware("should_login")->group(function () {
    Route::get("/", [CategoriesController::class, "listData"])->name("list");
    Route::get("create", [CategoriesController::class, "create"])->name("create");
    Route::post("create", [CategoriesController::class, "store"])->name("do_create");
    Route::get("edit/{id}", [CategoriesController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [CategoriesController::class, "update"])->name("do_edit");
    Route::get("update-status/{type}/{id}", [CategoriesController::class, "updateStatus"])->name("update_status");
});

Route::prefix("albums")->as("albums.")->middleware("should_login")->group(function () {
    Route::get("/", [AlbumsController::class, "listData"])->name("list");
    Route::get("create", [AlbumsController::class, "create"])->name("create");
    Route::post("create", [AlbumsController::class, "store"])->name("do_create");
    Route::get("images/{id}", [AlbumsController::class, "addImages"])->name("addImages");
    Route::post("images/{id}", [AlbumsController::class, "uploadImages"])->name("uploadImages");
    Route::post("images/set-default/{album_id}/{id}", [AlbumsController::class, "uploadImages"])->name("update_image_default");
    Route::post("update-images-settings", [AlbumsController::class, "updateImagesSettings"])->name("update_images_settings");
    Route::get("edit/{id}", [AlbumsController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [AlbumsController::class, "update"])->name("do_edit");
    Route::get("update-status/{type}/{id}", [AlbumsController::class, "updateStatus"])->name("update_status");
    Route::get("update-featured-status/{type}/{id}", [AlbumsController::class, "updateFeaturedStatus"])->name("update_featured_status");
    Route::get("delete/{album}", [AlbumsController::class, "deleteAlbum"])->name("delete");
    Route::post('/dropzone/upload', [AlbumsController::class, 'uploadDropzone'])->name("albums.uploadDropzone");;
});

Route::prefix("top-menu")->as("menus.")->middleware("should_login")->group(function () {
    Route::get("/", [TopMenuController::class, "listData"])->name("list");
    Route::get("create", [TopMenuController::class, "create"])->name("create");
    Route::post("create", [TopMenuController::class, "store"])->name("do_create");
    Route::get("edit/{id}", [TopMenuController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [TopMenuController::class, "update"])->name("do_edit");
    Route::get("update-status/{type}/{id}", [TopMenuController::class, "updateStatus"])->name("update_status");
});

Route::prefix("slider-banners")->as("sliders.")->middleware("should_login")->group(function () {
    Route::get("/", [SliderBannersController::class, "listData"])->name("list");
    Route::get("create", [SliderBannersController::class, "create"])->name("create");
    Route::post("create", [SliderBannersController::class, "store"])->name("do_create");
    Route::get("edit/{id}", [SliderBannersController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [SliderBannersController::class, "update"])->name("do_edit");
    Route::get("update-status/{type}/{id}", [SliderBannersController::class, "updateStatus"])->name("update_status");
});

Route::prefix("pages")->as("pages.")->middleware("should_login")->group(function () {
    Route::get("/", [PagesController::class, "listData"])->name("list");
    Route::get("create", [PagesController::class, "create"])->name("create");
    Route::post("create", [PagesController::class, "store"])->name("do_create");
    Route::get("edit/{id}", [PagesController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [PagesController::class, "update"])->name("do_edit");
    Route::get("update-status/{type}/{id}", [PagesController::class, "updateStatus"])->name("update_status");
});

Route::prefix("social-media")->as("socialMedia.")->middleware("should_login")->group(function () {
    Route::get("/", [SocialMediaLinkController::class, "listData"])->name("list");
    Route::get("create", [SocialMediaLinkController::class, "create"])->name("create");
    Route::post("create", [SocialMediaLinkController::class, "store"])->name("do_create");
    Route::get("edit/{id}", [SocialMediaLinkController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [SocialMediaLinkController::class, "update"])->name("do_edit");
    Route::get("update-status/{type}/{id}", [SocialMediaLinkController::class, "updateStatus"])->name("update_status");
});

Route::prefix("success-partners")->as("successPartners.")->middleware("should_login")->group(function () {
    Route::get("/", [SuccessPartnersController::class, "listData"])->name("list");
    Route::get("create", [SuccessPartnersController::class, "create"])->name("create");
    Route::post("create", [SuccessPartnersController::class, "store"])->name("do_create");
    Route::get("edit/{id}", [SuccessPartnersController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [SuccessPartnersController::class, "update"])->name("do_edit");
    Route::get("update-status/{type}/{id}", [SuccessPartnersController::class, "updateStatus"])->name("update_status");
});

Route::prefix("blog")->as("blog.")->middleware("should_login")->group(function () {
    Route::get("/", [BlogController::class, "listData"])->name("list");
    Route::get("create", [BlogController::class, "create"])->name("create");
    Route::post("create", [BlogController::class, "store"])->name("do_create");
    Route::get("edit/{id}", [BlogController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [BlogController::class, "update"])->name("do_edit");
    Route::get("update-status/{type}/{id}", [BlogController::class, "updateStatus"])->name("update_status");
});

Route::prefix("roles")->as("roles.")->middleware("should_login")->group(function () {
    Route::get("/", [RolesController::class, "listData"])->name("list");
    Route::get("create", [RolesController::class, "create"])->name("create");
    Route::post("create", [RolesController::class, "store"])->name("do_create");
    Route::get("edit/{id}", [RolesController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [RolesController::class, "update"])->name("do_edit");
});

Route::prefix("admins")->as("admins.")->middleware("should_login")->group(function () {
    Route::get("/", [AdminsController::class, "listData"])->name("list");
    Route::get("create", [AdminsController::class, "create"])->name("create");
    Route::post("create", [AdminsController::class, "store"])->name("do_create");
    Route::get("edit/{id}", [AdminsController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [AdminsController::class, "update"])->name("do_edit");
    Route::get("update-status/{type}/{id}", [AdminsController::class, "updateStatus"])->name("update_status");
});

Route::prefix("settings")->as("settings.")->middleware("should_login")->group(function () {
    Route::get('/', [SettingsController::class, 'index'])->name('index');
    Route::post('/', [SettingsController::class, 'update'])->name('update');
});

Route::prefix("youtube-channel")->as("youtubeChannel.")->middleware("should_login")->group(function () {
    Route::get("/", [YoutubeChannelController::class, "listData"])->name("list");
    Route::get("create", [YoutubeChannelController::class, "create"])->name("create");
    Route::post("create", [YoutubeChannelController::class, "store"])->name("do_create");
    Route::get("edit/{id}", [YoutubeChannelController::class, "edit"])->name("edit");
    Route::post("edit/{id}", [YoutubeChannelController::class, "update"])->name("do_edit");
    Route::get("update-status/{type}/{id}", [YoutubeChannelController::class, "updateStatus"])->name("update_status");
});