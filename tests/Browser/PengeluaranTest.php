<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PengeluaranTest extends DuskTestCase
{
    public function test_menampilkan_halaman_riwayat_dan_detail_pengeluaran()
    {
        $this->browse(function (Browser $browser) {
            // Login (gunakan selector submit button)
            $browser->visit('/login')
                    ->pause(500) // beri waktu 10 detik agar halaman login siap
                    ->type('email', 'umam@gmail.com')
                    ->type('password', 'umam123456789')
                    ->press('LOG IN') // Gunakan sesuai label di blade, sensitif kapital
                    ->assertPathIs('/dashboard');

            // Klik tombol burger menu (sidebar)
            $browser->click('.menu-icon')
                    ->pause(1000) // tunggu sidebar tampil
                    ->clickLink('Riwayat Pengeluaran')
                    ->assertPathIs('/pengeluaran')
                    ->assertSee('Riwayat Pengeluaran')
                    ->pause(1000);

            // Klik tombol detail pada baris pertama (gunakan class atau dusk tag)
            $browser->click('.btn-info.btn-sm') // atau ->click('@detail-button') jika pakai dusk tag
                    ->pause(1000)
                    ->assertSee('Detail Pengeluaran');
        });
    }
}
