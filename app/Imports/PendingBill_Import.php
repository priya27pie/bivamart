<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class PendingBill_Import implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Skip heading row
        foreach ($rows->skip(1) as $row) {

            $billNo = trim($row[0]);          // Bill No
            $tentativeDate = $row[12];        // Tentative Date

            $order = Order::where('order_id', $billNo)->first();

            if (!$order) {
                continue;
            }

            if (!empty($tentativeDate)) {

                // Convert Excel date to Y-m-d
                if (is_numeric($tentativeDate)) {
                    $tentativeDate = ExcelDate::excelToDateTimeObject($tentativeDate)
                        ->format('Y-m-d');
                } else {
                    $tentativeDate = Carbon::parse($tentativeDate)
                        ->format('Y-m-d');
                }

                $order->tentative_date = $tentativeDate;
                $order->status = 'Confirmed';
                $order->save();
            }
        }
    }
}