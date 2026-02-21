<?php
namespace Models;

class Service extends Models{
    protected string $table='services';
    protected array $fillable=['business_id','name','duration_minutes','price'];
}