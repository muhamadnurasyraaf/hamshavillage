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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phonenumber');
            $table->text('notes')->nullable();
            $table->timestamp('checkin_date');
            $table->timestamp('checkout_date');
            $table->integer('days')->nullable();
            $table->integer('breakfast')->default(0);
            $table->float('cost');
            $table->boolean('paid')->default(false);
            $table->boolean('isCompleted')->default(false);
            $table->integer('extra_mat')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
