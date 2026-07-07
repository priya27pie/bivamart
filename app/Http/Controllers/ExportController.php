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
use App\Exports\ShippedBillExport;
use App\Exports\PendingBillExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    public function exportShippedBill(Request $request)
    {
        return Excel::download(
            new ShippedBillExport($request->date1, $request->date2),
            'Shipped_Bills.xlsx'
        );
    }
    public function exportPendingBill(Request $request)
    {
        return Excel::download(
            new PendingBillExport($request->date1, $request->date2),
            'Pending_Bills.xlsx'
        );
    }
}
