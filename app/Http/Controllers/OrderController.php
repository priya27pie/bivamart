<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cod;
use App\Models\Useraddress;
use App\Models\User;
use App\Models\Product_image;
use App\Models\Product;
use App\Models\Otherproduct;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();

        // Generate unique order number
        $oid = 'ORD' . strtoupper(Str::random(8));

        // Create main order ONLY ONCE
        $order = Order::create([
            'order_id'      =>  $oid,          
            'user_id'       => $user->id,
            'total_amount'  => $request->sub_tot,
            'payment_status'=> 'Pending',
            'status'        => 'Initiated',
            'address'       => $user->address,
            'total_discount' => $request->sub_discount,
            'coupon_id' => $request->coupon_id,
            'coupon_code' => $request->couponcode,
            'coupon_discount' =>$request->coupon_discount ?: 0 ,
            
       ]);

        $item_names  = $request->product_name;
        $item_codes  = $request->code;
        $item_qtys   = $request->qty;
        $item_prices = $request->discounted_price;

        // Insert multiple products
        for ($i = 0; $i < count($item_names); $i++) {

            $qty   = $item_qtys[$i];
            $price = $item_prices[$i];

            $total = $qty * $price;

            OrderItem::create([
                'order_id'    => $order->id, // database relation
                'product_id'  => $item_codes[$i],
                'product_name'=> $item_names[$i],
                'qty'         => $qty,
                'price'       => $price,
                'total'       => $total
            ]);
        }

        // Redirect AFTER loop
        if (empty($user->address)) {

            return redirect()->route('orders', [
                'order'   => $oid,
                'no_of_p' => array_sum($item_qtys)
            ]);

        } else {

            return redirect()->route('orders', [
                'order'   => $oid,
                'no_of_p' => array_sum($item_qtys)
            ]);
        }
    }
public function orders(Request $request){

$user = Auth::user();
$addresses = Auth::user()->addresses;
$orderId = $request->order;

$state_list = DB::table('state_list')->get();
$order = Order::where('order_id', $orderId)->firstOrFail();

return view('orders',compact('state_list','user','addresses','order'));
}
public function place_order(Request $request,$order,$cod){

$order = Order::where('order_id', $order)->firstOrFail();
 
    return view('place_order',compact('order','cod'));
}
public function addAddress(Request $request){


     $users = Auth::user();
     $user_id=$users->id;
     $isFirstAddress = empty($users->address);

  
 if ($isFirstAddress) {

       $validated = $request->validate([
              'pincode'=>'required',
              'address' => 'required',
              'landmark' => 'required',
              'city' => 'required',
              'state' => 'required',
          ]);
        $users->update($validated);
        return redirect()->back()
            ->with('success', 'Address added successfully');
    }
       

     $validated = $request->validate([
              'user_name'=>'required',
             'user_phone'=>'required',
              'pincode'=>'required',
              'address' => 'required',
              'landmark' => 'required',
              'city' => 'required',
              'state' => 'required',
          ]);

         $validated['user_id'] = $users->id;


        Useraddress::create($validated);

   return redirect()->back() ->with('success', 'Address added successfully');
    //return redirect()->route('place_order')->with('success', 'Address updated successfully');
}

 public function calculateShipping($pincode, $weight)
{
    if (substr($pincode, 0, 3) == '700') {
        $base = 25;
        $extra = 20;
    } elseif (substr($pincode, 0, 1) == '7') {
        $base = 30;
        $extra = 25;
    } else {
        $base = 50;
        $extra = 30;
    }

    if ($weight <= 500) {
        return $base;
    }

    $extraBlocks = ceil(($weight - 500) / 500);

    return $base + ($extraBlocks * $extra);
}

    

public function selectAddress(Request $request, $order)
{

    if (empty($request->address_id)) {

    return redirect()->back()
        ->withInput()
        ->with('error', 'Please select a delivery address.');
}
    if ($request->address_id == 'primary') {

        $user = Auth::user();

        $shippingData = [
            'shipping_name'      => $user->name,
            'shipping_phone'     => $user->phone,
            'shipping_address'   => $user->address,
            'shipping_landmark'  => $user->landmark,
            'shipping_city'      => $user->city,
            'shipping_state'     => $user->state,
            'shipping_pincode'   => $user->pincode,
        ];

        $pincode = $user->pincode;
        $cod_available = Cod::where('pincode', $pincode)->exists() ? 1 : 0;

    } else {

        $address = UserAddress::findOrFail($request->address_id);

        $shippingData = [
            'shipping_name'      => $address->user_name,
            'shipping_phone'     => $address->user_phone,
            'shipping_address'   => $address->address,
            'shipping_landmark'  => $address->landmark,
            'shipping_city'      => $address->city,
            'shipping_state'     => $address->state,
            'shipping_pincode'   => $address->pincode,
        ];

        $pincode = $address->pincode;
        $cod_available = Cod::where('pincode', $pincode)->exists() ? 1 : 0;
    }

    $order = Order::where('order_id', $order)->firstOrFail();

    $totalWeight = DB::table('order_items')
        ->join('products', 'products.product_id', '=', 'order_items.product_id')
        ->where('order_items.order_id', $order->id)
        ->selectRaw('SUM(products.weight * order_items.qty) as total_weight')
        ->value('total_weight');

    $shipping = $this->calculateShipping($pincode, $totalWeight);

    $shippingData['shipping_charge'] = $shipping;
    $order['specialmention'] = $request->specialmention;

    // Avoid adding shipping repeatedly
    $shippingData['total_amount'] = $order->total_amount;
    // Use your actual subtotal column name

    $order->update($shippingData);

  
//dd('place_order/'.$order->order_id.'/'.$cod_available);
return redirect('place_order/'.$order->order_id.'/'.$cod_available);

}
public function paytype(Request $request, $order){
$orders = Order::where('order_id', $order)->firstOrFail();

 $validated = $request->validate([
              'payment_method'=>'required',

        ]);
   $orders->update($validated);
   if($request->payment_method=='COD'){

return redirect()->route('allorders')->with('success', 'Order Placed successfully!');;
//return redirect('bill/'.$order->order_id)->with('success', 'Order Placed successfully!');


   }else{
     return redirect()->route('razorpay.checkout', [
            'order' => $orders->order_id
        ]);
}

}
public function bill($order){ 

$order = Order::where('order_id', $order)->firstOrFail();
$order_item = OrderItem::where('order_id', $order->id)->get();
foreach ($order_item as $item) {

        if (str_starts_with($item->product_id, 'PROD')) {

            $product = Product::where('product_id', $item->product_id)->first();

        } elseif (str_starts_with($item->product_id, 'OPROD')) {

            $product = Otherproduct::where('product_id', $item->product_id)->first();

        } else {
            $product = null;
        }

        // Attach complete product details to the item
        $item->product_details = $product;
    }

$user = User::where('id', $order->user_id)->firstOrFail();


return view('bill',compact('order','order_item','user'));

}

public function allorders(){
      $user_id=Auth::user()->id;
      $orders = Order::where('user_id', $user_id)->orderBy('id', 'desc')->get();

    return view('allorders', compact('orders'));

}
public function order_details($order_id){
 $order = Order::where('order_id', $order_id)->firstOrFail();
$order_item = OrderItem::where('order_id', $order->id)->get();
   foreach ($order_item as $item) {

        $image = Product_image::where('product_id', $item->product_id)
                             ->first();

        $item->image = $image ? $image->images : 'no-image.jpg';
    }


$user = User::where('id', $order->user_id)->firstOrFail();

return view('order_details',compact('order','order_item','user'));

}
public function CancelOrder(Request $request){

 $request->validate([
        'reason' => 'required',
        'order_id' => 'required'
    ]);

 $order = Order::where('order_id', $request->order_id)->first();

 if (!$order) {
        return back()->with('error', 'Order not found.');
    }

    if (!in_array($order->status, ['Pending', 'Processing'])) {
        return back()->with('error', 'This order cannot be cancelled.');
    }

     $order->status = 'Cancelled';
    $order->cancel_reason = $request->reason;
    $order->cancelled_at = now();
    $order->save();

    return back()->with('success', 'Order cancelled successfully.');

}

}