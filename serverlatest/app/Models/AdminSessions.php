<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSessions extends Model
{
    use HasFactory;

    protected $table = 'admin_sessions';

    protected $fillable = [];

    public function adminActive(){
        return $this->belongsTo(Admin::class, "admin_id")->active();
    }

    public function admin(){
        return $this->belongsTo(Admin::class, "admin_id");
    }
}
