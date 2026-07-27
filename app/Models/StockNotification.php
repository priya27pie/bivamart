<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockNotification extends Model
{
         protected $table = 'stock_notifications';// Explicitly define the table name

    protected $fillable = [
       'id','user_id','product_id','product_type'
      ];  


public function user()
{
    return $this->belongsTo(User::class);
}
}
