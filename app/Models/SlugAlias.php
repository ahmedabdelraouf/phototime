<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlugAlias extends Model
{
    protected $table = "slug_aliases";
    protected $fillable = ["module_id", "slug", "module"];

    const MODULE_NAME = "slugs";
}
