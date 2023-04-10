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
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->references('id')->on('sessions');
            $table->unsignedBigInteger("solved_by");
            $table->integer('question_1');
            $table->integer('question_2');
            $table->integer('question_3');
            $table->integer('question_4');
            $table->integer('question_5');
            $table->integer('question_6');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaires');
    }
};
