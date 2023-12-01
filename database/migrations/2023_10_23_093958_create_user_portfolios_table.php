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
        Schema::create('user_portfolios', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('file_name');
            $table->string('file_type');
            $table->string('file_url');
            $table->string('file_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_portfolios');
    }
};
