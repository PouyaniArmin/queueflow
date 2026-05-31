<?php

namespace Database;

use Exception;

use function PHPUnit\Framework\throwException;

class MigrationConfig
{
    private static function migrationsTable(): array
    {
        return [
            'roels'               =>"migrations/001-create-roles.sql",
            'users'               => "migrations/001-create-users.sql",
            'businesses'          => "migrations/001-create-businesses.sql",
            'business_ownerships' => "migrations/001-create-business_ownerships.sql",
            'services'            => "migrations/001-create-services.sql",
            'appointments'        => "migrations/001-create-appointments.sql",
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
