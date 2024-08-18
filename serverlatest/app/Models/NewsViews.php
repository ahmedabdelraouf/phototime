<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsViews extends Model
{
    use HasFactory;
    protected $table = "newsviews";
    protected $guarded = ["id"];
}
