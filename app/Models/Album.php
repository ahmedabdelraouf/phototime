<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Album extends Model
{
    protected $table = "albums";
    protected $fillable = ["menu_title", "title", "short_desc", "meta_title", "photo_date",
        "photo_owner_name", "photo_place", "meta_description", "meta_keywords",
        "is_active", "image", "youtube_url", "is_featured", "owner_phone", "views_count"];

    const MODULE_NAME = "album";

    /**
     * Retrieve the slug data for this instance.
     *
     * @return HasOne The relationship between the current instance and the slug data.
     */
    function slugData(): HasOne
    {
        return $this->hasOne(SlugAlias::class, "module_id", "id")->where("module", self::MODULE_NAME);
    }

    /**
     * Retrieve the categories for this instance.
     *
     * @return BelongsToMany The relationship between the current instance and the categories.
     */
    function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, "album_categories", "album_id", "category_id");
    }

    /**
     * Retrieve the images associated with this album.
     *
     * @return HasMany The relationship between the current album and its images.
     */
    function images(): HasMany
    {
        return $this->hasMany(AlbumImages::class, "album_id")->orderBy("is_default", "DESC");
    }

    /**
     * Retrieve the default image(s) for this instance.
     *
     * @return HasMany The relationship between the current instance and the default image(s).
     */
    public function defaultImage(): HasMany
    {
        return $this->hasMany(AlbumImages::class, "album_id")
            ->where("is_default", 1);
    }
}
