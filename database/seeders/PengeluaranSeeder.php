<?php

namespace Database\Seeders;

use App\Models\Pengeluaran;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PengeluaranSeeder extends Seeder
{
    public function run(): void
    {
        $tujuan = ['Pembelian bibit', 'Pembelian pupuk', 'Perawatan tanaman', 'Transportasi', 'Upah panen'];
        $users = User::with('penanaman')->get();

        foreach ($users as $user) {
            $penanamans = $user->penanaman;

            foreach ($penanamans as $penanaman) {
                for ($i = 0; $i < 2; $i++) {
                    $jumlahBibit = rand(100, 500);
                    $jumlahPupuk = rand(5, 20);
                    Pengeluaran::create([
                        'penanaman_id' => $penanaman->id,
                        'total_biaya_bibit' => $jumlahBibit * rand(100, 300),
                        'upah_panen' => rand(100000, 300000),
                        'total_biaya_pupuk' => $jumlahPupuk * rand(5000, 15000),
                        'jumlah_pupuk' => $jumlahPupuk,
                        'tanggal_pengeluaran' => Carbon::now()->subDays(rand(5, 120)),
                        'jumlah_bibit' => $jumlahBibit,
                        'tujuan_pengeluaran' => $tujuan[array_rand($tujuan)],
                        'harga' => rand(5000, 100000),
                        'catatan' => 'Pengeluaran user ' . $user->id . ' #' . $i
                    ]);
                }
            }
        }
    }
}
