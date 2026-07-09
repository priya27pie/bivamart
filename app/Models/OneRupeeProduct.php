<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OneRupeeProduct extends Model
{
    //
      protected $table = 'one_rupee_products';// Explicitly define the table name

     protected $fillable = [
        'id','created_at','updated_at','product_id','offer_price','stock','status','product_type'
      ];  

}
