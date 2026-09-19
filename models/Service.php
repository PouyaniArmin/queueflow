<?php
namespace Models;

class Service extends Models{
    protected string $table='services';
    protected array $fillable=['business_id','name','duration_minutes','price','is_active'];
     public function forUser(Int $userId): array
    {
        return $this->filterByRelation('business_ownerships', 'business_id', 'business_id', 'user_id', $userId);
    }
    }