<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    
     protected $table = 'series';// Explicitly define the table name
      protected $fillable = [
        'name','id','picture','link'
      ];  
}
