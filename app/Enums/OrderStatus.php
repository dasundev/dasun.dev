<?php

declare(strict_types=1);

namespace App\Enums;

enum OrderStatus: string
{
    case UNPAID = 'unpaid';
    case PAID = 'paid';
}
