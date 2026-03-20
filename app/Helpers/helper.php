<?php

use Illuminate\Support\Facades\Cache;
use App\Models\Review;
use App\Models\SystemConfig;

if (!function_exists('systemConfig')) {
    /**
     * Get system config value by key
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    function systemConfig($key = null, $default = null)
    {
        $config = SystemConfig::first();

        if (!$config) {
            return $default;
        }
        if (!$key) {
            return $config;
        }
        return $config->{$key} ?? $default;
    }
}

if (!function_exists('userReviews')) {
    function userReviews()
    {
        return Cache::remember('user_reviews', 3600, function () {
            return Review::get();
        });
    }
}
