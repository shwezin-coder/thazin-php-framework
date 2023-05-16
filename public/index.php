<?php 

require_once __DIR__.'/../vendor/autoload.php';
use Thazin\Core\Router;


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];
$app = new Router(dirname(__DIR__),$config);
require_once '../routes/web.php';