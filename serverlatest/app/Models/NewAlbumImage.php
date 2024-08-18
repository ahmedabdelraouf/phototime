<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewAlbumImage extends Model
{
    use HasFactory;

    protected $table = "new_album_images";
    protected $fillable = ["album_id", "image", "is_default", "is_active", "order"];

    function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, "album_id");
    }
}
