<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes as PHPUnitAttributes;
use App\Models\User;
use App\Models\Penanaman;

class RiwayatPenanamanTest extends DuskTestCase
{

    /**
     * Persiapan data dummy Penanaman
     * @group filter-tanaman
     */

    #[PHPUnitAttributes\Test]
    #[PHPUnitAttributes\Group('filter-tanaman')]
    public function testFilterNamaTanamanDiRiwayat()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $penanaman = Penanaman::factory()->create([
                'user_id' => $user->id
            ]);


            $browser->loginAs($user)
                    ->visit('/riwayat-penanaman')
                    ->assertSee('Tabel Riwayat Penanaman') // Pastikan halaman terbuka
                    ->select('nama_tanaman') // <-- Pilih dari select nama_tanaman
                    ->press('🔍') // Tekan tombol 🔍
                    ->pause(1000); // Tunggu hasil load
        });
    }

    #[PHPUnitAttributes\Test]
    #[PHPUnitAttributes\Group('filter-tanaman')]
    public function testTampilPenanaman()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $penanaman = Penanaman::factory()->create([
                'user_id' => $user->id
            ]);

            $browser->loginAs($user)
                    ->visit('/riwayat-penanaman')
                    ->assertSee('Tabel Riwayat Penanaman'); // Pastikan halaman terbuka
        });
    }

    #[PHPUnitAttributes\Test]
    #[PHPUnitAttributes\Group('filter-tanaman')]
    public function testVerifikasiElemenFilter()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $penanaman = Penanaman::factory()->create([
                'user_id' => $user->id
            ]);

            $browser->loginAs($user)
                    ->visit('/riwayat-penanaman')
                    ->assertPresent('select[name="nama_tanaman"]')
                    ->assertPresent('select[name="periode"]')
                    ->assertPresent('input[name="search"]')
                    ->assertPresent('button[type="submit"]');
        });
    }

    /**
     * Persiapan data dummy Penanaman
     * @group filter-exception
     */

    #[PHPUnitAttributes\Test]
    #[PHPUnitAttributes\Group('filter-exception')]
    public function test_tidak_ada_data_yang_sesuai()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $penanaman = Penanaman::factory()->create([
                'user_id' => $user->id
            ]);

            $browser->loginAs($user)
                    ->visit('/riwayat-penanaman')
                    ->assertSee('Tabel Riwayat Penanaman')
                    ->type('search', 'TanamanTidakAda123') // kata kunci tidak sesuai data mana pun
                    ->press('🔍')
                    ->pause(1000)
                    ->assertSee('Tidak ada data'); // pastikan ini ditampilkan di view saat kosong
        });
    }
}