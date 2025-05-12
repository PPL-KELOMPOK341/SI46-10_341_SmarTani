<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penanaman;
use App\Models\User;

class PenanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all users or create a default user if none exists
        $users = User::all();
        if ($users->isEmpty()) {
            $users = collect([User::factory()->create()]);
        }

        // For each user, create some Penanaman records with default values
        foreach ($users as $user) {
            Penanaman::factory()->count(5)->create([
                'user_id' => $user->id,
                'nama_tanaman' => 'Cabai Merah',
                'lokasi_lahan' => 'Lahan A',
                'luas_lahan' => 1000,
                'periode' => '2025 Q2',
                'tanggal_penanaman' => now()->subDays(30),
                'jumlah_pupuk' => 10,
                'jumlah_bibit' => 500,
                'jenis_pestisida' => 'Pestisida A',
                'jenis_pupuk' => 'Pupuk Organik',
                'kendala' => 'Tidak ada kendala',
                'catatan' => 'Catatan tambahan',
            ]);
        }
    }
}
