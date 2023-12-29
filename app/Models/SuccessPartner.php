<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessPartner extends Model
{
    use HasFactory;

    protected $table = "success_partners";
    protected $fillable = ["title", "url", "image", "is_active"];
}
