<?php

namespace Core;

class Log
{
    private const LOG_DIR = __DIR__ . "/log";

    private static function createLogStructure($filename = null)
    {
        if (!file_exists(self::LOG_DIR)) {
            mkdir(self::LOG_DIR, 0777, true);
        }

        $date = date("Y-m-d");
        $name = $filename ? "log_{$filename}.log" : "log_{$date}.log";
        return self::LOG_DIR . "/" . $name;
    }

    private static function formatData($data)
    {
        if (is_array($data) || is_object($data)) {
            return print_r($data, true);
        }
        return (string)$data;
    }

    private static function save($message, $filename, $level = 'INFO')
    {
        $path = self::createLogStructure($filename);
        $content = self::formatData($message);

        $timestamp = date("H:i:s");
        $formattedMessage = "[$timestamp][$level] " . $content . PHP_EOL;
        file_put_contents($path, $formattedMessage, FILE_APPEND);
    }

    public static function info($message, $filename = null)
    {
        self::save($message, $filename, 'INFO');
    }

    public static function error($message, $filename = null)
    {
        self::save($message, 'ERROR', $filename);
    }

    public static function warning($message, $filename = null)
    {
        self::save($message, 'WARNING', $filename);
    }
}
