<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'site_title' => 'SmarTani',
            'site_description' => 'SmarTani adalah sistem informasi modern yang memudahkan petani dalam mencatat hasil panen, memantau cuaca, dan menyimpan data riwayat hasil panen.',
            'site_version' => '1.0',
            'site_logo' => 'images/1748721776.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
