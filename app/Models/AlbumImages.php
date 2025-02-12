<?php

namespace App\Models;

use App\GoogleServicesController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlbumImages extends Model
{
    protected $table = "album_images";
    protected $fillable = ["album_id", "image", "is_default", "is_active"];

    function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, "album_id");
    }

//    public function getImageAttribute($value)
//    {
//        return (new GoogleServicesController())->getFileByPathAndName($value);
//    }
}
