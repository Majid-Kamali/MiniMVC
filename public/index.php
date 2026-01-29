<?php
require_once __DIR__ . '/../vendor/autoload.php';

// مسیرهای فیزیکی مهم
define('ROOT_PATH', realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);
define('BASE_URL', 'http://simpleRouter.local/');
define('APP_PATH', ROOT_PATH . 'app' . DIRECTORY_SEPARATOR);
define('CORE_PATH', ROOT_PATH . 'core' . DIRECTORY_SEPARATOR);
define('CONFIG_PATH', ROOT_PATH . 'config' . DIRECTORY_SEPARATOR);

require_once __DIR__ . '/../core/Config.php';

require_once __DIR__ . '/../core/Helper.php';

use Core\Router;
use Core\Request;


$router = new Router();

require_once __DIR__ . '/../router/web.php';


$router->resolve(Request::uri(), Request::method());
