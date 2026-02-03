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
        Schema::create('audit_logs', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('user_id')->nullable(); // null = system / scanner
        $table->string('user_role')->nullable(); // Super Admin, Admin, System

        $table->string('action'); // e.g. CREATE_SCAN, UPDATE_PERSON, DELETE_DEVICE
        $table->string('entity_type'); // Person, ScanLog, Device, Room
        $table->unsignedBigInteger('entity_id')->nullable();

        $table->json('old_data')->nullable();
        $table->json('new_data')->nullable();

        $table->string('ip_address')->nullable();
        $table->string('user_agent')->nullable();

        $table->timestamps();

         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
