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
}
