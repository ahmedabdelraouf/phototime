<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ["title", "short_desc", "meta_title", "meta_description", "meta_keywords", "is_active", "image", "order"];

    const MODULE_NAME = "categories";

    function slugData(): HasOne
    {
        return $this->hasOne(SlugAlias::class, "module_id", "id")->where("module", self::MODULE_NAME);
    }

    function albums(): HasMany
    {
        return $this->hasMany(CategoryAlbum::class, "category_id", "id");
    }
}
