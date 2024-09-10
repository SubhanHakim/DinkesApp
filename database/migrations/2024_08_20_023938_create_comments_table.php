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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidang_id')->constrained(); // menghubungkan dengan bidang
            $table->string('bulan'); // menyimpan bulan yang dikomentari
            $table->text('comment'); // menyimpan komentar
            $table->foreignId('user_id')->constrained(); // menghubungkan dengan user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
