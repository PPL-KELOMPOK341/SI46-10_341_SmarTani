<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RiwayatPengaduanTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testMenampilkan_Riwayat_Pengaduan(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->assertSee('Email')
                    ->assertSee('Password')
                    ->assertSee('Login')

                    ->type('email', 'admin@example.com') 
                    ->type('password', 'password')  
                    ->press('Login')        

                    ->visit('/riwayat-pengaduan')
                    // ->assertPathIs('/admin/beranda')
                    ->assertSee('Riwayat Pengaduan')
                    ->clickLink('Lihat')

                    ->assertSee('Detail Pengaduan')
                    ->assertSee('Informasi Pengirim')
                    ->assertSee('Hapus Pengaduan')
                    ;
        });
    }

        public function testKembali_Ke_CRUD_Riwayat_Pengaduan(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/beranda')
        
                    ->visit('/riwayat-pengaduan')
                    // ->assertPathIs('/admin/beranda')
                    ->assertSee('Riwayat Pengaduan')
                    ->clickLink('Lihat')
                    
                    ->assertSee('Detail Pengaduan')
                    ->assertSee('Informasi Pengirim')
                    ->assertSee('Hapus Pengaduan')
                    ->clickLink('Kembali ke Daftar')

                    ->assertSee('Riwayat Pengaduan')
                    ->assertSee('Nama User')
                    ->assertSee('Reset')
                    ->assertSee('Lihat')
                    ->assertSee('Tanggal')
                    ;
        });
    }
}
