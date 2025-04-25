<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('demo_requests', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('location');
            $table->string('user_type');
            $table->string('other_type')->nullable();
            $table->json('interests');
            $table->string('other_interest')->nullable();
            $table->string('demo_mode');
            $table->text('notes')->nullable();
            $table->string('status')->default('pending'); // pending, contacted, scheduled, completed, cancelled
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_requests');
    }
}; 