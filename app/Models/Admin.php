<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins'; // Explicitly define the table name

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
