<?php

namespace App\Http\Controllers;

//use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Subcategory;
use App\Models\Otherproduct;
use App\Models\Otherspecification;
use App\Models\Series;
use App\Models\Brand;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Exports\PendingBillExport;
use App\Exports\ConfirmedBillExport;
use App\Exports\PackedBillExport;
use App\Exports\ShippedBillExport;
use App\Exports\DeliveredBillExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
   
    public function exportPendingBill(Request $request)
    {
        return Excel::download(
            new PendingBillExport($request->date1, $request->date2),
            'Pending_Bills.xlsx'
        );
    }
   
    public function exportConfirmedBill(Request $request)
    {
        return Excel::download(
            new ConfirmedBillExport($request->date1, $request->date2),
            'Confirmed_Bills.xlsx'
        );
    }
  public function exportPackedBill(Request $request)
    {
        return Excel::download(
            new PackedBillExport($request->date1, $request->date2),
            'Packed_Bills.xlsx'
        );
    }
     public function exportShippedBill(Request $request)
    {
        return Excel::download(
            new ShippedBillExport($request->date1, $request->date2),
            'Shipped_Bills.xlsx'
        );
    }
      public function exportDeliveredBill(Request $request)
    {
        return Excel::download(
            new DeliveredBillExport($request->date1, $request->date2),
            'Delivered_Bills.xlsx'
        );
    }

}
