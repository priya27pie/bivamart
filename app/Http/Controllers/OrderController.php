<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Useraddress;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
            'status'        => 'Pending',
            'address'       => $user->address
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

            return redirect()->route('place.order', [
                'order'   => $oid,
                'no_of_p' => array_sum($item_qtys)
            ]);
        }
    }
public function orders(){

$user = Auth::user();
$addresses = Auth::user()->addresses;

$state_list = DB::table('state_list')->get();

return view('orders',compact('state_list','user','addresses'));
}
public function place_order(){

 $user = Auth::user();
 $user_state=$user->state;
 $user_address=$user->address;
 $user_pincode=$user->pincode;
 $user_city=$user->city;
 $user_landmark=$user->landmark;

    return view('place_order',compact('user_state','user_city','user_address','user_pincode','user_landmark'));
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
   return redirect()->back()
            ->with('success', 'Address added successfully');
   // return redirect()->route('order_details')->with('success', 'Address updated successfully');
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
    }

    $order = Order::where('order_id', $order)->firstOrFail();

    $totalWeight = DB::table('order_items')
        ->join('products', 'products.product_id', '=', 'order_items.product_id')
        ->where('order_items.order_id', $order->id)
        ->selectRaw('SUM(products.weight * order_items.qty) as total_weight')
        ->value('total_weight');

    $shipping = $this->calculateShipping($pincode, $totalWeight);

    $shippingData['shipping_charge'] = $shipping;

    // Avoid adding shipping repeatedly
    $shippingData['total_amount'] = $order->total_amount;
    // Use your actual subtotal column name

    $order->update($shippingData);

    return response()->json([
        'shipping' => $shipping,
        'total'    => $shippingData['total_amount']
    ]);
}


}