<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SliderBanner extends Model
{
    protected $table = "slider_banners";
    protected $fillable = ["language","title", "description", "url", "image", "order", "is_active"];

    const MODULE_NAME = "banner";
}
