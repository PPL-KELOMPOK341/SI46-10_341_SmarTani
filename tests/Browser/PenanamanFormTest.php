<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Penanaman;

class PenanamanFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group penanaman-form
     */

    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('penanaman-form')]
    public function user_dapat_mengisi_form_penanaman_dengan_benar()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();

            $browser->loginAs($user)
                    ->visit('/form-pencatatan')
                    ->assertSee('Pencatatan')
                    ->clickLink('Form Pencatatan Penanaman')
                    ->assertPathIs('/form-penanaman')
                    ->assertSee('FORM PENANAMAN')
                    ->type('nama_tanaman', 'Lidah Buaya')
                    ->type('lokasi_lahan', 'Jl. Cimaung RT.001/RW.002')
                    ->type('luas_lahan', 200)
                    ->select('periode', 'Periode II')
                    ->value('input[name="tanggal_penanaman"]', '2025-04-17')
                    ->type('jumlah_pupuk', 200)
                    ->type('jumlah_bibit', 100)
                    ->select('jenis_pestisida', 'Herbisida')
                    ->select('jenis_pupuk', 'NPK')
                    ->type('kendala', 'Hama ringan')
                    ->type('catatan', 'Perlu penyuluhan tambahan')
                    ->press('Simpan')
                    ->pause(2000);
            
            $penanaman = Penanaman::latest()->first();

            $browser->assertPathIs('/form-penanaman/hasil/'.$penanaman->id);

            $browser->visit('/riwayat-penanaman')
                    ->assertSee('Riwayat Penanaman');

        });
    }

    /**
     * A Dusk test example.
     * @group update-penanaman
     */

    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('update-penanaman')]
    public function user_dapat_melihat_detail_dan_update_data_penanaman()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $penanaman = Penanaman::factory()->create([
                'user_id' => $user->id
            ]);

            $browser->loginAs($user)
                    ->visit('/riwayat-penanaman')
                    ->clickLink('Detail') // pastikan ini nama tombol/link di tabel
                    ->assertPathIs('/riwayat-penanaman/detail/'.$penanaman->id)
                    ->assertSee($penanaman->nama_tanaman)
                    ->clickLink('Ubah')
                    ->assertPathIs('/penanaman/'.$penanaman->id.'/edit')
                    ->type('nama_tanaman', 'Pohon Mangga')
                    ->value('input[name="tanggal_penanaman"]', '2025-04-17')
                    ->press('Update')
                    ->pause(2000);

            $browser->assertPathIs('/riwayat-penanaman')
                    ->assertSee('Pohon Mangga');
        });
    }

    /**
     * A Dusk test example.
     * @group delete-penanaman
     */

    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('delete-penanaman')]
    public function user_dapat_menghapus_data_penanaman()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            $penanaman = Penanaman::factory()->create([
                'user_id' => $user->id
            ]);

            $browser->loginAs($user)
                    ->visit('/riwayat-penanaman')
                    ->clickLink('Detail')
                    ->assertPathIs('/riwayat-penanaman/detail/'.$penanaman->id)
                    ->press('Hapus')
                    ->acceptDialog();

            $browser->assertPathIs('/riwayat-penanaman')
                    ->assertDontSee($penanaman->nama_tanaman);
        });
    }
}


