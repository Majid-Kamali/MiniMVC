<?php

namespace System;

class Config {
    protected static array $items = [];

    public static function load() {
        // ۱. لود کردن فایل .env (در صورت وجود)
        if (file_exists(__DIR__ . '/../.env')) {
            $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) continue;
                list($name, $value) = explode('=', $line, 2);
                putenv(trim($name) . "=" . trim($value));
            }
        }
        
        // ۲. لود کردن فایل‌های آرایه‌ای از پوشه config/
        foreach (glob(__DIR__ . '/../config/*.php') as $file) {
            $key = basename($file, '.php');
            if ($key !== 'Config') { // کلاس خودش را لود نکند
                static::$items[$key] = require $file;
            }
        }
    }

    public static function get($key, $default = null) {
        // قابلیت دسترسی با نقطه: database.host
        $parts = explode('.', $key);
        $data = static::$items;
        
        foreach ($parts as $part) {
            if (!isset($data[$part])) return getenv($key) ?: $default;
            $data = $data[$part];
        }
        return $data;
    }
}