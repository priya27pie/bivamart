<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';// Explicitly define the table name

    protected $fillable = [
        'category','id','title','author','series','language','publisher','no_of_pages','binding','edition','illustrations','isbn','price','discounted_price','discount','description','specification','product_id','published_on','trending','latest','min_age','max_age','tags','weight','special_tag','tagcolor','age','stock'
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
public function subcategories()
{
    return $this->belongsToMany(
        Subcategory::class,
        'product_subcategory',   // pivot table
        'product_id',            // foreign key in pivot
        'subcategory_id'       // related key
      
    );
}

public function authorData()
{
    return $this->belongsTo(Author::class, 'author');
}
public function publisherData()
{
    return $this->belongsTo(Publisher::class, 'publisher');
}
public function getAgeValueAttribute()
{
    if (!is_null($this->min_age)) {
        return is_null($this->max_age)
            ? $this->min_age . '+'
            : $this->min_age . '-' . $this->max_age;
    }
    return '';
}
public function images(){
    return $this->hasMany(Product_image::class, 'product_id', 'product_id');
}

public function seriesData()
{
    return $this->belongsTo(Series::class, 'series');
}
}
