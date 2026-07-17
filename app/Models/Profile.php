<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
       protected $table = 'profile';// Explicitly define the table name

     protected $fillable = [
        'company_name',
        'title',
        'gst',
        'website',
        'city',
        'pincode',
        'address',
        'contact_person',
        'email',
        'phone',
        'watsapp',
        'logo',
        'favicon',
        'fb',
        'insta',
        'linkdin',
        'state'
        
    ];
}
