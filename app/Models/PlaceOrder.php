<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceOrder extends Model
{
   protected $fillable = [
    'order_id',
    'amount',
    'user_id',
    'client_name',
    'email',
    'phon',
    'pay_status',
    'status'
];
}
