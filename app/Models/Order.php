<?php

namespace App\Models;

use App\Enums\Order\OrderStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // protected $appends = [
    //     'link'
    // ];

    protected $casts = [
        'status' => OrderStatus::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function link(): Attribute
    {
        return Attribute::get(fn () => route('orders.show', $this));
    }

    // public function getLinkAttribute()
    // {
    //     return route('orders.show', $this);
    // }
}
