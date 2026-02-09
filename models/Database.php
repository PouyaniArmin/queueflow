<?php

namespace Models;

use Dotenv\Util\Str;
use Exception;
use PDO;
use PDOException;

class Database
{
    private ?PDO $conn;
    public function __construct()
    {
        try {
            $dsn = "pgsql:host=172.17.0.2;port=5432;dbname=queueflow_db";
            $this->conn = new PDO($dsn, 'armin', '1234');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Error Connection to postgres : {$e->getMessage()}");
        }
    }
}
