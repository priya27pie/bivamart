<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
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

            return redirect()->route('place_order', [
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

public function place_order(){

 $user = Auth::user();
 $user_state=$user->state;
 $user_address=$user->address;
 $user_pincode=$user->pincode;
 $user_city=$user->city;
 $user_landmark=$user->landmark;

    return view('place_order',compact('user_state','user_city','user_address','user_pincode','user_landmark'));
}

}