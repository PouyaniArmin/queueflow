<?php

namespace Config;

use Dotenv\Dotenv;
use Exception;

class Env
{
    private static $instance;
    private static $dotenv;
    private function __construct() {}
    private function __clone()
    {
        throw new \Exception('Cloning of singleton Env is not allowed.');
    }
    private function __wakeup()
    {
        throw new \Exception("Unserializing singleton Env is not allowed.");
    }
    public static function getInstance()
    {
        if (!isset(self::$instance) || self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public static function load(string $root)
    {
        if (!isset(self::$dotenv) || self::$dotenv === null) {
            self::$dotenv = Dotenv::createImmutable($root);
            self::$dotenv->safeLoad();
        }
    }
    public static function getEnv($key): mixed
    {
        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }
        return throw new Exception("The environment variable '{$key}' is missing. Please add it to your .env file");
    }
}
