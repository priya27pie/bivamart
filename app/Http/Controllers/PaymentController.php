<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;



class PaymentController extends Controller
{

public function razorpayCheckout($order)
{
    $orderData = Order::where('order_id', $order)->first();

    $amount = $orderData->total_amount
            + $orderData->shipping_charge
            - $orderData->coupon_discount;

    $api = new Api(
        env('RAZORPAY_KEY'),
        env('RAZORPAY_SECRET')
    );

    $razorpayOrder = $api->order->create([
        'receipt' => $order,
        'amount' => $amount * 100,
        'currency' => 'INR'
    ]);

    return view('razorpay', compact(
        'orderData',
        'razorpayOrder',
        'amount'
    ));
}


public function razorpaySuccess(Request $request, $order_id)
{
    $input = $request->all();

    $api = new Api(
        env('RAZORPAY_KEY'),
        env('RAZORPAY_SECRET')
    );

    try {

        $attributes = [
            'razorpay_order_id'   => $input['razorpay_order_id'],
            'razorpay_payment_id' => $input['razorpay_payment_id'],
            'razorpay_signature'  => $input['razorpay_signature']
        ];

        $api->utility->verifyPaymentSignature($attributes);

        // Payment verified successfully

        $order = Order::where('order_id', $order_id)->firstOrFail();

        // Update it
        $order->payment_method = 'Online';
        $order->payment_status = 'Paid';
        $order->pay_status = 'Paid';
        $order->transaction_id = $input['razorpay_payment_id'];
        $order->save();

    return redirect()->route('success')
    ->with('success', 'Payment Successful')
    ->with('order_id', $order_id)
    ->with('transaction_id', $input['razorpay_payment_id']);

    } catch (\Exception $e) {

        return redirect('/failure')
            ->with('error', 'Payment Verification Failed');
    }
}
}