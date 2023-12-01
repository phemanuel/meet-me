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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->json('user_roles')->nullable();
            $table->string('user_roles_major')->nullable();
            $table->text('user_about')->nullable();
            $table->string('user_facebook')->unique()->nullable();
            $table->string('user_twitter')->unique()->nullable();
            $table->string('user_linkedin')->unique()->nullable();
            $table->string('user_instagram')->unique()->nullable();
            $table->string('country_code')->nullable();
            $table->string('user_phone')->unique()->nullable();
            $table->string('user_picture')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('user_url')->nullable();  
            $table->integer('email_verified_status')->nullable();  
            $table->string('user_name')->unique()->nullable();  
            $table->string('user_name_link')->unique()->nullable(); 
            $table->string('user_type');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
