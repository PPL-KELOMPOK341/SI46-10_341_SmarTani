<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class BeritaExceptionTest extends DuskTestCase
{
    /**
 * @group berita-search-exception
 * Test sistem menangani input pencarian tidak relevan atau error.
 */
public function test_pencarian_tidak_valid_atau_tidak_ditemukan()
{
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create();

            $browser->loginAs($user)
            ->visit('/dashboard')
            ->type('search', 'abcd') // input tidak relevan
            ->click('button[type="submit"]')
            ->pause(500)

            // Validasi pesan pencarian tidak ditemukan
            ->assertSee('Tidak ada berita ditemukan.'); // pastikan UI ada pesan ini
    });
}

   /**
 * @group berita-navigasi-exception
 * Test filter berita dengan tanggal yang tidak ada hasilnya.
 */
public function test_filter_berita_tanggal_tidak_ditemukan()
{
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create();

            $browser->loginAs($user)
            ->visit('/dashboard')
            ->type('dari', '01-01-2020')
            ->type('sampai', '02-01-2020')
            ->click('button[type="submit"]')
            ->pause(1000)

            // Validasi pesan hasil kosong
            ->assertSee('Tidak ada berita ditemukan.');
    });
}

}