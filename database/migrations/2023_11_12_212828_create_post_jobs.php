<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('company_name');
            $table->string('company_logo');
            $table->string('job_name');
            $table->text('job_description');
            $table->string('job_status');
            $table->string('job_category');
            $table->string('job_type');
            $table->string('job_payment');
            $table->string('job_payment_method')->nullable();
            $table->string('job_link')->nullable();
            $table->string('job_location');
            $table->integer('no_of_views')->nullable();
            $table->integer('job_apply')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_jobs');
    }
};
