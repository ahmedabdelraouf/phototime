<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryImage extends Model
{
    use HasFactory;

    protected $fillable = ["category_id", "image"];

    function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id");
    }
}
