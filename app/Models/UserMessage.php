<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserMessage extends Model
{
    protected $table = "user_messages";
    protected $fillable = ["type", "user_full_name", "user_email", "user_phone_number", "subject", "message"];

    const TYPE_CONTACT_US = "contact_us";
}
