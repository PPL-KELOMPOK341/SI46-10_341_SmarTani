<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingWebsiteController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('setting-website', compact('setting'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['site_title', 'site_description', 'site_version']);

        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['site_logo'] = 'images/' . $filename;
        }

        Setting::updateOrCreate(['id' => 1], $data);

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan!');
    }
}
