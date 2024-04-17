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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('email');
            $table->string('phone');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('comment')->nullable();
            $table->string('reservation_number')->nullable();

            $table->integer('price');
            $table->boolean('bed');
            $table->integer('adult');
            $table->integer('children');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
