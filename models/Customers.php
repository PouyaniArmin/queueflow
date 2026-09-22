<?php

namespace Models;

class Customers extends Models
{
    protected string $table = 'customers';
    protected array $fillable = ['business_id', 'user_id', 'name', 'phone', 'email', 'notes'];
    public function forUser(Int $userId): array
    {
        return $this->filterByRelation('business_ownerships', 'business_id', 'business_id', 'user_id', $userId);
    }
}
