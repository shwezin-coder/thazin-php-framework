<?php 

require_once __DIR__.'/vendor/autoload.php';
use Thazin\Core\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
            'db' => [
                'dsn' => $_ENV['DB_DSN'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD']
            ]
        ];
$app = new Router(__DIR__,$config);

$app->db->applyMigrations();