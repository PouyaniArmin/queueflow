<?php

namespace Models;

class User extends Models
{
    protected string $table = 'users';
    protected array $fillable = [
        'name',
        'email',
        'password_hash',
        'phone',
        'role_id',
    ];

    public function findByEmail(string|int $value)
    {
        return $this->selectFindOneBy('email', $value);
    }
}
