<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
        //
     protected $table = 'reviews';// Explicitly define the table name

    protected $fillable = [
        'user_id','id','product_id','order_id','product_id','product_type','review','rating',
      ];  

public function user()
{
    return $this->belongsTo(User::class);
}
}
