<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PackedBillExport implements FromCollection,WithHeadings
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
        ->where('status', 'Packed');

    if ($this->date1) {
        $query->whereDate('created_at', '>=', $this->date1);
    }

    if ($this->date2) {
        $query->whereDate('created_at', '<=', $this->date2);
    }

    $orders = $query->latest()->get();

    $rows = collect();

    foreach ($orders as $order) {

        foreach ($order->items as $item) {

            $rows->push([
                'Bill No'          => $order->order_id,
                'Bill Date'        => $order->created_at->format('d-m-Y'),
                'Customer'         => $order->shipping_name,
                'Phone'            => $order->shipping_phone,
                'Product'          => optional($item->product_details)->title,
                'Qty'              => $item->qty,
                'Price'            => $item->price,
                'Total Amount'     => $order->total_amount,
                'Shipping Charge'  => $order->shipping_charge,
                'Payment Method'   => $order->payment_method,
                'Transaction ID'   => $order->transaction_id,
                'Status'           => $order->status,
                'Tentative Date'   => $order->tentative_date,
                'Packing Date'      => $order->packing_date,
                'Shipping Date'      => $order->shipping_date,
                'Courier'           => $order->courier,
                'Awn No'            => $order->awn_code,
                'Tracking Url'       => $order->tracking_url,
            ]);
        }
    }

    return $rows;
}
 public function headings(): array
    {
        return [
            'Bill No',
            'Bill Date',
            'Customer',
            'Phone',
            'Product',
            'Qty',
            'Price',
            'Total Amount',
            'Shipping Charge',
            'Payment Method',
            'Transaction ID',
            'Status',
            'Tentative Date',
            'Packing Date',
            'Shipping Date',
            'Courier',
            'Awn No',
            'Tracking Url'
       ];
    }
}
