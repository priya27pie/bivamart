<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
        protected $table = 'brands';// Explicitly define the table name

    protected $fillable = [
        'name','id','location','phone','picture'
      ];
}
