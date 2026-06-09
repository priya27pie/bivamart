<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'total_amount',
        'payment_status',
        'status',
        'address',
        'shipping_name',
        'shipping_phone',
        'shipping_address',
        'shipping_landmark',
        'shipping_city',
        'shipping_state',
        'shipping_pincode',
        'shipping_charge',
        'total_discount',
        'coupon_code',
        'coupon_discount',
        'coupon_id'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}