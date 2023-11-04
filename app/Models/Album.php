<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Album extends Model
{
    protected $table = "albums";
    protected $fillable = ["menu_title", "title_en", "title_ar", "short_desc_en", "short_desc_ar", "content_en",
        "content_ar", "meta_title_en", "meta_title_ar", "meta_description_en", "meta_description_ar",
        "meta_keywords_en", "meta_keywords_ar", "is_active", "image"];

    const MODULE_NAME = "serv";
    function slugData(): HasOne
    {
        return $this->hasOne(SlugAlias::class, "module_id", "id")->where("module", self::MODULE_NAME."_ar");
    }
    function slugDataEn(): HasOne
    {
        return $this->hasOne(SlugAlias::class, "module_id", "id")->where("module", self::MODULE_NAME."_ar");
    }
    function slugDataAr(): HasOne
    {
        return $this->hasOne(SlugAlias::class, "module_id", "id")->where("module", self::MODULE_NAME."_ar");
    }

    function posts(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, "post_services", "service_id", "post_id");
    }

    function getTitleLangAttribute()
    {
        $title = $this->title_ar;
        if(strtolower(app()->getLocale()) == "en"){
            $title = $this->title_en;
        }
        return $title;
    }

    function getShortDescLangAttribute()
    {
        $title = $this->short_desc_ar;
        if(strtolower(app()->getLocale()) == "en"){
            $title = $this->short_desc_en;
        }
        return $title;
    }
}
