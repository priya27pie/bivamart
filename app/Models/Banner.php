<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
  protected $table = 'banners';// Explicitly define the table name
      protected $fillable = [
        'link','place','picture','position',
      ];  
}
