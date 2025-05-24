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
        Schema::create('riwayat_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tanaman');
            $table->string('periode');
            $table->date('tanggal_penanaman');
            $table->date('tanggal_pengeluaran');
            $table->bigInteger('biaya_bibit');
            $table->bigInteger('biaya_pupuk');
            $table->bigInteger('upah_panen');
            $table->integer('jumlah_pupuk');
            $table->integer('jumlah_bibit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pengeluaran');
    }
};
