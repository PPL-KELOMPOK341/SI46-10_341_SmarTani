<?php

use App\Models\Setting;

if (!function_exists('get_setting')) {
    function get_setting($field, $default = null)
    {
        $setting = Setting::first();

        return $setting ? $setting->{$field} : $default;
    }
}
