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
        Schema::create('test2users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('test_id');
            $table->integer('reservation_id')->nullable()->default(0);
            $table->integer('allowed_id')->nullable()->default(0);
            $table->integer('passed_id')->nullable()->default(0);
            $table->integer('mail_sended')->nullable()->default(0);
            $table->integer('payment_id')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test2users');
    }
};
