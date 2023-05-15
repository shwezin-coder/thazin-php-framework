<?php 

require_once __DIR__.'/../vendor/autoload.php';
use Thazin\Core\Router;
$app = new Router(dirname(__DIR__));
require_once '../routes/web.php';