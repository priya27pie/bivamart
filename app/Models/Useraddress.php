<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    //

     protected $table = 'useraddresses';// Explicitly define the table name

    protected $fillable = [
        'id','user_id','user_name','user_email','user_phone','address','city','pincode','state','landmark'
      ];  

        public function user()
    {
        return $this->belongsTo(User::class);
    }
}

