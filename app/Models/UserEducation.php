<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    use HasFactory;

    protected $fillable = [        
        'user_id',
        'college_name',
        'college_year',
        'college_qualification',
        'college_certificate',
        
    ]; 
}
