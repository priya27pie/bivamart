<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Useraddress;
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
use App\Models\Wishlist;


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
    $brands = Brand::where('show_in_frontend',1)->get();




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

        $product = Otherproduct::with([
            'categoryData',
            'subcategoryData',
            'subcategories',
            'images' // ✅ add this
        ])->findOrFail($id);

        $product_images = $product->images;

        $otherspecifications = Otherspecification::where('product_id', $product_id)->get();

        // trending others
        $trending_products = Subcategory::with(['otherproducts.images'])->find(21);
        $show_trending = $trending_products ? $trending_products->otherproducts : [];
    }

    return view('single', compact(
        'type',
        'product',
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
 $series = Series::all();
 $languages = Language::all();

    $authors = Author::where('show_in_frontend',1)->get();
    $publishers = Publisher::where('show_in_frontend',1)->get();


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
public function forgot(){
    return view('forgot');
}
public function profile(){

    $user = Auth::user();
    $addresses = Auth::user()->addresses;
return view('profile',compact('user','addresses'));

     //   return view('profile');

}

public function user_profile(){
        return view('user_profile');

}

public function success(){

        session()->forget('cart');

        return view('success');

}
public function failure(){
        return view('failure');

}


public function edit_profile($type,$user_id){
  
    if($type=='other'){
    $addresses = Useraddress::where('id', $user_id)->firstOrFail();
     return view('edit_profile',compact('addresses','type'));
   }else{
  $user = Auth::user();
    return view('edit_profile',compact('user','type'));


   }

}
public function deleteAddress($id){
  
    $addresses = Useraddress::findOrFail($id);

    $addresses->delete();
    return redirect()->back()->with('success', 'Address deleted successfully');

    } 

public function EditProfile_data(Request $request,$id){

 
 if($request->input('type')=="other"){

 $addresses = Useraddress::findOrFail($id);
 $validated = $request->validate([
               'user_name'=>'required',
              'user_phone'=>'required',
             'pincode'=>'nullable',
              'address' => 'nullable',
              'landmark' => 'nullable',
              'city' => 'nullable',
              'state' => 'nullable',
          ]);

        $addresses->update($validated);
    return redirect('edit_profile/other/'.$id)->with('success', 'User has been updated successfully!');
}else{

  $user = Auth::user();
 $validated = $request->validate([
               'name'=>'required',
              'phone'=>'required',
              'email'=>'required',
             'pincode'=>'nullable',
              'address' => 'nullable',
              'landmark' => 'nullable',
              'city' => 'nullable',
              'state' => 'nullable',
          ]);

        $user->update($validated);
    return redirect('edit_profile/main/'.$id)->with('success', 'User has been updated successfully!');

}

}
public function allproduct(Request $request)
{
    $query = Product::query();
 
    // Subcategory

if ($request->subcategory) {

    $subcategories = (array) $request->subcategory;

    $query->whereHas('subcategories', function ($q) use ($subcategories) {
        $q->whereIn('subcategories.id', $subcategories);
    });
}
    // Language
    if($request->language){
        $query->where('language', $request->language);
    }

    // Publisher
    if($request->publishers){
        $query->where('publisher', $request->publishers);
    }

    // Author
    if($request->author){
        $query->where('author', $request->author);
    }

    // Binding
    if($request->binding){
        $query->whereIn('binding', $request->binding);
    }

    // Sort
    if($request->sort == 'low_to_high'){
        $query->orderBy('discounted_price','ASC');
    }

    if($request->sort == 'high_to_low'){
        $query->orderBy('discounted_price','DESC');
    }

    if($request->sort == 'Newest to Oldest'){
        $query->latest();
    }

    if($request->sort == 'Oldest to Newest'){
        $query->oldest();
    }

     // age
if ($request->filled('age')) {

    if (is_array($request->age)) {

        $query->where(function ($q) use ($request) {
            foreach ($request->age as $age) {
                $q->orWhere('age', 'LIKE', "%{$age}%");
            }
        });

    } else {

        $query->where('age', 'LIKE', "%{$request->age}%");
    }
}
    $products = $query->with(['images','authorData','subcategories'])->paginate(12);

    $subcategories = Subcategory::where('category_id', 2)->get();
    $languages = Language::all();
    $publishers = Publisher::all();
    $authors = Author::all();

    return view('allproduct', compact(
        'products',
        'subcategories',
        'languages',
        'publishers',
        'authors'
    ));
}
public function filterProducts(Request $request)
{
    $query = Product::with([
        'images',
        'authorData',
        'subcategories',
        'publisherData'
    ]);

    // Subcategory
    if ($request->subcategory) {

        $query->whereHas('subcategories', function ($q) use ($request) {

            $q->whereIn('subcategories.id', $request->subcategory);
        });
    }

    // Language
    if (!empty($request->language)) {

        $query->where('language', $request->language);
    }

    // Publisher

    if (!empty($request->publishers)) {
        $query->where('publisher', $request->publishers);
    }
    // Author
    if (!empty($request->author)) {
        $query->where('author', $request->author);
    }
    // Binding
    if (!empty($request->binding)) {

        $query->where('binding', $request->binding);
    }

     // age
if ($request->filled('age')) {

    if (is_array($request->age)) {

        $query->where(function ($q) use ($request) {
            foreach ($request->age as $age) {
                $q->orWhere('age', 'LIKE', "%{$age}%");
            }
        });

    } else {

        $query->where('age', 'LIKE', "%{$request->age}%");
    }
}
    //price
if (!empty($request->price)) {

    if ($request->price == '1000-above') {

        $query->where('discounted_price', '>=', 1000);

    } else {

        [$min, $max] = explode('-', $request->price);

        $query->whereBetween('discounted_price', [$min, $max]);
    }
}
    // Discount
    if ($request->discount) {

        $query->where(function($q) use ($request){

            foreach($request->discount as $dis){

                $discount = explode("-", $dis);

                if(count($discount) == 2){

                    $q->orWhereBetween('discount', [
                        $discount[0],
                        $discount[1]
                    ]);
                }
            }
        });
    }

    // Sort
    switch ($request->sort) {

        case 'low_to_high':
            $query->orderBy('discounted_price', 'ASC');
            break;

        case 'high_to_low':
            $query->orderBy('discounted_price', 'DESC');
            break;

        case 'newest_to_lowest':
            $query->orderBy('id', 'DESC');
            break;

        case 'oldest_to_newest':
            $query->orderBy('id', 'ASC');
            break;

        case 'discount_highlow':
            $query->orderBy('discount', 'DESC');
            break;

        case 'discount_lowhigh':
            $query->orderBy('discount', 'ASC');
            break;

        case 'trending':
            $query->where('trending', 'YES');
            break;
    }
//dd($request->all());

//dd($query->toSql(), $query->getBindings());

    $products = $query->get();

    return view('filter_products', compact('products'))->render();
/*
try {

    $products = $query->get();
    return view('filter_products', compact('products'))->render();

} catch (\Exception $e) {

    dd($e->getMessage());
}
*/

}
public function allOtherproduct(Request $request)
{
    $query = Otherproduct::with(['images', 'subcategories']);

    if ($request->category) {
        $query->where('category', $request->category); // or category_id if that's your column
    }

    if ($request->subcategory) {

        $subcategories = (array) $request->subcategory;

        $query->whereHas('subcategories', function ($q) use ($subcategories) {
            $q->whereIn('subcategories.id', $subcategories);
        });
    }
  
//brand
    if (!empty($request->brand)) {

        $query->where('brand', $request->brand);
    }
      // Sort
    switch ($request->sort) {

        case 'low_to_high':
            $query->orderBy('discounted_price', 'ASC');
            break;

        case 'high_to_low':
            $query->orderBy('discounted_price', 'DESC');
            break;

        case 'Newest to Oldest':
            $query->latest();
            break;

        case 'Oldest to Newest':
            $query->oldest();
            break;
    }

    $products = $query->distinct()->paginate(12);
    $subcategories = collect();
    $brand = Brand::all();

if ($request->category) {
    $subcategories = Subcategory::where('category_id', $request->category)->get();
}

    return view('allOtherproduct', compact(
        'products',
        'subcategories',
        'brand'
        
    ));
}
public function filterProducts_Others(Request $request)
{

    $query = Otherproduct::with(['images', 'subcategories']);
      // Subcategory
    if ($request->subcategory) {

        $query->whereHas('subcategories', function ($q) use ($request) {

            $q->whereIn('subcategories.id', $request->subcategory);
        });
    }

       
    //price
if (!empty($request->price)) {

    if ($request->price == '1000-above') {

        $query->where('discounted_price', '>=', 1000);

    } else {

        [$min, $max] = explode('-', $request->price);

        $query->whereBetween('discounted_price', [$min, $max]);
    }
}
//brand
    if (!empty($request->brand)) {

        $query->where('brand', $request->brand);
    }

 
    // discount
if($request->discount){

    $query->where(function($q) use ($request){

        foreach($request->discount as $dis){

            $discount = explode("-", $dis);

            if(count($discount) == 2){

                $q->orWhereBetween('discount', [
                    $discount[0],
                    $discount[1]
                ]);
            }
        }
    });
}
    // Sort
    switch ($request->sort) {

        case 'low_to_high':
            $query->orderBy('discounted_price', 'ASC');
            break;

        case 'high_to_low':
            $query->orderBy('discounted_price', 'DESC');
            break;

        case 'newest_to_lowest':
            $query->orderBy('id', 'DESC');
            break;

        case 'oldest_to_newest':
            $query->orderBy('id', 'ASC');
            break;

        case 'discount_highlow':
            $query->orderBy('discount', 'DESC');
            break;

        case 'discount_lowhigh':
            $query->orderBy('discount', 'ASC');
            break;

        case 'trending':
            $query->where('trending', 'YES');
            break;
    }


//dd($query->toSql(), $query->getBindings());

    $products = $query->get();



    return view('filter-productsother', compact('products'))->render();
}

public function wishlist()
{
    $wishlists = Wishlist::where('user_id', auth()->id())->get();

    foreach ($wishlists as $wishlist) {

        if (str_starts_with($wishlist->product_id, 'PROD')) {
            $wishlist->item = Product::with('images', 'authorData')
                ->where('product_id', $wishlist->product_id)
                ->first();
             $wishlist->item->type="book";   

        } elseif (str_starts_with($wishlist->product_id, 'OPROD')) {
            $wishlist->item = Otherproduct::with('images')
                ->where('product_id', $wishlist->product_id)
                ->first();
            $wishlist->item->type="other";   

        }
    }

    return view('wishlist', compact('wishlists'));
}
public function wishlist_ADD($product_id){
        
    Wishlist::firstOrCreate([
        'user_id' => auth()->id(),
        'product_id' => $product_id
    ]);


    return back()->with('success', 'Added to wishlist');

}
public function faq(){        
    return view('faq');

}
public function about(){        
    return view('about');

}
public function privacy(){        
    return view('privacy');

}
public function termsconditions(){        
    return view('termsconditions');

}
public function contact(){        
    return view('contact');

}
public function return(){        
    return view('return');

}
public function wallet(){        
   $user = Auth::user();

  return view('wallet',compact('user'));

}
public function review(){        
    return view('review');

}
public function givenreviews(){        
    return view('given-reviews');

}

}

