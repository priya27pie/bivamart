<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';// Explicitly define the table name

    protected $fillable = [
        'user_id','product_id','created_at','updated_at'];


// Wishlist.php

public function product()
{
    return $this->belongsTo(Product::class, 'product_id', 'product_id');
}
public function otherproduct()
{
    return $this->belongsTo(Otherproduct::class, 'product_id', 'product_id');
}    
}
