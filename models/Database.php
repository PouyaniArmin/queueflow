<?php

namespace Models;

use Config\Env;
use Exception;
use PDO;
use PDOException;

class Database
{
    private static $instance;
    private static ?PDO $conn;
    private function __construct() {}
    private function __clone()
    {
        throw new \Exception('Cloning of singleton Database is not allowed.');
    }
    private function __wakeup()
    {
        throw new \Exception('Unserializing singleton Database is not allowed.');
    }
    public static function getInstance()
    {
        if (!isset(self::$instance) || self::$instance === null) {
            self::$instance = new Database;
        }
        return self::$instance;
    }
    public static function connection(): ?PDO
    {
        $server = Env::getEnv('DB_HOST');
        $port = Env::getEnv('DB_PORT');
        $dbname = Env::getEnv('DB_DATABASE');
        $user = Env::getEnv('DB_USERNAME');
        $password = Env::getEnv('DB_PASSWORD');
        $dsn = "pgsql:host={$server};port={$port};dbname={$dbname};";
        if (!isset(self::$conn) || self::$conn === null) {
            try {
                self::$conn = new PDO($dsn, $user, $password);
                $option = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ];
                foreach ($option as $attr => $value) {
                    self::$conn->setAttribute($attr, $value);
                }
            } catch (PDOException $pe) {
                throw new Exception("Exception Error Database class function connection : " . $pe->getMessage());
            }
        }
        return self::$conn;
    }
}
