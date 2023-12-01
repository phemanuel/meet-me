<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostJobs extends Model
{
    use HasFactory;

    //protected $table = 'post_job';
    protected $fillable = [
        'user_id',
        'company_name',
        'company_logo',
        'job_name',
        'job_description',
        'job_status',
        'job_category',
        'job_type',
        'job_payment',
        'job_payment_method',
        'job_link',
        'job_location',
        'no_of_views',
        'job_apply',
    ];
}
