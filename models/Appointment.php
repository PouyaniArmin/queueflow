<?php

namespace Models;

class Appointment extends Models
{
    protected string $table = 'appointments';
    protected array $fillable = ['business_id', 'service_id', 'customer_id', 'date_time', 'status', 'notes', 'access_token']; 
    public function forUser(Int $userId): array
    {
        return $this->filterByRelation('business_ownerships', 'business_id', 'business_id', 'user_id', $userId);
    }
    public function todayForUser($userId):array{
        $data=$this->forUser($userId);
        $tody=date('Y-m-d');
        $result=array_filter($data,function ($appointment) use($tody) {
            return str_starts_with($appointment["date_time"],$tody);
        });
        return $result;
    }
}
