<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
     protected $table = 'couriers';// Explicitly define the table name

    protected $fillable = [
        'name','website','id','created_at','updated_at'];
}
