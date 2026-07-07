<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';// Explicitly define the table name

    protected $fillable = [
        'category','id',
      ];  

        public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
}

