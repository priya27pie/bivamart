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
        'coupon_id',
        'payment_method',
        'pay_status',
        'transaction_id',
        'cancel_reason',
        'cancelled_at',
        'cancelled_by',
        'specialmention',
        'tentative_date',
        'packing_date',
        'courier',
        'awn_code',
        'tracking_url',
        'shipping_date',
        'delivery_date',
        'codcharge',
        'biva_points_used',
        'biva_discount',
        'totalweight',
        'shipping_mail',
        'totalmrp'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}