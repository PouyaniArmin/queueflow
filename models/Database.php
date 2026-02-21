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

    public static function ensureDefaultTables()
    {
        self::connection();
        if (self::$conn === null) {
            throw new Exception("Database connection not initialized. Call Database::connection() first.");
        }
        self::users();
        self::roles();
        self::users_roles();
        self::businesses();
        self::services();
        self::appointments();
    }
    private static function users()
    {
        $query = "CREATE TABLE IF NOT EXISTS users (
            id          SERIAL          PRIMARY KEY,
            name        VARCHAR(100)    NOT NULL,
            email       VARCHAR(255)    UNIQUE NOT NULL,
            password    VARCHAR(255)    NOT NULL,
            business_id INTEGER         DEFAULT NULL,
            created_at  TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
            updated_at  TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP);";
        self::$conn->exec($query);
    }

    private static function roles()
    {
        $query = "CREATE TABLE IF NOT EXISTS roles(
            id SERIAL PRIMARY KEY,
            name VARCHAR(50),
            description TEXT,
            created_at  TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
            updated_at  TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP);";
        self::$conn->exec($query);
        self::defaultRoles();
    }
    private static function defaultRoles()
    {
        $params = [
            [
                'name' => 'customer',
                'description' => 'Client who books and manages appointments'
            ],
            [
                'name' => 'business_owner',
                'description' => 'Business owner or manager who controls services, schedules, and bookings'
            ],
            [
                'name' => 'admin',
                'description' => 'System administrator with full access privileges'
            ]
        ];
        $query = "SELECT COUNT(*) FROM roles";
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        if ($result <= 0) {
            $sql = "INSERT INTO roles (name,description) VALUES (:name,:description)";
            $stmt = self::$conn->prepare($sql);
            foreach ($params as $role) {
                $stmt->bindValue(":name", $role['name'], PDO::PARAM_STR);
                $stmt->bindValue(":description", $role['description'], PDO::PARAM_STR);
                $stmt->execute();
            }
        }
    }
    private static function users_roles()
    {
        $query = "CREATE TABLE IF NOT EXISTS users_roles(
            user_id INTEGER NOT NULL,
            role_id INTEGER NOT NULL,
            created_at  TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (user_id, role_id),
            CONSTRAINT fk_users_roles FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            CONSTRAINT fk_users_roles_role FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE);";
        self::$conn->exec($query);
    }

    private static function businesses()
    {
        $query = "CREATE TABLE IF NOT EXISTS businesses (
            id              SERIAL                  PRIMARY KEY,
            name            VARCHAR(150)            NOT NULL,
            slug            VARCHAR(100)            UNIQUE NOT NULL,
            address         TEXT,
            phone           VARCHAR(20),
            is_active       BOOLEAN                 DEFAULT TRUE,
            created_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
            updated_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP);";
        self::$conn->exec($query);
    }

    private static function services()
    {
        $query = "CREATE TABLE IF NOT EXISTS services (
            id               SERIAL                  PRIMARY KEY,
            business_id      INTEGER                 NOT NULL,
            name             VARCHAR(150)            NOT NULL,
            duration_minutes INTEGER                 NOT NULL CHECK (duration_minutes > 0),
            price            DECIMAL(10, 2)          DEFAULT 0.00,
            is_active        BOOLEAN                 DEFAULT TRUE,
            created_at       TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
            updated_at       TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,

            CONSTRAINT fk_services_business
                FOREIGN KEY (business_id)
                REFERENCES businesses(id)
                ON DELETE CASCADE);";
        self::$conn->exec($query);
    }

    private static function appointments()
    {
        $query = "CREATE TABLE IF NOT EXISTS appointments (
            id              SERIAL                  PRIMARY KEY,
            business_id     INTEGER                 NOT NULL,
            service_id      INTEGER                 NOT NULL,
            customer_name   VARCHAR(100)            NOT NULL,
            customer_phone  VARCHAR(20)             NOT NULL,
            date_time       TIMESTAMP WITH TIME ZONE NOT NULL,
            status          VARCHAR(20)             NOT NULL 
                            CHECK (status IN ('pending', 'confirmed', 'cancelled', 'completed')) 
                            DEFAULT 'pending',
            notes           TEXT,
            created_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
            updated_at      TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
        
            CONSTRAINT fk_appointments_business
                FOREIGN KEY (business_id)
                REFERENCES businesses(id)
                ON DELETE CASCADE,
        
            CONSTRAINT fk_appointments_service
                FOREIGN KEY (service_id)
                REFERENCES services(id)
                ON DELETE RESTRICT);";
        self::$conn->exec($query);
    }
}
