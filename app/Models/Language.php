<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    
    protected $table = 'languages';// Explicitly define the table name

    protected $fillable = [
        'language_name','id','picture'
      ];  
}
