<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otherspecification extends Model
{
   protected $table = 'other_specifications';// Explicitly define the table name

    protected $fillable = [
        'product_id','id','label_name','lable_value'
      ];  

      
}
