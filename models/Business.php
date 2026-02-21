<?php
namespace Models;

class Business extends Models{
    protected string $table='businesses';
    protected array $fillable=['name','slug','address','phone'];
}