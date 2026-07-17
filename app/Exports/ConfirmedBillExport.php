<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConfirmedBillExport implements FromCollection,WithHeadings
{
    protected $date1;
    protected $date2;

    public function __construct($date1 = null, $date2 = null)
    {
        $this->date1 = $date1;
        $this->date2 = $date2;
    }

     public function collection()
{
    $query = Order::with('items')
        ->where('status', 'Confirmed');

    if ($this->date1) {
        $query->whereDate('created_at', '>=', $this->date1);
    }

    if ($this->date2) {
        $query->whereDate('created_at', '<=', $this->date2);
    }

    $orders = $query->latest()->get();

    $rows = collect();

    foreach ($orders as $order) {

    $products = $order->items->map(function ($item) {
        return optional($item->product_details)->title . ' (Qty: ' . $item->qty . ')';
    })->implode(', ');

            $rows->push([
        'Bill No'          => $order->order_id,
        'Bill Date'        => $order->created_at->format('d-m-Y'),
        'Customer Name'    => $order->shipping_name,
        'Phone'            => $order->shipping_phone,
        'Customer Address' => $order->address,
        'Landmark'         => $order->shipping_landmark,
        'City'             => $order->shipping_city,
        'State'            => $order->shipping_state,
        'Pincode'          => $order->shipping_pincode,
        'Product'          => $products,
        'Weight'           => $order->totalweight,
        'Total Amount'     => $order->total_amount,
        'Shipping Charge'  => $order->shipping_charge,
        'COD Charge'       => $order->codcharge,
        'Coupon Code'      => $order->coupon_code,
        'Coupon Charge'    => $order->coupon_discount,
        'Payment Method'   => $order->payment_method,
        'Payment Status'   => $order->payment_status,
        'Transaction ID'   => $order->transaction_id,
        'Status'           => $order->status,
        'Tentative Date'   => $order->tentative_date,
        'Packing Date'      =>$order->packing_date
        
          ]);
        }
    

    return $rows;
}
 public function headings(): array
    {
        return [
             'Bill No',
            'Bill Date',
            'Customer Name',
            'Phone',
            'Customer Address',
            'Landmark',
            'City',
            'State',
            'Pincode',
            'Product',
            'Total Weight',
            'Total Amount',
            'Shipping Charge',
            'COD Charge',
            'Coupon Code',
            'Coupon Charge',
            'Payment Method',
            'Payment Status',
            'Transaction ID',
            'Status',
            'Tentative Date',
            'Packing Date',
        ];
    }
}
