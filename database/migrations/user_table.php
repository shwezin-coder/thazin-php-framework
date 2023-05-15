<?php 
use Thazin\Core\Router;
class user_table{
    public function up()
    {
        $db = Router::$router->db;
        $SQL = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR (255) NOT NULL,
            first_name VARCHAR (255) NOT NULL,
            last_name VARCHAR (255) NOT NULL,
            status INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }
    public function down()
    {
        $db = Router::$router->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}