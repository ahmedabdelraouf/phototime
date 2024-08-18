<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(string $id)
 */
class SocialMediaLink extends Model
{
    use HasFactory;

    protected $table = "social_media_links";
    protected $fillable = ["title", "url", "image", "is_active"];
}
