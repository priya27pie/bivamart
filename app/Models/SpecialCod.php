<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialCod extends Model
{
   protected $table = 'special_cod';// Explicitly define the table name

    protected $fillable = [
        'pincode','id','created_at','updated_at'];
}
