<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class BeritaControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function test_index_menampilkan_semua_berita()
    {
        $response = $this->get('/dashboard');
        
        $response->assertStatus(200);
        $response->assertSee('Berita Terkini');
        $response->assertSee('Harga Cabai Meningkat di Bandung');
        $response->assertSee('Cabe lagi mahal');
    }

    public function test_show_menampilkan_detail_berita()
    {
        $response = $this->get('/berita/harga-cabai-meningkat-di-bandung');
        
        $response->assertStatus(200);
        $response->assertSee('Harga Cabai Meningkat di Bandung');
        $response->assertSee('Harga cabai mengalami kenaikan yang signifikan');
    }

    public function test_show_menampilkan_404_untuk_slug_tidak_valid()
    {
        $response = $this->get('/berita/slug-tidak-ada');
        $response->assertStatus(404);
    }

    public function test_filter_berdasarkan_tanggal_dari()
    {

        $response = $this->get('/dashboard?dari=2024-06-03');
        
        $response->assertStatus(200);
        $response->assertSee('Harga Cabai Meningkat di Bandung');
        $response->assertDontSee('Cabe lagi mahal'); 
    }

    public function test_filter_berdasarkan_tanggal_sampai()
    {
        $response = $this->get('/dashboard?sampai=2024-05-31');
        
        $response->assertStatus(200);
        
        $response->assertSee('Panen Raya Membuat Harga Sayur Turun');
        $response->assertDontSee('Harga Cabai Meningkat di Bandung');
        $response->assertDontSee('Cabe lagi mahal');
    }

    public function test_filter_berdasarkan_keyword()
    {
        $response = $this->get('/dashboard?search=harga');
        
        $response->assertStatus(200);
        $response->assertSee('Harga Cabai Meningkat di Bandung');
        $response->assertDontSee('Cabe lagi mahal'); 
    }

    public function test_sorting_berita_terbaru()
    {
        $response = $this->get('/dashboard?sort=latest');
        
        $content = $response->getContent();
        $posLatest = strpos($content, 'Harga Cabai Meningkat di Bandung');
        $posOldest = strpos($content, 'Cabe lagi mahal');
        
        $this->assertTrue($posLatest !== false && $posOldest !== false);
    }

    public function test_menampilkan_pesan_jika_tidak_ada_berita()
    {
        $response = $this->get('/dashboard?search=keywordtidakada');
        $response->assertSee('Tidak ada berita ditemukan');
    }
}