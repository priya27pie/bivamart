<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class ShippedBillImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Skip heading row
        foreach ($rows->skip(1) as $row) {

            $billNo = trim($row[0]);          // Bill No
            $delivery_date = $row[18];        // delivery_date Date

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

                $order->delivery_date = $delivery_date;
                $order->status = 'Delivered';
                $order->save();
            }
        }
    }
}