<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AdminSessions;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

    use HasFactory;

    protected $table = "admins";
    protected $fillable = ["name", "email", "password", "is_active"];

    public function adminSessions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AdminSessions::class, "admin_id");
    }

    public function scopeActive($query) {
        return $query->where('is_active', 1);
    }

}
