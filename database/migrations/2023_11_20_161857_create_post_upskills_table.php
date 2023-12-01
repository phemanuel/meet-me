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
        Schema::create('post_upskills', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('company_name');
            $table->string('company_logo');
            $table->string('upskill_name');
            $table->text('upskill_description');
            $table->string('upskill_status');
            $table->string('upskill_category');
            $table->string('upskill_link')->nullable();
            $table->integer('no_of_views')->nullable();
            $table->integer('upskill_apply')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_upskills');
    }
};
