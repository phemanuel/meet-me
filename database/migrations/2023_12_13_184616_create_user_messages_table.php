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
        Schema::create('user_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('from_user_id');
            $table->integer('to_user_id');
            $table->string('from_user_email');
            $table->string('to_user_email');
            $table->string('from_user_fullname');
            $table->string('to_user_fullname');
            $table->string('from_user_type');
            $table->string('to_user_type');
            $table->text('message');
            $table->string('message_type');
            $table->string('message_status');
            $table->string('from_user_picture');
            $table->string('to_user_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_messages');
    }
};
