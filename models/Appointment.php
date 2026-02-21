<?php
namespace Models;

class Appointment extends Models{
    protected string $table='appointments';
    protected array $fillable=['business_id','service_id','customer_name','customer_phone','date_time','status','notes'];
}