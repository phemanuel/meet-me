<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUpskill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_logo',
        'upskill_name',
        'upskill_description',
        'upskill_status',
        'upskill_category',
        'upskill_link',
        'no_of_views',
        'upskill_apply',
    ];
}
