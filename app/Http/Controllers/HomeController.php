<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Homepage;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Otherspecification;
use App\Models\Language;
use App\Models\Series;
use App\Models\Otherproduct;


class HomeController extends Controller
{
  
    public function index()
    {
    $banners = Banner::where('place', 'banner')->get();
    $homepage = Homepage::first();
    $latest_slider_id=$homepage->latest_slider;
      

    $relation = $homepage->latest_type === 'Books' ? 'products' : 'otherproducts';

    $subcategory = Subcategory::with([$relation . '.images'])->find($latest_slider_id);
    $products_latest = $subcategory ? $subcategory->$relation : [];

//dd($subcategory->otherproducts()->toSql());


  $first_slider_products = Subcategory::with(['products.images','products.authorData'])->find($homepage->first_slider);
  $first_sliderCategoryName = Subcategory::find($homepage->first_slider);
  $products_slider = $first_slider_products ? $first_slider_products->products : [];

$second_slider_products = Subcategory::with(['products.images','products.authorData'])->find($homepage->second_slider);
$second_sliderCategoryName = Subcategory::find($homepage->second_slider);
$products_slider2 = $second_slider_products ? $second_slider_products->products : [];

$third_slider_products = Subcategory::with(['otherproducts.images'])->find($homepage->third_slider);
$third_sliderCategoryName = Subcategory::find($homepage->third_slider);
$products_slider3 = $third_slider_products ? $third_slider_products->otherproducts : [];

$fourth_slider_products = Subcategory::with(['otherproducts.images'])->find($homepage->fourth_slider);
$fourth_sliderCategoryName = Subcategory::find($homepage->fourth_slider);
$products_slider4 = $fourth_slider_products ? $fourth_slider_products->otherproducts : [];

$fifth_slider_products = Subcategory::with(['otherproducts.images'])->find($homepage->fifth_slider);
$fifth_sliderCategoryName = Subcategory::find($homepage->fifth_slider);
$products_slider5 = $fifth_slider_products ? $fifth_slider_products->otherproducts : [];

$backtoschool_products = Subcategory::with(['otherproducts.images'])->find(23);
$products_backtoschool = $backtoschool_products ? $backtoschool_products->otherproducts : [];


//$homecategory1 = Subcategory::with(['products.images'])->find($homepage->homecategory1);
$homecategory1Name = Subcategory::find($homepage->homecategory1);
$homecategory2Name = Subcategory::find($homepage->homecategory2);
$homecategory3Name = Subcategory::find($homepage->homecategory3);
$homecategory4Name = Subcategory::find($homepage->homecategory4);
$homecategory5Name = Subcategory::find($homepage->homecategory5);


    $feedbacks =  DB::table('feedbacks')->get();
    $brands = Brand::all();




       return view('index',compact('banners','products_latest','homepage','products_slider','products_slider2','first_sliderCategoryName','second_sliderCategoryName','products_slider3','third_sliderCategoryName','products_slider4','fourth_sliderCategoryName','products_slider5','fifth_sliderCategoryName','products_backtoschool','feedbacks','brands','homecategory1Name','homecategory2Name','homecategory3Name','homecategory4Name','homecategory5Name'));

    }

public function single($type, $id, $product_id)
{
    // common data
    $categories = Category::all();
    $subcategories = Subcategory::all();

    // initialize variables (IMPORTANT)
    $product = null;
    $otherproducts = null;
    $authors = [];
    $publishers = [];
    $languages = [];
    $otherspecifications = [];
    $show_trending = [];

    if($type == 'book') {

        $authors = Author::all();
        $publishers = Publisher::all();   
        $languages = Language::all();

        $product = Product::with([
            'categoryData',
            'subcategories',
            'authorData',
            'publisherData',
            'images' // ✅ add this
        ])->findOrFail($id); 

        $product_images = $product->images;

        // trending books
        $trending_products = Subcategory::with(['products.images'])->find(15);
        $show_trending = $trending_products ? $trending_products->products : [];

    } else {

        $otherproducts = Otherproduct::with([
            'categoryData',
            'subcategoryData',
            'subcategories',
            'images' // ✅ add this
        ])->findOrFail($id);

        $product_images = $otherproducts->images;

        $otherspecifications = Otherspecification::where('product_id', $product_id)->get();

        // trending others
        $trending_products = Subcategory::with(['otherproducts.images'])->find(21);
        $show_trending = $trending_products ? $trending_products->otherproducts : [];
    }

    return view('single', compact(
        'type',
        'product',
        'otherproducts',
        'product_images',
        'categories',
        'subcategories',
        'publishers',
        'authors',
        'languages',
        'show_trending',
        'otherspecifications'
    ));
}

public function allbook(){

$subcategories  = Subcategory::where('category_id', '2')->get();
 $banners = Banner::where('place', 'bookbanner')->get();
 $homepage = Homepage::findOrFail(2);
 $authors = Author::all();
 $series = Series::all();
 $publishers = Publisher::all();
 $languages = Language::all();

 $first_slider_products = Subcategory::with(['products.images','products.authorData'])->find($homepage->first_slider);
 $first_sliderCategoryName = Subcategory::find($homepage->first_slider);
 $products_slider = $first_slider_products ? $first_slider_products->products : [];

$latest_slider_id=$homepage->latest_slider;
$lates_sliderCategoryName = Subcategory::with(['products.images'])->find($latest_slider_id);
$products_latest = $lates_sliderCategoryName ? $lates_sliderCategoryName->products : [];

$second_slider_products = Subcategory::with(['products.images','products.authorData'])->find($homepage->second_slider);
$second_sliderCategoryName = Subcategory::find($homepage->second_slider);
$products_slider2 = $second_slider_products ? $second_slider_products->products : [];

$homecategory1Name = Subcategory::find($homepage->homecategory1);
$homecategory2Name = Subcategory::find($homepage->homecategory2);
$homecategory3Name = Subcategory::find($homepage->homecategory3);
$homecategory4Name = Subcategory::find($homepage->homecategory4);
$homecategory5Name = Subcategory::find($homepage->homecategory5);

    return view('allbook',compact('subcategories','banners','products_slider','first_sliderCategoryName','lates_sliderCategoryName','homepage','products_latest','products_slider2','second_sliderCategoryName','homecategory1Name','homecategory2Name','homecategory3Name','homecategory4Name','homecategory5Name','authors','series','publishers','languages'));
}


public function signup(){
 $state_list = DB::table('state_list')->get();
    return view('signup',compact('state_list'));
}

public function checkPhone(Request $request)
{
    $exists = User::where('phone', $request->phone)->exists();
//return $exists;
    if($exists){
        return response()->json([
            'status' => true,
            'message' => 'Phone number already exists'
        ]);
    }

    return response()->json([
        'status' => false,
        'message' => ''
    ]);
    
}
public function checkEmail(Request $request)
{
    $exists = User::where('email', $request->email)->exists();

    if($exists){
        return response()->json([
            'status' => true,
            'message' => 'Email already exists'
        ]);
    }

    return response()->json([
        'status' => false,
        'message' => ''
    ]);
}
public function insertuser(Request $request){

//return('aaa');
 
 $validated = $request->validate([
              'name'=>'required',
              'email'=>'required',
                'city'=>'required',
              'pincode'=>'required',
              'phone'=>'required',
              'password'=>'required',
           
         
        ]);
    $validated['password'] = Hash::make($request->password);
$otp = rand(100000,999999);
 
    $user=User::create($validated);

    session([
    'login_phone' => $user->phone,
    'login_email' => $user->email,
    'login_otp'=>$otp
    ]);

    return redirect()->back()
    ->with('success', 'Please Verify your email id and phone no. Otp has been sent to your registered mail id and phone no');
    
    // The data is valid, proceed with insertion

}
public function otp_verification(){

$phone = session('login_phone');
$email = session('login_email');
$otp = session('login_otp');

 return view('otp_verification');

}
public function verifyotp(Request $request){

if($request->otp_new==session('login_otp')){
    $email = session('login_email');

    $user = User::where('email', $email)->first();

    session([
    'user_phone' => $user->phone,
    'user_email' => $user->email,
    'user_name'=>$user->name
    ]);

   // return redirect()->back()
  //  ->with('success', 'OTP verified. Login to your account!');
    return view('profile');  
}

}

public function login(){
    return view('login');
}
public function userLogin(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($validated)) {

        $request->session()->regenerate();

        $user = Auth::user();

        // Block admins from user login
        if ($user->role === 'Admin') {

            Auth::logout();

            return back()->with('error', 'Admins cannot login here');
        }

        session([
            'user_phone' => $user->phone,
            'user_email' => $user->email,
            'user_name'  => $user->name,
        ]);

            return redirect('/profile');

    }

    return back()->with('error', 'Wrong Credentials');
}

public function profile(){
        return view('profile');

}
public function place_order(){
        return view('place_order');

}
public function user_profile(){
        return view('user_profile');

}
public function orders(){
        return view('orders');

}


}


