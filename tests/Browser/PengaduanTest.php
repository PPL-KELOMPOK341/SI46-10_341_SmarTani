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
                ->type('email', 'badri@gmail.com') // Ganti dengan email user yang sudah ada di DB
                ->type('password', 'badri1234567')      // Ganti dengan password user
                ->press('Masuk')
                ->pause(500)
                ->assertPathIs('/dashboard')        // Atau path setelah login berhasil
                
                ->click('.menu-icon')
                ->pause(1000) // tunggu sidebar tampil
                ->clickLink('Form Pengaduan')
                ->assertPathIs('/pengaduan')
                ->select('kategori', 'Teknis')
                ->press('Kirim Pengaduan')
                ->pause(2000);
        });
    }

    /** @test */
    public function form_pengaduan_kosong()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/pengaduan')
                ->click('.menu-icon')
                ->pause(1000)
                ->clickLink('Form Pengaduan')
                ->assertPathIs('/pengaduan')
                // Tidak mengisi telepon, kategori, dan deskripsi
                ->press('Kirim Pengaduan')
                // Pastikan pesan validasi muncul (ganti sesuai pesan validasi aplikasi Anda)
                ->assertDontSee('Pengaduan berhasil dikirim');
        });
    }
}
