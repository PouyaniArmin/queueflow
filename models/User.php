<?php 
namespace Models;

class User extends Models{
    protected string $table='users';
    protected array $fillable=['name','email','password','business_id'];
}