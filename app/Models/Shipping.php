<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $table = 'shipping';// Explicitly define the table name

    protected $fillable = [
        'citybase','id','citybase_next','statebase','statebase_next','spclpincode_base','spclpincode_nxt','countrybase_next','countrybase'
      ];  

}
