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
        Schema::create('doctor_working_day', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->cascadeOnDelete();

            $table->unsignedBigInteger('working_day_id');
            $table->foreign('working_day_id')->references('id')->on('working_days')->cascadeOnDelete();

            $table->unique(['doctor_id', 'working_day_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_working_day');
    }
};
