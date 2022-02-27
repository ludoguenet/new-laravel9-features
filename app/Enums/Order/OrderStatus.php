<?php

namespace App\Enums\Order;

enum OrderStatus: string
{
    case Success = 'success';
    case Pending = 'pending';
    case Failed = 'failed';
}
