<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PendingBill_Import;
use App\Imports\ConfirmedBillImport;
use App\Imports\PackedBillImport;
use App\Imports\ShippedBillImport;


class ImportController extends Controller
{
 public function importPendingBill(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls',
    ]);

    Excel::import(new PendingBill_Import, $request->file('file'));

    return back()->with('success', 'Pending Bills imported successfully.');
}
   
 public function importConfirmedBill(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls',
    ]);

    Excel::import(new ConfirmedBillImport, $request->file('file'));

    return back()->with('success', 'Cnnfirmed Bills imported successfully.');
}
 public function importPackedBill(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls',
    ]);

    Excel::import(new PackedBillImport, $request->file('file'));

    return back()->with('success', 'Packed Bills imported successfully.');
}   
 public function importShippedBill(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls',
    ]);

    Excel::import(new ShippedBillImport, $request->file('file'));

    return back()->with('success', 'Shipped Bills imported successfully.');
}   



   }
