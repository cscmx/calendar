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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 45);
            $table->string('description', 255);
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time')->nullable();
            $table->boolean('is_highlighted')->default(false);
            $table->enum('status', ['scheduled', 'completed', 'cancelled'])->default('scheduled');
            $table->foreignId('label_id')
                  ->constrained()
                  ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
