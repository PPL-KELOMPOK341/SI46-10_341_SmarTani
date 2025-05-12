<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Dummy data sementara
        $totalUsers = 50;
        $totalPengaduan = 10;

        return view('beranda-admin', compact('totalUsers', 'totalPengaduan'));
    }
}
