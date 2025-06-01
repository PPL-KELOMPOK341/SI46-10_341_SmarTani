<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Berita;

class BeritaReadTest extends DuskTestCase
{

//=======NORMAL CASE==============


    /**
     * @group read-test
     * Test admin melihat berita
     */
public function test_user_lihat_berita()
{
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);
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
     * @group update-test
     * Test admin mengupdate berita
     */
public function test_user_update_berita()
{
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);
        $berita = Berita::factory()->create();

        $browser->loginAs($user)
            ->visit('/berita')
            ->assertSee('Data Berita')
            ->click('@lihat-'.$berita->id)
            ->assertPathIs('/berita/'.$berita->id.'/detail-admin')
            ->assertSee('Detail Berita')
            ->clickLink('Update')
            ->assertPathIs('/berita/'.$berita->id.'/edit')
            ->assertSee('Update Berita')
            ->type('judul', 'Baling-Baling Bambu')
            ->value('input[name="tanggal"]', '2025-05-29')
            ->type('konten', 'Doraemon')
            ->press('Update')
            ->assertPathIs('/berita');
    });
}

/**
     * @group hapus-test
     * Test admin menghapus berita
     */
public function test_user_hapus_berita()
{
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create(); // Sementara karena berita masih menggunakan login petani jadi direct ke tampilan petani
        $berita = Berita::factory()->create();

        $browser->loginAs($user)
            ->visit('/berita')
            ->assertSee('Data Berita')
            ->click('@lihat-'.$berita->id)
            ->assertPathIs('/berita/'.$berita->id.'/detail-admin')
            ->assertSee('Detail Berita')
            ->press('Hapus')
            ->acceptDialog() //Klik OK
            ->assertPathIs('/berita');
    });
}

//=======EXCEPTION CASE==============

    /**
     * @group updateexception-test
     * Test admin mengklik update tapi mengosongkan salah satu field atau keseluruhan field required
     */
public function test_user_update_exception_berita()
{
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create(); // Sementara karena berita masih menggunakan login petani jadi direct ke tampilan petani
        $berita = Berita::factory()->create();

        $browser->loginAs($user)
            ->visit('/berita')
            ->assertSee('Data Berita')
            ->click('@lihat-'.$berita->id)
            ->assertPathIs('/berita/'.$berita->id.'/detail-admin')
            ->assertSee('Detail Berita')
            ->clickLink('Update')
            ->assertPathIs('/berita/'.$berita->id.'/edit')
            ->assertSee('Update Berita')
            ->type('judul', '')
            ->press('Update')
            ->assertFocused('input[name="judul"]');
    });
}

/**
     * @group hapusexception-test
     * Test cancel saat menghapus berita
     */
public function test_user_hapus_exception_berita()
{
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create(); // Sementara karena berita masih menggunakan login petani jadi direct ke tampilan petani
        $berita = Berita::factory()->create();

        $browser->loginAs($user)
            ->visit('/berita')
            ->assertSee('Data Berita')
            ->click('@lihat-'.$berita->id)
            ->assertPathIs('/berita/'.$berita->id.'/detail-admin')
            ->assertSee('Detail Berita')
            ->press('Hapus')
            ->dismissDialog(); //Klik cancel
    });
}
}