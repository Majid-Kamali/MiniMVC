<?php

namespace Core;


class Request
{
    public static function uri()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getBody()
    {

        $request = [];
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            foreach ($_GET as $key => $value) {
                $request[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        } elseif ($method === 'POST') {
            foreach ($_POST as $key => $value) {
                $request[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $request;
    }
}
