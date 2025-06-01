<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Penanaman;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use function Laravel\Prompts\pause;

class PendapatanFormTest extends DuskTestCase
{
    public function testFormPendapatanBerhasilDiAkses()
    {
        // Membuat user untuk login
        $user = User::factory()->create(['password' => bcrypt('password')]);

        $this->browse(function (Browser $browser) use ($user) {
            // Login terlebih dahulu
            $browser->visit('/login')
                    ->type('email', 'test@gmail.com')
                    ->type('password', '1234qwer')
                    ->press('Masuk')
                    ->pause(1000) 
                    ->assertSee('Berita Terkini') 
                    ->click('.menu-icon')
                    ->pause(1000)
                    ->click('.fas.fa-file-alt.me-2')
                    ->pause(1000)
                    ->clickLink('Form Pendapatan')
                    ->assertSee('Form Pendapatan')
                    ->pause(2000)
                    ;

                    

      
        });
    }

  /**
     * TC4 - Tombol Aksi
     */
    public function testTombolAksi()
    {
        $user = User::factory()->create(['password' => bcrypt('1234qwer')]);
        Penanaman::factory()->create(['user_id' => $user->id]);

        $this->browse(function (Browser $browser) use ($user) {
            $this->actingAs($user);  // Aktifkan autentikasi pengguna
            $browser->visit(route('pendapatan.create'))
                    ->assertVisible('button[type=submit]')
                    ->assertSee('Simpan Data')
                    ->assertSee('Kembali')
                    ->click('button[type=submit]')
                    ->pause(1000) // Memberikan waktu untuk simpan data
                    ->clickLink('Kembali');
        });
    }


    public function testValidInput()
    {
        // Membuat user untuk login
        $user = User::factory()->create(['password' => bcrypt('1234qwer')]);
        Penanaman::factory()->create(['user_id' => $user->id]);

        $this->browse(function (Browser $browser) use ($user) {
            $this->actingAs($user);  // Aktifkan autentikasi pengguna
            // Login terlebih dahulu
            // $browser->visit('/login')
            //         ->type('email', 'test@gmail.com')
            //         ->type('password', '1234qwer')
            //         ->press('LOG IN')
            //         ->pause(2000) 
            $browser->visit(route('pendapatan.create'))
                    ->press('.form-control')
                    // ->pause(2000)
                    ->select('.form-control', 1)
                    ->type('sumber_pendapatan', 'Penjualan')
                    ->type('total_hasil_pendapatan', '1000000')
                    ->waitFor('input[name="tanggal_pemasukan"]')
                    ->type('input[name="tanggal_pemasukan"]', '06/20/2025')
                    ->pause(2000)
                    ->press('Simpan Data')
                    ->pause(2000)
                    ->assertSee('Data pendapatan berhasil disimpan!')
                    ;

                    

      
        });
    }

   
    /**
     * TC1 - Header Tampil
     */
    // public function testHeaderIsDisplayed()
    // {
    //     $user = User::factory()->create(['password' => bcrypt('1234qwer')]);
    //     Penanaman::factory()->create(['user_id' => $user->id]);

    //     $this->browse(function (Browser $browser) use ($user) {
    //         $this->actingAs($user);  // Aktifkan autentikasi pengguna
    //         $browser->visit(route('pendapatan.create'))
    //                 ->assertSeeIn('h2', 'Form Pendapatan'); // Pastikan header muncul
    //     });
    // }

    /**
     * TC2 - Form Pilih Data Penanaman
     */
    // public function testFormPilihDataPenanaman()
    // {
    //     $user = User::factory()->create(['password' => bcrypt('1234qwer')]);
    //     Penanaman::factory()->create(['user_id' => $user->id]);

    //     $this->browse(function (Browser $browser) use ($user) {
    //         $this->actingAs($user);  // Aktifkan autentikasi pengguna
    //         $browser->visit(route('pendapatan.create'))
    //                 ->assertSee('Pilih Data Penanaman')
    //                 ->assertSee('Nama Tanaman')
    //                 ->assertSee('*')
    //                 ->assertSee('Pilih Tanaman');
    //     });
    // }

    /**
     * TC3 - Form Informasi Pendapatan
     */
    // public function testFormInformasiPendapatan()
    // {
    //     $user = User::factory()->create(['password' => bcrypt('1234qwer')]);
    //     Penanaman::factory()->create(['user_id' => $user->id]);

    //     $this->browse(function (Browser $browser) use ($user) {
    //         $this->actingAs($user);  // Aktifkan autentikasi pengguna
    //         $browser->visit(route('pendapatan.create'))
    //                 ->assertSee('Informasi Pendapatan')
    //                 ->assertSee('Sumber Pendapatan')
    //                 ->assertSee('*')
    //                 ->assertInputValue('tanggal_pemasukan', '')
    //                 ->assertSee('Total Hasil Pendapatan (Rp)');
    //     });
    // }


    /**
     * Negative tests for invalid inputs
     */
    public function testInvalidInput()
    {
        $user = User::factory()->create(['password' => bcrypt('1234qwer')]);
        Penanaman::factory()->create(['user_id' => $user->id]);

        $this->browse(function (Browser $browser) use ($user) {
            $this->actingAs($user);  
            $browser->visit(route('pendapatan.create'))
                    ->press('Simpan Data')
                    ->pause(500)
                    ->press('.form-control')
                    ->select('.form-control', 6)
                    ->press('Simpan Data')
                    ->pause(500)
                    ->type('sumber_pendapatan', 'TEST')
                    ->press('Simpan Data')
                    ->pause(500)
                    ->waitFor('input[name="tanggal_pemasukan"]')
                    ->type('input[name="tanggal_pemasukan"]', '05/25/2025')
                    ->press('Simpan Data')
                    ->pause(500)
                    ->type('total_hasil_pendapatan', '1500000')
                    ->press('Simpan Data')
                    ->pause(1000)
                    ;
        });
    }
}
