<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CouponController extends Controller
{
  public function applyCoupon(Request $request)
{
    $coupon = Coupon::where('coupon_code', $request->coupon)
        ->where('status', 1)
        ->first();

    if (!$coupon) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid coupon code'
        ]);
    }

    if ($coupon->expiry_date < Carbon::today()) {
        return response()->json([
            'status' => false,
            'message' => 'Coupon expired'
        ]);
    }

    $cart = session()->get('cart', []);

    $subtotal = 0;

    foreach ($cart as $item) {
        $price = $item['discounted_price'] ?? $item['price'];
        $subtotal += $price * $item['quantity'];
    }

    if ($subtotal < $coupon->min_order_amount) {
        return response()->json([
            'status' => false,
            'message' => 'Minimum order amount is ₹'.$coupon->min_order_amount
        ]);
    }

    if ($coupon->discount_type == 'percent') {
        $discount = ($subtotal * $coupon->discount_value) / 100;
    } else {
        $discount = $coupon->discount_value;
    }

    session()->put('coupon', [
        'code' => $coupon->coupon_code,
        'discount' => $discount
    ]);

    return response()->json([
        'status' => true,
        'discount' => round($discount,2),
        'grand_total' => round($subtotal - $discount,2)
    ]);
}

}
