<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Penanaman;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PenanamanSeeder extends Seeder
{
    public function run(): void
    {
        $namaTanamanList = ['Padi IR64', 'Jagung Manis', 'Kacang Tanah', 'Cabai Rawit', 'Tomat'];
        $periodeList = ['Musim Tanam I', 'Musim Tanam II', 'Musim Hujan', 'Musim Kemarau'];
        $pupukList = ['Urea', 'ZA', 'SP-36', 'KCl'];
        $pestisidaList = ['Deltametrin', 'Karbofuran', 'Abamektin', 'None'];

        $users = User::all();

        foreach ($users as $user) {
            for ($i = 0; $i < 5; $i++) {
                Penanaman::create([
                    'user_id' => $user->id,
                    'nama_tanaman' => $namaTanamanList[array_rand($namaTanamanList)],
                    'lokasi_lahan' => 'Lahan Blok ' . chr(65 + $i) . rand(1, 9),
                    'luas_lahan' => rand(500, 2000),
                    'periode' => $periodeList[array_rand($periodeList)],
                    'tanggal_penanaman' => now()->subDays(rand(1, 60)),
                    'jumlah_pupuk' => rand(50, 200),
                    'jumlah_bibit' => rand(30, 150),
                    'jenis_pupuk' => $pupukList[array_rand($pupukList)],
                    'jenis_pestisida' => $pestisidaList[array_rand($pestisidaList)] ?? null,
                    'kendala' => rand(0, 1) ? 'Hama ' . Str::random(5) : null,
                    'catatan' => rand(0, 1) ? 'Catatan penting ' . Str::random(10) : null,
                ]);
            }
        }
    }
}
