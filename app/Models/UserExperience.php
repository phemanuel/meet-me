<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    use HasFactory;

    //protected $table = 'user_experiences';
    protected $fillable = [        
        'user_id',
        'user_company',
        'company_year',
        'user_company_role',
        'user_about_role',       
        
    ]; 
}
