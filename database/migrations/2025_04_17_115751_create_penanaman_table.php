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
        Schema::create('penanaman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tanaman');
            $table->string('lokasi_lahan');
            $table->integer('luas_lahan');
            $table->string('periode');
            $table->date('tanggal_penanaman');
            $table->integer('jumlah_pupuk');
            $table->integer('jumlah_bibit');
            $table->string('jenis_pestisida')->nullable();
            $table->string('jenis_pupuk')->nullable();
            $table->text('kendala')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanaman');
    }
};
