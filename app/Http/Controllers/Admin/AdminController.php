<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Dummy data sementara
        $totalUsers = 50;
        $totalPengaduan = 10;

        return view('admin.dashboard_admin.beranda-admin', compact('totalUsers', 'totalPengaduan'));
    }
}
