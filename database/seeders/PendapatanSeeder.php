<?php

namespace Database\Seeders;

use App\Models\Pendapatan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PendapatanSeeder extends Seeder
{
    public function run(): void
    {
        $sumberPendapatan = ['Penjualan lokal', 'Ekspor', 'Pasar tradisional', 'Online marketplace', 'Distributor besar'];
        $users = User::with('penanaman')->get();

        foreach ($users as $user) {
            $penanamans = $user->penanaman;

            foreach ($penanamans as $penanaman) {
                for ($i = 0; $i < 2; $i++) {
                    Pendapatan::create([
                        'penanaman_id' => $penanaman->id,
                        'sumber_pendapatan' => $sumberPendapatan[array_rand($sumberPendapatan)],
                        'tanggal_pemasukan' => Carbon::now()->subDays(rand(1, 100)),
                        'total_hasil_pendapatan' => rand(500000, 5000000)
                    ]);
                }
            }
        }
    }
}
