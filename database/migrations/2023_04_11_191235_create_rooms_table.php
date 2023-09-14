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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('main_image')->nullable();
            $table->string('views')->nullable();
            $table->string('acreage')->nullable();
            $table->integer('persons');
            $table->string('location')->nullable();
            $table->integer('price');
            $table->tinyInteger('status')->default(2)->comment("1:Active & 2:Block");
            $table->string('room_code')->unique()->nullable();
            $table->unsignedBigInteger('hotels_id');
            $table->foreign('hotels_id')->references('id')->on('hotels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
