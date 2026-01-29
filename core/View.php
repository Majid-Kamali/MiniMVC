<?php

namespace Core;

class View
{
    public static function render($filePath, $data = array())
    {
        extract($data);

        ob_start();
        require_once(__DIR__ . "/../view/" . $filePath);
        $content = ob_get_clean();

        require_once(__DIR__ . "/../view/theme/default.php");
    }
}
