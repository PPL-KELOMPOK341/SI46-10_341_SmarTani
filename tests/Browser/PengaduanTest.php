<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PengaduanTest extends DuskTestCase
{
    /** @test */
    public function user_dapat_mengisi_form_pengaduan()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'udin@gmail.com') // Ganti dengan email user yang sudah ada di DB
                ->type('password', 'udin1234567')      // Ganti dengan password user
                ->press('Masuk')
                ->pause(500)
                ->assertPathIs('/dashboard')        // Atau path setelah login berhasil
                
                ->click('.menu-icon')
                ->pause(1000) // tunggu sidebar tampil
                ->clickLink('Form Pengaduan')
                ->assertPathIs('/pengaduan')
                ->type('telepon', '081234567892')
                ->select('kategori', 'Teknis')
                ->type('deskripsi', 'Input data gagal')
                ->press('Kirim Pengaduan')
                ->assertSee('Pengaduan berhasil dikirim');
        });
    }
}
