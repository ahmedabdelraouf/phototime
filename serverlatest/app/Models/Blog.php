<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blog extends Model
{
    protected $table = "blogs";
    protected $fillable = ["language", "type", "url", "title", "short_desc", "content",
        "meta_title", "meta_description","meta_keywords", "is_active","image"];

    const PAGE_TYPE_SLUG = 1;
    const PAGE_TYPE_MAIN_LINK = 2;
    const PAGE_TYPE_FULL_LINK = 3;
    const MODULE_NAME = "blog";

    function slugData(): HasOne
    {
        return $this->hasOne(SlugAlias::class, "module_id", "id")->where("module", self::MODULE_NAME);
    }
}
