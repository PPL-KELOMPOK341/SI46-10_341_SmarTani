<?php

namespace Tests\Browser;

// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FormHasilPanenTest extends DuskTestCase
{
    // use DatabaseMigrations;

    public function test_submit_form_dengan_semua_field_wajib_diisi()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Email')
                    ->assertSee('Password')
                    ->assertSee('LOG IN')

                    ->type('email', 'testuser@example.com') 
                    ->type('password', '12345678')       
                    ->press('LOG IN')                       
                    ->assertPathIs('/dashboard')
                    ->waitFor('.menu-icon')
                    ->click('.menu-icon')

                    ->waitForText('Riwayat Hasil Panen', 5)
                    ->clickLink('Riwayat Hasil Panen')

                    ->assertPathIs('/hasil-panen')

                    ->click('a.tambah-hasil-panen')
    
                    // Pastikan diarahkan ke halaman create hasil panen
                    ->assertPathIs('/hasil-panen/create')

                    ->assertSee('CARI DATA PENANAMAN')
                    ->assertSee('Nama Tanaman')
                    ->assertSee('Cari Tanaman')

                    ->type('nama_tanaman', 'Padi')
                    ->press('Cari Tanaman')
                    ->assertSee('Nama Tanaman')

                    ->select('kualitas_hasil_panen', 'Baik')
                    ->type('harga_jual_satuan', '5000')
                    ->type('tanggal_panen', now()->format('Y-m-d'))
                    ->type('jumlah_hasil_panen', '1000')
                    ->type('catatan', 'Hasil sangat bagus.')

                    ->press('Simpan')
                    
                    ->assertPathIs('/hasil-panen') // redirect ke index
                    ->assertSee('Data hasil panen berhasil disimpan.') // asumsi ada pesan sukses
                    
                    ;
    

        });
    }

    public function test_submit_form_dengan_field_yang_wajib_tidak_diisi()
    {
        $this->browse(function (Browser $browser) {
            $browser->click('a.tambah-hasil-panen')

                ->assertPathIs('/hasil-panen/create')

                ->assertSee('CARI DATA PENANAMAN')
                ->assertSee('Nama Tanaman')
                ->assertSee('Cari Tanaman')

                ->type('nama_tanaman', 'Padi')
                ->assertSee('Nama Tanaman')
                
                ->press('Cari Tanaman')

                ->assertPathIs('/hasil-panen/search')
                ->assertSee('TAMBAH HASIL PANEN')

                // Jangan isi kualitas
                ->type('harga_jual_satuan', '5000')
                ->type('tanggal_panen', now()->format('Y-m-d'))
                ->type('jumlah_hasil_panen', '1000')

                ->press('Simpan')
                
                ->assertPathIs('/hasil-panen/search') 
                ;
        });
    }

    public function test_mengisi_field_harga_jual_dengan_teks()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/hasil-panen/create')

                ->assertSee('CARI DATA PENANAMAN')
                ->assertSee('Nama Tanaman')
                ->assertSee('Cari Tanaman')

                ->type('nama_tanaman', 'Padi')
                ->assertSee('Nama Tanaman')
                
                ->press('Cari Tanaman')

                ->assertPathIs('/hasil-panen/search')
                ->assertSee('TAMBAH HASIL PANEN')

                // Jangan isi kualitas
                ->select('kualitas_hasil_panen', 'Baik')
                ->type('harga_jual_satuan', 'Saya Rafi')
                ->type('tanggal_panen', now()->format('Y-m-d'))
                ->type('jumlah_hasil_panen', '1000')
                ->type('catatan', 'Hasil sangat bagus.')

                ->press('Simpan')
                
                ->assertPathIs('/hasil-panen/search') 
                ;
        });
    }

    public function test_menekan_tombol_kembali()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/hasil-panen')

            ->click('a.tambah-hasil-panen')
    
            // Pastikan diarahkan ke halaman create hasil panen
            ->assertPathIs('/hasil-panen/create')

            ->assertSee('CARI DATA PENANAMAN')
            ->assertSee('Nama Tanaman')
            ->assertSee('Cari Tanaman')

            ->type('nama_tanaman', 'Padi')
            ->assertSee('Nama Tanaman')
            
            ->press('Cari Tanaman')


            ->assertPathIs('/hasil-panen/search')
            ->assertSee('TAMBAH HASIL PANEN')
                

                ->click('a.btn-kembali')
                
                ->assertPathIs('/hasil-panen') 
                ;
        });
    }



}
