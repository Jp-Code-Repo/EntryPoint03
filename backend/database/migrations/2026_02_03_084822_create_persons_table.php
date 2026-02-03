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
         Schema::create('persons', function (Blueprint $table) {
            $table->id();

            $table->string('barcode')->unique();
            $table->string('type'); // Student, Teacher, Staff

            $table->string('name');

            // Student-only fields
            $table->string('grade')->nullable();
            $table->string('section')->nullable();

            // Teacher / Staff-only fields
            $table->string('department')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
