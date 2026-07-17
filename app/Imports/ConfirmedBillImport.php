<?php

namespace App\Imports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class ConfirmedBillImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Skip heading row
        foreach ($rows->skip(1) as $row) {

            $billNo = trim($row[0]);          // Bill No
            $packing_date = $row[21];        // Tentative Date

            $order = Order::where('order_id', $billNo)->first();

            if (!$order) {
                continue;
            }

            if (!empty($packing_date)) {

                // Convert Excel date to Y-m-d
                if (is_numeric($packing_date)) {
                    $packing_date = ExcelDate::excelToDateTimeObject($packing_date)
                        ->format('Y-m-d');
                } else {
                    $packing_date = Carbon::parse($packing_date)
                        ->format('Y-m-d');
                }

                $order->packing_date = $packing_date;
                $order->status = 'Packed';
                $order->save();
            }
        }
    }
}