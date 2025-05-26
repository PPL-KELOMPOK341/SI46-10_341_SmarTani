<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminPengaduanTest extends DuskTestCase
{
    /** @test */
    public function admin_can_see_riwayat_pengaduan()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                ->type('email', 'badri@gmail.com') // pastikan email & password benar
                ->type('password', 'badri1234567')
                ->press('Login')
                ->assertPathIs('/admin/beranda') // sesuaikan jika dashboard admin berbeda
                ->assertSee('Pengaduan')
                ->clickLink('Pengaduan')
                ->assertSee('Riwayat Pengaduan');
        });
    }
}