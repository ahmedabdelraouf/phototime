<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ["title_en", "title_ar", "short_desc_en", "short_desc_ar", "meta_title_en", "meta_title_ar",
        "meta_description_en", "meta_description_ar", "meta_keywords_en", "meta_keywords_ar", "is_active", "image"];

    const MODULE_NAME = "categories";

    function slugData(): HasOne
    {
        return $this->hasOne(SlugAlias::class, "module_id", "id")->where("module", self::MODULE_NAME."_" . strtolower(app()->getLocale()));
    }

    function slugDataEn(): HasOne
    {
        return $this->hasOne(SlugAlias::class, "module_id", "id")->where("module", self::MODULE_NAME."_en");
    }

    function slugDataAr(): HasOne
    {
        return $this->hasOne(SlugAlias::class, "module_id", "id")->where("module", self::MODULE_NAME."_ar");
    }

    function albums(): HasMany
    {
        return $this->hasMany(CategoryAlbum::class, "category_id", "id");
    }
}
