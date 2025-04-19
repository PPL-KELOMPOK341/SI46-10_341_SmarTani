<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController; // Menggunakan BaseController dari Illuminate

// Kelas ini adalah kelas dasar untuk controller lain
abstract class Controller extends BaseController
{
    // Anda bisa menambahkan method umum untuk controller di sini jika diperlukan

    // Contoh constructor jika Anda membutuhkan dependency injection
    public function __construct()
    {
        // Menambahkan middleware global jika diperlukan
        $this->middleware('auth');
    }
}
