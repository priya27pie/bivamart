<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'qty',
        'price',
        'total'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

public function getProductDetailsAttribute()
{
    if (str_starts_with($this->product_id, 'PROD')) {
        return \App\Models\Product::where('product_id', $this->product_id)->first();
    }

    return \App\Models\Otherproduct::where('product_id', $this->product_id)->first();
}

public function getImageAttribute()
{
    $image = \App\Models\Product_image::where('product_id', $this->product_id)->first();

    return $image ? $image->images : 'no-image.png';
}
    
}