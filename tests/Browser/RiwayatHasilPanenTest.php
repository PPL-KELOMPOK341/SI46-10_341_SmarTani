<?php

namespace Tests\Browser;

// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RiwayatHasilPanenTest extends DuskTestCase
{
    // use DatabaseMigrations;

    public function test_melihat_daftar_hasil_panen()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Email')
                    ->assertSee('Kata Sandi')
                    ->assertSee('Masuk')

                    ->type('email', 'testuser@example.com') 
                    ->type('password', '12345678')       
                    ->press('Masuk')                       
                    ->assertPathIs('/dashboard')
                    
                    ->waitFor('.menu-icon')
                    ->click('.menu-icon')

                    ->waitForText('Riwayat Hasil Panen', 5)
                    ->clickLink('Riwayat Hasil Panen')

                    
                    ->assertSee('Detail')
                    ->assertSee('Edit')
                    ->assertSee('Hapus')

                    ->assertPathIs('/hasil-panen')
                    ;
    

        });
    }

    public function test_melihat_detail_hasil_panen()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/hasil-panen')
                    ->assertSee('Detail')
                    ->assertSee('Edit')
                    ->assertSee('Hapus')

                    ->assertPathIs('/hasil-panen')

                    
                    ->click('a.btn-detail-panen')

                    ->assertPathBeginsWith('/hasil-panen/')
                    
                    ->assertSee('Detail Hasil Panen')
                    ->assertSee('Nama Tanaman')
                    ->assertSee('Periode')
                    ->assertSee('Tanggal Penanaman')
                    ->assertSee('Lokasi Lahan')
                    ->assertSee('Harga Jual Per KG')
                    ->assertSee('Tanggal Panen')
                    ->assertSee('Jumlah hasil Panen')
                    ->assertSee('Kualitas Hasil Panen')
                    ->assertSee('Print')
                    ->assertSee('Ubah')
                    ->assertSee('Hapus')
                    ->assertSee('Kembali')
            ;
        });
    }

    public function test_klik_tombol_kembali_pada_detail_hasil_panen()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/hasil-panen')
                    ->assertSee('Detail')
                    ->assertSee('Edit')
                    ->assertSee('Hapus')

                    ->assertPathIs('/hasil-panen')
                    
                    ->click('a.btn-detail-panen')

                    ->assertPathBeginsWith('/hasil-panen/')

                    ->assertSee('Detail Hasil Panen')
                    ->assertSee('Nama Tanaman')
                    ->assertSee('Periode')
                    ->assertSee('Tanggal Penanaman')
                    ->assertSee('Lokasi Lahan')
                    ->assertSee('Harga Jual Per KG')
                    ->assertSee('Tanggal Panen')
                    ->assertSee('Jumlah hasil Panen')
                    ->assertSee('Kualitas Hasil Panen')
                    ->assertSee('Print')
                    ->assertSee('Ubah')
                    ->assertSee('Hapus')
                    ->assertSee('Kembali')

                    

                    ->click('a.btn-kembali')
                    
                    ->assertPathIs('/hasil-panen')
                    ->assertSee('Detail')
                    ->assertSee('Edit')
                    ->assertSee('Hapus')

            ;
        });
    }

    


}
