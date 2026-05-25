<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
    'order_id',
    'product_id',
    'product_name',
    'quantity',
    'price',
    'order_time',
    'user_id',
    'total'
];}
