<?php
namespace Models;

class Role extends Models{
    protected string $table='roles';
    protected array $fillable=['name','description'];
}