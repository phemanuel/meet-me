<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'user_about',
        'country_code',
        'user_phone',
        'user_facebook',
        'user_instagram',
        'user_twitter',
        'user_linkedin',
        'user_url',
        'user_picture',
        'profile_picture',
        'user_name',
        'user_name_link',
        'email_verified_at',
        'email_verified_status',
        'remember_token',
        'user_roles',
        'user_role_major',
        'login_attempts',
        'user_category',
        'user_type',
        
    ];    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'user_roles' => 'array',
    ];
}
