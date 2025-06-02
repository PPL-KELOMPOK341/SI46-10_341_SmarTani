<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class GrafikTest extends DuskTestCase
{
    /**
     * Test tampilan grafik pemasukan dan pengeluaran.
     */
    public function testHalamanGrafikTampil()
    {
            $this->browse(function (Browser $browser) {
            $browser->visit('login')
                    ->type('email', 'test@example.com')
                    ->type('password', 'password')
                    ->press('Masuk')
                    ->waitForLocation('/dashboard', 5)
                    ->assertSee('Berita Terkini');

             $browser->click('.menu-icon')
                    ->pause(1000) // tunggu sidebar tampil
                    ->clickLink('Grafik')
                    ->assertPathIs('/grafik-pemasukan-pengeluaran')
                    ->assertSee('Grafik Pemasukan dan Pengeluaran')
                    ->pause(1000);
        });
    }

    /**
     * Test filter tahun pada grafik.
     */
    public function testFilterTahunPadaGrafik()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/grafik-pemasukan-pengeluaran')
                    ->select('tahun', '2025')
                    //->click('Filter') // Ganti dengan selector yang sesuai
                    ->assertSee('Grafik Pemasukan dan Pengeluaran');
        });
    }
}
