<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AdminSessions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model {

    use HasFactory,HasRoles;

    protected $table = "admins";
    protected $fillable = ["name", "email", "password", "is_active"];

    protected $guard_name = 'web';

    public function adminSessions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AdminSessions::class, "admin_id");
    }

    public function scopeActive($query) {
        return $query->where('is_active', 1);
    }

}
