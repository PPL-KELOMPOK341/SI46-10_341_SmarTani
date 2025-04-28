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
        Schema::create('pendapatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penanaman_id')->constrained('penanamans')->onDelete('cascade');
            $table->string('nama_tanaman');
            $table->string('periode');
            $table->date('tanggal_penanaman');
            $table->string('sumber_pendapatan');
            $table->date('tanggal_pemasukan');
            $table->integer('total_hasil_pendapatan');
            $table->string('sumber_pendapatan_lainnya')->nullable();
            $table->integer('harga')->nullable();
            $table->date('tanggal_pemasukan_lainnya')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendapatans');
    }
};
