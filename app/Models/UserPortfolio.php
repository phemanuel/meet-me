<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPortfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_name',
        'file_url',
        'file_description',
        'file_type',       
        
    ];
}
