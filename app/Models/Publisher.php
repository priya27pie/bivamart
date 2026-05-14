<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //
     protected $table = 'publishers';// Explicitly define the table name

    protected $fillable = [
        'name','id','email','phone','description','picture'
      ];  
}
