<?php

namespace Models;

use Dotenv\Util\Str;
use Exception;
use PDO;
use PDOException;

class Database
{
    private static $instance;
    private ?PDO $conn;
    private function __construct()
    {
    }
    private function __clone()
    {
        throw new \Exception('Not implemented');
    }
    private function __wakeup(){
        
    }
}
