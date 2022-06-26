<?php

namespace App\Attributes;

use App\Routing\UserRole;

#[\Attribute]
class Route
{
    public function __construct(public string $path, public string $method = 'GET', public UserRole $role = UserRole::ANONYMOUS)
    {

    }
}