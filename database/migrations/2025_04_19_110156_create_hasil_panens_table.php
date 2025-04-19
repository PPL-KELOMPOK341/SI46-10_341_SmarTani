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
        Schema::create('hasil_panens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tanaman');
            $table->string('periode');
            $table->date('tanggal_penanaman');
            $table->string('lokasi_lahan');
            $table->string('kualitas_hasil_panen');
            $table->date('tanggal_panen');
            $table->integer('harga_jual_satuan');
            $table->integer('jumlah_hasil_panen');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_panens');
    }
};
