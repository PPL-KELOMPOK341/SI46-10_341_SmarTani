<?php

namespace Database\Seeders;

use App\Models\HasilPanen;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class HasilPanenSeeder extends Seeder
{
    public function run(): void
    {
        $kualitas = ['Sangat Baik', 'Baik', 'Cukup', 'Buruk'];
        $users = User::with('penanaman')->get();

        foreach ($users as $user) {
            $penanamans = $user->penanaman;

            foreach ($penanamans as $penanaman) {
                for ($i = 0; $i < 2; $i++) { // 5 penanaman × 2 = 10 hasil panen per user
                    HasilPanen::create([
                        'penanaman_id' => $penanaman->id,
                        'kualitas_hasil_panen' => $kualitas[array_rand($kualitas)],
                        'tanggal_panen' => Carbon::now()->subDays(rand(5, 100)),
                        'harga_jual_satuan' => rand(1000, 10000),
                        'jumlah_hasil_panen' => rand(50, 500),
                        'catatan' => 'Panen user ' . $user->id . ' #' . $i
                    ]);
                }
            }
        }
    }
}
