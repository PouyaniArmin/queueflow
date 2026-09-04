<?php

namespace Models;

use PhpParser\Node\Expr\AssignOp\Mod;

class BusinessOwnerships extends Models
{
    protected string $table = 'business_ownerships';
    protected array $fillable = ['user_id', 'business_id'];
}
