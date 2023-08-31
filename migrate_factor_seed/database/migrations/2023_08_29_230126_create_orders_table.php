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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('status');
            $table->unsignedBigInteger('room_number');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('admin_id')->references('id')->on('admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
