<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public static function get($key, $default = null)
    {
        return Setting::get($key, $default);
    }

    public static function set($key, $value)
    {
        return Setting::set($key, $value);
    }

    public static function allByGroup($group)
    {
        return Setting::where('group', $group)->get();
    }
}
