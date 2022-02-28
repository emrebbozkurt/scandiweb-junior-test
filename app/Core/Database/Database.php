<?php

namespace App\Core\Database;

use PDO;
use PDOException;

class Database
{
    protected $pdo;
    protected string $host;
    protected string $port;
    protected string $name;
    protected string $user;
    protected string $pass;

    function __construct()
    {
        $this->pdo = $this->connect();
    }

    private function connect()
    {
        $this->host = DB_HOST;
        $this->port = DB_PORT;
        $this->name = DB_NAME;
        $this->user = DB_USER;
        $this->pass = DB_PASS;

        try {
            $connect = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->name . ";charset=utf8mb4";
            $options = [PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC];
            return $this->pdo = new PDO($connect, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            http_response_code(500);
            return die('Database Connection Error: ' . $e->getMessage() . ' (check database connection variables on the app.php)');
        }
    }
}