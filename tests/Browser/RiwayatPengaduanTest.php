<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RiwayatPengaduanTest extends DuskTestCase
{
    // Gunakan jika kamu ingin reset database di setiap test
    // use DatabaseMigrations;

    /** @test */
    public function admin_dapat_melihat_riwayat_pengaduan()
    {
        $this->browse(function (Browser $browser) {
            $admin = User::where('email', 'admin@example.com')->first(); // Pastikan user ini role:admin

            $browser->loginAs($admin)
                ->visit('/admin/riwayat-pengaduan')
                ->assertSee('Riwayat Pengaduan')
                ->assertSee('Kategori') // Cek kolom tabel
                ->assertSee('Status');
        });
    }

    /** @test */
    public function admin_dapat_melakukan_filter_pengaduan()
    {
        $this->browse(function (Browser $browser) {
            $admin = User::where('email', 'admin@example.com')->first();

            $browser->loginAs($admin)
                ->visit('/admin/riwayat-pengaduan')
                ->type('search', 'Teknis')
                ->press('Filter')
                ->pause(1000)
                ->assertPathIs('/admin/riwayat-pengaduan')
                ->assertSee('Kategori');
        });
    }
}
