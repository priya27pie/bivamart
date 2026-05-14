<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';// Explicitly define the table name

    protected $fillable = [
        'name','id','category_id','image'
      ];  

 /*   public function products(){
    return $this->belongsToMany(Product::class, 'product_subcategory');
}  
*/
public function products(){
    return $this->belongsToMany(Product::class, 'product_subcategory', 'subcategory_id', 'product_id');
}

public function otherproducts(){
    return $this->belongsToMany(Otherproduct::class, 'otherproduct_subcategory', 'subcategory_id', 'otherproduct_id');
}
}

