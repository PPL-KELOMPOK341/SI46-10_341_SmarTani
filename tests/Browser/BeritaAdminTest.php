<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class BeritaAdminTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group tambah-test
     */
    public function test_user_membuat_berita()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create(); // Sementara karena berita masih menggunakan login petani jadi direct ke tampilan petani
            $browser->loginAs($user)
            ->visit('/berita')
                ->assertSee('Data Berita')
                ->clicklink('+ Tambah Data')
                ->assertpathis('/berita/create')

            // Isi form
            ->type('judul', 'Teriakan Petani')
            ->value('input[name="tanggal"]', '2025-05-25')
            ->attach('foto', public_path('storage\berita-images\test-petani.jpg'))
            ->type('deskripsi', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAA')

            // Simpan
            ->press('Simpan')

            // Pastikan kembali ke halaman daftar atau muncul pesan sukses
            ->assertPathIs('/berita')
            ->assertSee('Berita berhasil ditambahkan');
    });
}
    /**
     * A Dusk test example.
     * @group tambah-test-exception
     */
    public function test_user_membuat_berita_exception()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create(); // Sementara karena berita masih menggunakan login petani jadi direct ke tampilan petani
            $browser->loginAs($user)
            ->visit('/berita')
                ->assertSee('Data Berita')
                ->clicklink('+ Tambah Data')
                ->assertpathis('/berita/create')

            // Simpan
            ->press('Simpan')

            // Pastikan kembali ke halaman daftar atau muncul pesan sukses

            ->assertFocused('input[name="judul"]');
    });
}
/**
     * @group read-test
     * Test user dapat sortir produk termahal di halaman katalog.
     */
public function test_user_lihat_berita()
{
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create(); // Sementara karena berita masih menggunakan login petani jadi direct ke tampilan petani
        $berita = Berita::factory()->create();

        $browser->loginAs($user)
            ->visit('/berita')
            ->assertSee('Data Berita')
            ->click('@lihat-'.$berita->id)
            ->assertPathIs('/berita/'.$berita->id.'/detail-admin')
            ->assertSee('Detail Berita');
    });
}

/**
 * @group tanggal-test
 * Test user dapat memfilter berita berdasarkan rentang tanggal.
 */
public function test_user_filter_berita_by_tanggal()
{
    $this->browse(function (Browser $browser) {
            $user = User::factory()->create(); // Sementara karena berita masih menggunakan login petani jadi direct ke tampilan petani
            $browser->loginAs($user)
            ->visit('/berita')

            // Isi form filter tanggal
            ->type('dari', '01-05-2025')  // <-- format harus benar
            ->type('sampai', '08-05-2025')

            // Klik tombol search dengan klik tombol submit
            ->click('button[type="submit"]') // <-- BUKAN press('Search')
            ->pause(1000) // beri jeda supaya halaman reload

            // Validasi hasil
            ->assertSee('Teriakan Petani')
            ->assertDontSee('23 Paskal Shopping Centre');
    });
}

    /**
 * @group tanggal-exception
 * Test filter berita dengan tanggal yang tidak ada hasilnya.
 */
public function test_filter_berita_tanggal_tidak_ditemukan()
{
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create();

            $browser->loginAs($user)
            ->visit('/berita')
            ->type('dari', '01-01-2020')
            ->type('sampai', '02-01-2020')
            ->click('button[type="submit"]')
            ->pause(1000)

            // Validasi pesan hasil kosong
            ->assertSee('Tidak ada data berita');
    });
}

}
