<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;
use App\Models\User;
use App\Models\BivaPointTransaction;

class ShippedBillImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Skip heading row
        foreach ($rows->skip(1) as $row) {

            $billNo = trim($row[0]);          // Bill No
            $delivery_date = $row[26];        // delivery_date Date

            $order = Order::where('order_id', $billNo)->first();

            if (!$order) {
                continue;
            }

            if (!empty($delivery_date)) {

                // Convert Excel date to Y-m-d
                if (is_numeric($delivery_date)) {
                    $delivery_date = ExcelDate::excelToDateTimeObject($delivery_date)
                        ->format('Y-m-d');
                } else {
                    $delivery_date = Carbon::parse($delivery_date)
                        ->format('Y-m-d');
                }

//FOR COD ORDERS
    if($order->payment_method=='COD'){
     $order->payment_status = 'Paid'; 
    }

    // Add Biva Points to user table
    $users = User::where('id', $order->user_id)->firstOrFail();

    $points = floor($order->total_amount / 25); // ₹25 = 1 point

    $users->biva_points += $points;
    $users->save();

    // Save transaction history
    BivaPointTransaction::create([
        'user_id'     => $users->id,
        'order_id'    => $order->order_id, // Use the string order_id if that's what you store
        'type'        => 'earned',
        'points'      => $points,
        'description' => 'Earned on delivery of Order #' . $order->order_id,
    ]);


    $order->save();


                $order->delivery_date = $delivery_date;
                $order->status = 'Delivered';
                $order->save();
            }
        }
    }
}