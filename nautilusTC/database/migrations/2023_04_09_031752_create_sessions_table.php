<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *             $table->foreignId('user_id')
      *          ->constrained()
     *           ->onUpdate('cascade')
      *          ->onDelete('cascade');
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('format');
            $table->integer('wordCount');
            $table->integer('durationHours');
            $table->integer('durationMinutes');
            $table->integer('durationSeconds');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
