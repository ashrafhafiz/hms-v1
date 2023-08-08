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
        Schema::create('working_day_translations', function (Blueprint $table) {

            // mandatory fields
            $table->id();
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('working_day_id');
            $table->foreign('working_day_id')->references('id')->on('working_days')->cascadeOnDelete();
            $table->unique(['working_day_id', 'locale']);

            // Actual fields you want to translate
            $table->string('working_day_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_day_translations');
    }
};
