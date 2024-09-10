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
        Schema::create('monthly_achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidang_id')->constrained()->onDelete('cascade');
            $table->string('bulan');
            $table->integer('target_capaian_bulanan');
            $table->integer('capaian_kinerja_bulanan')->nullable();
            $table->float('percent_capaian_kinerja_bulanan')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_achievements');
    }
};
