<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cod extends Model
{      

    protected $table = 'cod';// Explicitly define the table name

    protected $fillable = [
        'pincode','id','created_at','updated_at'];
}
