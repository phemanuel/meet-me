<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'from_user_email',
        'to_user_email',
        'from_user_fullname',
        'to_user_fullname',
        'from_user_type',
        'to_user_type',
        'message',
        'message_type',
        'message_status',
        'from_user_picture',
        'to_user_picture',
    ];
}
