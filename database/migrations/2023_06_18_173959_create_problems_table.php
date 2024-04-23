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
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->integer('pstyle');
            $table->string('answer_text');
            $table->string('pre_answer');
            $table->string('correct_answer');
            $table->integer('ganre_num');
            $table->integer('province_num');
            $table->integer('level_num');
            $table->integer('problem_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problems');
    }
};
