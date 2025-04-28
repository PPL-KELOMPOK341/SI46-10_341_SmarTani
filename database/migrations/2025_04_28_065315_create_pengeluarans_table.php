<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penanaman_id')->constrained('penanamans')->onDelete('cascade');
            $table->decimal('total_biaya_bibit', 10, 2);
            $table->decimal('upah_panen', 10, 2);
            $table->decimal('total_biaya_pupuk', 10, 2);
            $table->integer('jumlah_pupuk');
            $table->date('tanggal_pengeluaran');
            $table->integer('jumlah_bibit');
            $table->string('tujuan_pengeluaran');
            $table->decimal('harga', 10, 2);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengeluarans');
    }
};
