<?php

namespace Config;

use Dotenv\Dotenv;
use Exception;

class Env
{
    private static $instance;
    private static $dotenv;

    // Prevents direct instantiation to enforce the singleton pattern.
    private function __construct() {}

    // Prevents cloning of the singleton instance.
    private function __clone()
    {
        throw new \Exception('Cloning of singleton Env is not allowed.');
    }

    // Prevents unserialization of the singleton instance.
    private function __wakeup()
    {
        throw new \Exception("Unserializing singleton Env is not allowed.");
    }

    // Returns the shared singleton instance of the Env class.
    public static function getInstance()
    {
        if (!isset(self::$instance) || self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    // Loads environment variables from the specified root directory.
    public static function load(string $root)
    {
        if (!isset(self::$dotenv) || self::$dotenv === null) {
            self::$dotenv = Dotenv::createImmutable($root);
            self::$dotenv->safeLoad();
        }
    }

    // Returns an environment variable or throws an exception if it is missing.
    public static function getEnv($key): mixed
    {
        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }

        return throw new Exception(
            "The environment variable '{$key}' is missing. Please add it to your .env file"
        );
    }
}
