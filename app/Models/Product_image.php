<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{   

  protected $table = 'product_images';// Explicitly define the table name

     protected $fillable = [
        'id','product_id','images'
      ];  
}
