<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pengeluarans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_tanaman');
        $table->string('periode');
        $table->date('tanggal_penanaman');
        $table->integer('total_biaya_bibit');
        $table->integer('upah_panen');
        $table->integer('total_biaya_pupuk');
        $table->integer('jumlah_pupuk');
        $table->date('tanggal_pengeluaran');
        $table->integer('jumlah_bibit');
        $table->string('tujuan_pengeluaran');
        $table->integer('harga');
        $table->text('catatan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
