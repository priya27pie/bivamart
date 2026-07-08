<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otherproduct extends Model
{
    
     protected $table = 'otherproducts';// Explicitly define the table name

    protected $fillable = [
        'category','id','title','price','discounted_price','discount','description','specification','product_id','trending','sub_category','tags','special_tag','stock','tagcolor','brand','weight'
      ];  
public function categoryData()
{
    return $this->belongsTo(Category::class, 'category');
}

public function subcategoryData()
{
    return $this->belongsTo(Subcategory::class, 'sub_category'); 

    //sub_category is the column name of the product table products.category  →  categories.id
}

public function subcategories(){
    return $this->belongsToMany(
        Subcategory::class,
        'otherproduct_subcategory',// pivot table
        'otherproduct_id', // foreign key in pivot
        'subcategory_id'// related key
    );
}

public function images(){
    return $this->hasMany(Product_image::class, 'product_id', 'product_id');
}

public function otherSpecification()
{

    return $this->belongsTo(Otherspecification::class, 'otherspecification');

}


}
