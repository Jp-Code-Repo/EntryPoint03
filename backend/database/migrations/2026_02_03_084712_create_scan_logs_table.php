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
         Schema::create('scan_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('person_id');
            $table->string('person_type'); // Student, Teacher, Staff

            $table->enum('direction', ['IN', 'OUT']);

            $table->unsignedBigInteger('scanner_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();

            $table->timestamp('scanned_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scan_logs');
    }
};
