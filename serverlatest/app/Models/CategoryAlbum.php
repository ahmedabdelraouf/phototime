<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryAlbum extends Model
{
    protected $table = "album_categories";
    protected $fillable = ["album_id", "category_id", "is_featured"];

    function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, "album_id", "id");
    }
}
