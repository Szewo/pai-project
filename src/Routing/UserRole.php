<?php

namespace App\Routing;

enum UserRole: int
{
    case ANONYMOUS = 1;
    case REGISTERED = 2;
    case ADMIN = 3;
}