<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BivaPointTransaction extends Model
{
      protected $table = 'biva_point_transactions';// Explicitly define the table name


      protected $fillable = [
        'user_id',
        'order_id',
        'type',
        'points',
        'description',
    ];

  public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

}
