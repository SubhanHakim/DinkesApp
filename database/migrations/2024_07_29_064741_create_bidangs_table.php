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
        Schema::create('bidangs', function (Blueprint $table) {
            for ($i = 1; $i <= 12; $i++) {
                $table->integer('capaian_bulan_' . $i)->nullable();
            }
            $table->id();
            $table->string('bidang');
            $table->string('seksi');
            $table->string('program');
            $table->string('target_kinerja');
            $table->integer('target_capaian');
            $table->float('target_capaian_percent')->nullable();
            $table->integer('capaian_kinerja_tahunan')->nullable();
            $table->float('capaian_kinerja_tahunan_percent')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidangs');
    }
};
