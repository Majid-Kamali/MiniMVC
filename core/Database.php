<?php

namespace Core;

return [
    'host' => getenv('DB_HOST') ?: '127.0.0.1',
    'db'   => getenv('DB_NAME') ?: 'test',
    'user' => getenv('DB_USER') ?: 'root',
    'pass' => getenv('DB_PASS') ?: '',
];