<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class PackedBillImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Skip heading row
        foreach ($rows->skip(1) as $row) {

            $billNo = trim($row[0]);          // Bill No
            $shipping_date = $row[21];        // Tentative Date

            $order = Order::where('order_id', $billNo)->first();

            if (!$order) {
                continue;
            }

            if (!empty($shipping_date)) {

                // Convert Excel date to Y-m-d
                if (is_numeric($shipping_date)) {
                    $shipping_date = ExcelDate::excelToDateTimeObject($shipping_date)
                        ->format('Y-m-d');
                } else {
                    $shipping_date = Carbon::parse($shipping_date)
                        ->format('Y-m-d');
                }

                $order->shipping_date = $shipping_date;
                $order->courier = $row[22];
                $order->awn_code = $row[23];
                $order->tracking_url = $row[24];
                $order->status = 'Shipped';
                $order->save();
            }
        }
    }
}