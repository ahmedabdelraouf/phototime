<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCmt extends Model
{
    use HasFactory;
    protected $table = "news_cmt";
    protected $guarded = ["id"];
}
