<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BeritaControllerTest extends DuskTestCase
{

    /**
     * @group berita-test
     * Test user dapat sortir produk termahal di halaman katalog.
     */
    public function test_user_lihat_berita()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@gmail.com')
                ->type('password', '12345678')
                ->press('Masuk')
                ->pause(500)
                ->assertPathIs('/dashboard')

                ->assertSee('Cabe lagi mahal')
                ->clickLink('Cabe lagi mahal');
                
        });
    }

   /**
     * @group cariberita-test
     * Test user dapat mencari berita dengan keyword di halaman dashboard.
     */
    public function test_user_cari_berita()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@gmail.com')
                ->type('password', '12345678')
                ->press('Masuk')
                ->pause(500)
                ->assertPathIs('/dashboard')
                
                // Arahkan ke halaman berita
        

                // Isi kolom pencarian dengan keyword 'cabe'
                ->type('search', 'cabe')
                
                // Tekan tombol search
                ->click('button[type="submit"]') // Ganti dengan nama tombol kalau perlu
                ->pause(100)

                // Pastikan berita tentang 'Cabe lagi mahal' muncul
                ->assertSee('Cabe lagi mahal');
        });
    }
/**
 * @group tanggalberita-test
 * Test user dapat memfilter berita berdasarkan rentang tanggal.
 */
public function test_user_filter_berita_by_tanggal()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/login')
            ->type('email', 'admin@gmail.com')
            ->type('password', '12345678')
            ->press('Masuk')
            ->pause(500)
            ->assertPathIs('/dashboard')

            ->visit('/dashboard')

            // Isi form filter tanggal
            ->type('dari', '01-06-2024')  // <-- format harus benar
            ->type('sampai', '03-06-2024')

            // Klik tombol search dengan klik tombol submit
            ->click('button[type="submit"]') // <-- BUKAN press('Search')
            ->pause(1000) // beri jeda supaya halaman reload

            // Validasi hasil
            ->assertSee('Harga Cabai Meningkat di Bandung')
            ->assertSee('Cabe lagi mahal')
            ->assertDontSee('Panen Raya Membuat Harga Sayur Turun');
    });
}
}