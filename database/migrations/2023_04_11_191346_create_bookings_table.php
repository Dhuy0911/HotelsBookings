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
            $table->string('booking_code')->unique();
            $table->dateTime('booked_on');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->tinyInteger('status')->default(1)->comment("1:Ok & 2:Cancel & 3:No Show");
            $table->tinyInteger('adult')->default(1);
            $table->tinyInteger('kids')->default(0)->nullable();
            $table->double('no_rooms');
            $table->string('fullname');
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->string('message')->nullable();
            $table->string('commission');
            $table->string('earning');
            $table->string('total_price');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('hotels_id');
            $table->foreign('hotels_id')->references('id')->on('hotels');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');
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
