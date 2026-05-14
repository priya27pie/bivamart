<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Homepage;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Otherspecification;
use App\Models\Language;
use App\Models\Series;
use App\Models\Otherproduct;

class CartController extends Controller
{
  
  
public function index()
{
    $cart = session()->get('cart', []);
    $total = $this->cartTotal($cart);
    $mrptotal = $this->mrpTotal($cart); // ✅ ADD THIS
    $discounttotal = $this->discountTotal($cart); // ✅ ADD THIS


return view('cart', compact('cart','total','mrptotal','discounttotal'));
}
    //
  public function addAjax($product_id,Request $request)
{
    // fetch product
     $type = $request->type;
      $key = $type . '_' . $product_id;

    if($type == 'book') {

        $product = Product::where('product_id', $product_id)->firstOrFail();
    } else {
        $product = Otherproduct::where('product_id', $product_id)->firstOrFail();

    }
    $image = Product_image::where('product_id', $product_id)->first();
    $imageName = $image ? $image->images : 'no-image.png'; 
    $discounted = $product->discounted_price ?? $product->price;
    $qty = $request->quantity ?? 1;
    $cart = session()->get('cart', []);

    if(isset($cart[$key])) {
             $cart[$key]['quantity'] += $qty;
    } else {
        $cart[$key] = [
           "product_id" => $product_id,
            "name" => $product->title,
            "discounted_price" => $discounted,
            "price" => $product->price,
            "quantity" => $qty,
            "image" => $imageName,
            "type" => $type ,  // ✅ store type
            "weight" => $product->weight
        ];
    }

    session()->put('cart', $cart);

    $count = array_sum(array_column($cart, 'quantity'));

    return response()->json([
        'status' => 'success',
        'message' => 'Added to cart',
        'cart_count' => $count
    ]);
}

public function update(Request $request)
{
    $cart = session()->get('cart', []);
    $key = $request->key;

       if(isset($cart[$key])) {

        $cart[$key]['quantity'] = max(1, (int)$request->quantity);

        session()->put('cart', $cart);
    }

    return response()->json([
        'success' => true,
        'total' => $this->cartTotal($cart), // ✅ ADD THIS
        'mrptotal' => $this->mrpTotal($cart), // ✅ ADD THIS
        'cart_count' => array_sum(array_column($cart, 'quantity')), // ✅ ADD THIS
        'discounttotal' => $this->discountTotal($cart), 
    ]);
}

private function cartTotal($cart)
{
    return array_sum(array_map(function($item){
        return ($item['discounted_price'] ?? $item['price']) * $item['quantity'];
    }, $cart));
}
private function mrpTotal($cart){

  return array_sum(array_map(function($item){
        return ($item['price'] ?? $item['price']) * $item['quantity'];
    }, $cart));
}
private function discountTotal($cart){

  return array_sum(array_map(function($item){
        return (($item['price'] - $item['discounted_price']) * $item['quantity']);

            }, $cart));
} 



public function remove(Request $request)
{
    $key = $request->key;

    $cart = session()->get('cart', []);

    if(isset($cart[$key])) {
        unset($cart[$key]);
        session()->put('cart', $cart);
    }

    return back();
}
}