<?php

namespace Database;

use Exception;

use function PHPUnit\Framework\throwException;

class MigrationConfig
{
    private static function migrationsTable(): array
    {
        return [
            'users'               => "migrations/001-create-users.sql",
            'businesses'          => "migrations/002-create-businesses.sql",
            'business_ownerships' => "migrations/003-create-business_ownerships.sql",
            'services'            => "migrations/004-create-services.sql",
            'appointments'        => "migrations/005-create-appointments.sql",
        ];
    }
    public static function tables(): array
    {
        $migratines = self::migrationsTable();
        $data = [];
        foreach ($migratines as $name => $path) {
            if (file_exists(__DIR__ . "/$path")) {
                $sql = file_get_contents(__DIR__ . "/$path");
                $data[$name] = $sql;
            } else {
                throw new Exception("Error Not Found sql file");
            }
        }
        return $data;
    }
}
