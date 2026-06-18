<?php

namespace App\Http\Controllers;
//use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Subcategory;
use App\Models\Otherproduct;
use App\Models\Otherspecification;
use App\Models\Language;
use App\Models\Banner;
use App\Models\Homepage;
use App\Models\Series;
use App\Models\Brand;
use App\Models\Shipping;
use App\Models\Cod;
use App\Models\SpecialCod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  
public function index(){

    return view('admin.index');
}

public function login(Request $request){

   
  $validated = $request->validate([
            'email' => 'required|email',
            'password'=>'required|min:6',
          
        ]);

    if(Auth::attempt($validated)){
    $request->session()->regenerate();

if (Auth::user()->role !== 'Admin') {
        Auth::logout();
        return back()->with('error', 'Access denied');
    }

    return redirect('/admin/dashboard');
        }
    return back()->with('error', 'Wrong Credentials');
       
}
public function logout(Request $request){

    Auth::logout(); // Log out the current user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/admin'); 
}
//Category

    public function dashboard(){
    return view('admin.dashboard');
    }
    public function addcategory(){
    $categories = Category::all();
    return view('admin.addcategory', ['categories' => $categories]);

    }  

public function addcategory_data(Request $request){
$category = new Category(); 
    
    $categorydata=$request->input('category');

 if (category::where('category', $categorydata)->exists()) {
            // A category with this name already exists
            return redirect()->back()->with([
                'error' => 'A category with this name already exists.'
            ])->withInput();
        }else{
   
    $category->category = $categorydata;
    $category->save();

        return redirect('/admin/addcategory')->with('status', 'Category created successfully!');
        } 



}
  public function deletecategory($id){
    $categories = Category::findOrFail($id);
            $categories->delete();
            return redirect()->back()->with('success', 'Product deleted successfully');


    }  
 public function add_sub_category(){
    $categories = Category::all();

$subcategories = Subcategory::join('category', 'subcategories.category_id', '=', 'category.id')
    ->select('category.category as category', 'subcategories.name as subcategory','subcategories.id as id','subcategories.image as image')
    ->get();
return view('admin.add_sub_category', ['categories' => $categories,'subcategories' => $subcategories]);


    }  
public function addsubcategory_data(Request $request){
     $subcategory = new Subcategory(); 
    
     $categorydata=$request->input('category');
     $categoryid=$request->input('category_id');
  
 if (subcategory::where('name', $categorydata)->exists()) {
            // A category with this name already exists
            return redirect()->back()->with([
                'error' => 'A category with this name already exists.'
            ])->withInput();
        }else{
   
    $subcategory->name = $categorydata;
    $subcategory->category_id = $categoryid;

                    $file = $request->file('image');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                     $subcategory->image  = $imageName;


    $subcategory->save();

        return redirect('/admin/add_sub_category')->with('status', 'Category created successfully!');
        } 



}
public function deletesubcategory($id){
    $subcategories = Subcategory::findOrFail($id);
            $subcategories->delete();
            return redirect()->back()->with('success', 'Sub category deleted successfully');


    }  
//product
public function addproduct(){
         $categories = Category::all();
         $authors = Author::all();
         $publishers = Publisher::all();
         $languages = Language::all();

    return view('admin.addproduct', ['categories' => $categories,'authors' => $authors,'publishers' => $publishers,'languages' => $languages]);
        //return view('admin.addproduct');


}
public function getSubcategories($id)
{
    return Subcategory::where('category_id', $id)->get();
}

public function addproduct_data(Request $request){

//return('aaa');
 
 $validated = $request->validate([
              'category'=>'required',
              'title' => 'required',
              'author' => 'required',
              'series' => 'required',
              'language' => 'required',
              'publisher' => 'required',
              'no_of_pages' => 'required',
              'binding' => 'required',
              'edition' => 'required',
              'illustrations' => 'required',
              'isbn' => 'required',
              'description' => 'required',
              'specification' => 'nullable',
              'price' => 'required',
              'discounted_price' => 'required',
              'published_on' => 'required|date', 
              'subcategories' => 'nullable|array',
              'subcategories.*' => 'exists:subcategories,id',
              'age' => 'nullable',
              'tags'=>'nullable',
              'weight'=>'required',
              'special_tag'=>'nullable',
              'tagcolor'=>'nullable',

        ]);
   
$lastProduct = Product::orderBy('id', 'desc')->first();

    if ($lastProduct && $lastProduct->product_id) {
        $lastNumber = (int) substr($lastProduct->product_id, 4);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }

    // Generate ID like PROD001
    $productId = 'PROD' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

    $validated['product_id'] = $productId;
    //return($validated);
    $price=$request->input('price');
    $price1=$request->input('discounted_price');
    $dis=$price-$price1;
    $total_dis=$dis/$price;
    $dis_per=$total_dis*100;
    $discount=round($dis_per);
   
    $validated['discount'] = $discount;

    $min_age = null;
$max_age = null;


    if ($validated['age']) {
        if (str_contains($validated['age'], '+')) {
            // For 18+
            $min_age = (int) str_replace('+', '', $validated['age']);
            $max_age = null;
        } else {
            // For ranges like 0-2
            [$min_age, $max_age] = explode('-', $validated['age']);
        }
    }

$validated['min_age'] = $min_age;
$validated['max_age'] = $max_age;
unset($validated['age']);

  //  Product::create($validated);
$product = Product::create($validated);

if ($request->has('subcategories')) {
    foreach ($request->subcategories as $subId) {
        DB::table('product_subcategory')->insert([
            'product_id' => $product->id,
            'subcategory_id' => $subId
        ]);
    }
}
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
               
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $imageName);

            Product_image::create([
                'product_id' => $productId,
                'images' => $imageName
            ]);

            
            }
        }
    return redirect()->back()->with('success', 'Product added successfully');

    // The data is valid, proceed with insertion

}
public function allproduct(){

 $products = Product::all();
   return view('admin.allproduct', ['products' => $products]);

}
  public function deleteproduct($id,$product_id){
  
    $products = Product::findOrFail($id);

    $product_images = Product_image::where('product_id', $product_id)->get();
    
    foreach ($product_images as $img) {
        // delete file from folder (if exists)
        if ($img->images && file_exists(public_path('uploads/'.$img->images))) {
            unlink(public_path('uploads/'.$img->images));
        }

        // delete record
        $img->delete();
    }

        
            $products->delete();
          return redirect()->back()->with('success', 'Product deleted successfully');


    } 
public function showproduct($id,$product_id){
            $categories = Category::all();
            $subcategories = Subcategory::all();
         //   $products = Product::findOrFail($id);
             $authors = Author::all();
             $publishers = Publisher::all();   
             $languages = Language::all();

        $product = Product::with(['categoryData','subcategories','authorData','publisherData'])->findOrFail($id);

      
        $product_images = Product_image::where('product_id', $product_id)->get();
          return view('admin.showproduct',compact('product','product_images','categories','subcategories','publishers','authors','languages'));

}
public function editproduct(Request $request,$id,$product_id){

            $products = Product::findOrFail($id);
            $product_images = Product_image::where('product_id', $product_id)->get();

          $validated = $request->validate([
              'category'=>'required',
              'title' => 'required',
              'author' => 'required',
              'series' => 'required',
              'language' => 'required',
              'publisher' => 'required',
              'no_of_pages' => 'required',
              'binding' => 'required',
              'edition' => 'required',
              'illustrations' => 'required',
              'isbn' => 'required',
              'description' => 'required',
              'specification' => 'nullable',
              'price' => 'required',
              'discounted_price' => 'required',
              'published_on' => 'required|date', 
                'subcategories' => 'nullable|array',
                'subcategories.*' => 'exists:subcategories,id',
               'age' => 'nullable',
                'tags'=>'nullable',
                'weight'=>'required',
              'special_tag'=>'nullable',
              'tagcolor'=>'nullable',

        
        ]);
    $price=$request->input('price');
    $price1=$request->input('discounted_price');
    $dis=$price-$price1;
    $total_dis=$dis/$price;
    $dis_per=$total_dis*100;
    $discount=round($dis_per);
   
    $validated['discount'] = $discount;

 if ($validated['age']) {
        if (str_contains($validated['age'], '+')) {
            // For 18+
            $min_age = (int) str_replace('+', '', $validated['age']);
            $max_age = null;
        } else {
            // For ranges like 0-2
            [$min_age, $max_age] = explode('-', $validated['age']);
        }
    }

$validated['min_age'] = $min_age;
$validated['max_age'] = $max_age;
unset($validated['age']);


    $products->update($validated);

// 🔥 Sync subcategories
if ($request->has('subcategories')) {
    $products->subcategories()->sync($request->subcategories);
} else {
    $products->subcategories()->detach(); // remove all if none selected
}
    // Image replace logic (your code is correct 👍)
    if ($request->hasFile('replace_images')) {
        foreach ($request->file('replace_images') as $imgId => $file) {

            $image = Product_image::find($imgId);

            if ($image) {

                if (file_exists(public_path('uploads/'.$image->images))) {
                    unlink(public_path('uploads/'.$image->images));
                }

                $imageName = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads'), $imageName);

                $image->update(['images' => $imageName]);
            }
        }
    }

    return redirect('/admin/showproduct/'.$id.'/'.$product_id)->with('success', 'Product updated successfully!');



}
public function updateTrending(Request $request)
{
    $product = Product::find($request->id);

    if ($product) {
        $product->trending = $request->trending;
        $product->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}
public function updateLatest(Request $request)
{
    $product = Product::find($request->id);

    if ($product) {
        $product->latest = $request->latest;
        $product->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}
//author
public function addauthor(){
       
         //return view('admin.addproduct', ['categories' => $categories]);
        return view('admin.addauthor');


}

public function addauthor_data(Request $request){

//return('aaa');
 
 $validated = $request->validate([
              'author'=>'required',
               'email'=>'nullable',
             'dob' => 'date|nullable', 
              'sex'=>'nullable',
              'description'=>'nullable',         
              'picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', 
         
        ]);
   
  
                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;

    Author::create($validated);


    return redirect()->back()->with('success', 'Product added successfully');

    // The data is valid, proceed with insertion

}
public function allauthor(){

 $authors = Author::all();
   return view('admin.allauthor', ['authors' => $authors]);

}
public function showauthor($id){
   $authors = Author::findOrFail($id);
return view('admin.showauthor',compact('authors'));
 
}
public function editauthor(Request $request,$id){
   $authors = Author::findOrFail($id);
$validated = $request->validate([
              'author'=>'required',
               'email'=>'nullable',
             'dob' => 'date', 
              'sex'=>'nullable',
              'description'=>'nullable',         
              'picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', 
         
        ]);
            
        // 🔥 Handle Image Upload
    if ($request->hasFile('picture')) {

        // Delete old image (optional but recommended)
        if ($authors->picture && file_exists(public_path('uploads/'.$authors->picture))) {
            unlink(public_path('uploads/'.$authors->picture));
        }
                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;
                }        
                    $authors->update($validated);
   
    return redirect('/admin/showauthor/'.$id)->with('success', 'Author updated successfully!');
    //return redirect()->back()->with('success', 'Author updated successfully');
}

  public function deleteauthor($id){
  
    $authors = Author::findOrFail($id);

    
        // delete file from folder (if exists)
        if ($authors->picture && file_exists(public_path('uploads/'.$authors->picture))) {
            unlink(public_path('uploads/'.$authors->picture));
        }
        
        $authors->delete();
        return redirect()->back()->with('success', 'Author deleted successfully');


    } 
//publisher----------------------

    public function addpublisher(){
       
         //return view('admin.addproduct', ['categories' => $categories]);
        return view('admin.addpublisher');


}
public function addpublisher_data(Request $request){

      $validated = $request->validate([
                'name'=>'required',
                'email'=>'nullable',
                'phone' => 'nullable', 
                'description'=>'nullable',         
                'picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', 
         
        ]);
   
                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;

    Publisher::create($validated);


    return redirect()->back()->with('success', 'Publisher added successfully');
}

public function allpublisher(){

 $publishers = Publisher::all();
   return view('admin.allpublisher', compact('publishers'));

}

public function showpublisher($id){

$publishers = Publisher::findOrFail($id);
return view('admin.showpublisher',compact('publishers'));

}

public function editpublisher(Request $request,$id){

     $publishers = Publisher::findOrFail($id);

$validated = $request->validate([
              'name'=>'required',
               'email'=>'nullable',
             'phone' => 'nullable', 
              'description'=>'nullable',         
              'picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', 
         
        ]);

   // 🔥 Handle Image Upload
    if ($request->hasFile('picture')) {

        // Delete old image (optional but recommended)
        if ($publishers->picture && file_exists(public_path('uploads/'.$publishers->picture))) {
            unlink(public_path('uploads/'.$publishers->picture));
        }
                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;
                }        
                    $publishers->update($validated);
   
    return redirect('/admin/showpublisher/'.$id)->with('success', 'Publisher updated successfully!');
}
  public function deletepublisher($id){
  
    $publishers = Publisher::findOrFail($id);

    
        // delete file from folder (if exists)
        if ($publishers->picture && file_exists(public_path('uploads/'.$publishers->picture))) {
            unlink(public_path('uploads/'.$publishers->picture));
        }
        
        $publishers->delete();
        return redirect()->back()->with('success', 'publishers deleted successfully');


    } 
//other products-------------------------
    public function addproduct_other(){
         $categories = Category::all();
         return view('admin.addproduct_other', ['categories' => $categories]);


}
public function addotherproduct_data(Request $request){

//return('aaa');
 
$validated = $request->validate([
              'category'=>'required',
              'title' => 'required',
              'description' => 'required',
              'specification' => 'nullable',
              'price' => 'required',
              'discounted_price' => 'required',
              'sub_category'=>'nullable',
              'label_name' => 'nullable|array',
              'label_name.*' => 'nullable|string|max:255',
              'lable_value' => 'nullable|array',
              'lable_value.*' => 'nullable|string|max:255',
              'tags'=>'nullable',
              'subcategories' => 'nullable|array',
              'subcategories.*' => 'exists:subcategories,id',
              'weight'=>'required',
              'special_tag'=>'nullable',
              'tagcolor'=>'nullable',
        ]);
   
$lastProduct = Otherproduct::orderBy('id', 'desc')->first();

    if ($lastProduct && $lastProduct->product_id) {
        $lastNumber = (int) substr($lastProduct->product_id, 5);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }

    // Generate ID like PROD001
    $productId = 'OPROD' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

    $validated['product_id'] = $productId;
    //return($validated);
    $price=$request->input('price');
    $price1=$request->input('discounted_price');
    $dis=$price-$price1;
    $total_dis=$dis/$price;
    $dis_per=$total_dis*100;
    $discount=round($dis_per);
   
    $validated['discount'] = $discount;

    $otherproduct=Otherproduct::create($validated);
if($request->has('subcategories')) {
    foreach ($request->subcategories as $subId) {
        DB::table('otherproduct_subcategory')->insert([
            'otherproduct_id' => $otherproduct->id,
            'subcategory_id' => $subId
        ]);
    }
}

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
               
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $imageName);

            Product_image::create([
                'product_id' => $productId,
                'images' => $imageName
            ]);

            
            }
        }
$labels = $validated['label_name'] ?? [];
$values = $validated['lable_value'] ?? [];

    foreach ($labels as $index => $label) {

    if (empty($label)) continue;

    Otherspecification::create([
        'product_id' => $productId,
        'label_name' => $label,
        'lable_value' => $values[$index]
    ]);
}
    return redirect()->back()->with('success', 'Product added successfully');


}

public function allproduct_other(){

 $products = Otherproduct::all();
   return view('admin.allproduct_other', ['products' => $products]);

}
public function showproduct_other($id,$product_id){
            $categories = Category::all();
            $subcategories = Subcategory::all();
            $otherproducts= Otherproduct::with(['categoryData','subcategoryData','subcategories'])->findOrFail($id);
            $product_images = Product_image::where('product_id', $product_id)->get();
            $otherspecifications = Otherspecification::where('product_id', $product_id)->get();
          return view('admin.showproduct_other',compact('otherproducts','product_images','categories','subcategories','otherspecifications'));

}

public function updateSpec(Request $request){

  $spec = Otherspecification::find($request->id);

    if (!$spec) {
        return response()->json(['success' => false]);
    }

    $spec->update([
        'label_name' => $request->label_name,
        'lable_value' => $request->label_value
    ]);

    return response()->json(['success' => true]);
}


  public function deleteSpec(Request $request){
  
        $other = Otherspecification::findOrFail($request->id);
      
      
if ($other) {
    $other->delete();
    return response()->json(['success' => true]);
}


    } 

public function editproduct_other(Request $request,$id,$product_id){

            $products = Otherproduct::findOrFail($id);
            $product_images = Product_image::where('product_id', $product_id)->get();

          $validated = $request->validate([
              'category'=>'required',
              'title' => 'required',
              'description' => 'required',
              'specification' => 'nullable',
              'price' => 'required',
              'discounted_price' => 'required',
              'sub_category'=>'nullable',
          'label_name' => 'nullable|array',
              'label_name.*' => 'nullable|string|max:255',
              'lable_value' => 'nullable|array',
              'lable_value.*' => 'nullable|string|max:255',
              'tags'=>'nullable',
              'weight'=>'required',
              'special_tag'=>'nullable',
              'tagcolor'=>'nullable',

        ]);
    $price=$request->input('price');
    $price1=$request->input('discounted_price');
    $dis=$price-$price1;
    $total_dis=$dis/$price;
    $dis_per=$total_dis*100;
    $discount=round($dis_per);
   
    $validated['discount'] = $discount;

    $products->update($validated);

if ($request->has('subcategories')) {
    $products->subcategories()->sync($request->subcategories);
} else {
    $products->subcategories()->detach(); // remove all if none selected
}

    // Image replace logic (your code is correct 👍)
    if ($request->hasFile('replace_images')) {
        foreach ($request->file('replace_images') as $imgId => $file) {

            $image = Product_image::find($imgId);

            if ($image) {

                if (file_exists(public_path('uploads/'.$image->images))) {
                    unlink(public_path('uploads/'.$image->images));
                }

                $imageName = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads'), $imageName);

                $image->update(['images' => $imageName]);
            }
        }
    }
$labels = $validated['label_name'] ?? [];
$values = $validated['lable_value'] ?? [];

    foreach ($labels as $index => $label) {

    if (empty($label)) continue;

    Otherspecification::create([
        'product_id' => $product_id,
        'label_name' => $label,
        'lable_value' => $values[$index]
    ]);
}
    return redirect('/admin/showproduct_other/'.$id.'/'.$product_id)->with('success', 'Product updated successfully!');



}

  public function deleteproduct_other($id,$product_id){
  
    $products = Otherproduct::findOrFail($id);

    $product_images = Product_image::where('product_id', $product_id)->get();


    foreach ($product_images as $img) {
        // delete file from folder (if exists)
        if ($img->images && file_exists(public_path('uploads/'.$img->images))) {
            unlink(public_path('uploads/'.$img->images));
        }

        // delete record
        $img->delete();
    }

        
            $products->delete();
           Otherspecification::where('product_id', $product_id)->delete();
        return redirect()->back()->with('success', 'publishers deleted successfully');


    } 
//language-------------------------------
    public function addlanguage(){
  $languages = Language::all();
              
return view('admin.addlanguage',compact('languages'));
    }

    public function addlanguage_data(Request $request){
     $language = new Language(); 
    
    $validated = $request->validate([
              'language_name'=>'required',
              'picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', 

        ]);

 if (language::where('language_name', $validated['language_name'])->exists()) {
            // A category with this name already exists
            return redirect()->back()->with([
                'error' => 'A language with this name already exists.'
            ])->withInput();
        }else{
   

                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;

      Language::create($validated);

        return redirect('/admin/addlanguage')->with('status', 'Language created successfully!');
        } 



}
  public function deletelanguage($id){
  
    $languages = Language::findOrFail($id);

    
        // delete file from folder (if exists)
        if ($languages->picture && file_exists(public_path('uploads/'.$languages->picture))) {
            unlink(public_path('uploads/'.$languages->picture));
        }
        
        $languages->delete();
        return redirect()->back()->with('success', 'languages deleted successfully');


    } 
//user---------------------------    
public function alluser(){

 $users = User::all();
   return view('admin.alluser', ['users' => $users]);

}

  public function addslider(){
       
         //return view('admin.addproduct', ['categories' => $categories]);
        return view('admin.addslider');


}
//slider---------------------
public function addslider_data(Request $request){

//return('aaa');
 
 $validated = $request->validate([
              'link'=>'required',
               'place'=>'required',
              'picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', 
         
        ]);
   
  
                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;

    Banner::create($validated);


    return redirect()->back()->with('success', 'banner added successfully');

    // The data is valid, proceed with insertion

}

//banner---------------------------
public function allbanner(){

 $banners = Banner::all();

   return view('admin.allbanner', ['banners' => $banners]);

}
public function showbanner($id){
   $banners = Banner::findOrFail($id);
return view('admin.showbanner',compact('banners'));
 
}

public function editbanner(Request $request,$id){

     $banner = Banner::findOrFail($id);

 
 $validated = $request->validate([
              'link'=>'required',
               'place'=>'required',
              'picture' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
         
        ]);

   // 🔥 Handle Image Upload
    if ($request->hasFile('picture')) {

        // Delete old image (optional but recommended)
        if ($banner->picture && file_exists(public_path('uploads/'.$banner->picture))) {
            unlink(public_path('uploads/'.$banner->picture));
        }
                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;
                }        
                    $banner->update($validated);
   
    return redirect('/admin/showbanner/'.$id)->with('success', 'Banner updated successfully!');
}
  public function deletebanner($id){
  
     $banner = Banner::findOrFail($id);

    
        // delete file from folder (if exists)
        if ($banner->picture && file_exists(public_path('uploads/'.$banner->picture))) {
            unlink(public_path('uploads/'.$banner->picture));
        }
        
        $banner->delete();
        return redirect()->back()->with('success', 'banner deleted successfully');


    } 


//homepage=====================
  public function homepage(){
        $subcategories = Subcategory::all();
        $subcategory_book=Subcategory::where('category_id','2')->get(); //book category id=2
        $subcategory_other = Subcategory::where('category_id', '!=', 2)->get();
       //  $CategoryOther = Category::where('category', '!=', 'Books')->get();
       
        $homepage = Homepage::first();
        //return view('admin.addproduct', ['categories' => $categories]);
        return view('admin.homepage', ['subcategories' => $subcategories,'homepage' => $homepage,'subcategory_book' => $subcategory_book,'subcategory_other' => $subcategory_other]);


}

public function homepage_edit(Request $request,$id){

//return('aaa');
       $homepage = Homepage::first();
        $subcategories = Subcategory::all();
       $validated = $request->validate([
            'first_slider'=>'required',
            'latest_title'=>'required',
            'latest_bigtitle'=>'required',          
            'video'=>'nullable|mimes:mp4,mov,avi,wmv',
            'latest_slider'=>'nullable',         
            'second_slider'=>'nullable',         
            'category_image1' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
            'image1_link'=>'nullable',         
            'category_image2' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
             'image2_link'=>'nullable',  
            'category_image3' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
             'image3_link'=>'nullable',          
             'category_image4' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
             'image4_link'=>'nullable',          
            'category_image5' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
             'image5_link'=>'nullable',          
            'category_video' => 'nullable|mimes:mp4,mov,avi,wmv',
             'third_slider'=>'nullable',          
             'fourth_slider'=>'nullable',          
             'fifth_slider'=>'nullable',          
             'homecategory1'=>'nullable',          
             'homecategory2'=>'nullable',          
             'homecategory3'=>'nullable',          
             'homecategory4'=>'nullable',          
             'homecategory5'=>'nullable',          

       ]);
   
      if ($request->hasFile('category_image1')) {


        // Delete old image (optional but recommended)
        if ($homepage->category_image1 && file_exists(public_path('uploads/'.$homepage->category_image1))) {
            unlink(public_path('uploads/'.$homepage->category_image1));
        }
            
                    $file = $request->file('category_image1');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['category_image1'] = $imageName;
                }

       if ($request->hasFile('category_image2')) {
  // Delete old image (optional but recommended)
        if ($homepage->category_image2 && file_exists(public_path('uploads/'.$homepage->category_image2))) {
            unlink(public_path('uploads/'.$homepage->category_image2));
        }

                    $file = $request->file('category_image2');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['category_image2'] = $imageName;
                }   

   if ($request->hasFile('category_image3')) {

  // Delete old image (optional but recommended)
        if ($homepage->category_image3 && file_exists(public_path('uploads/'.$homepage->category_image3))) {
            unlink(public_path('uploads/'.$homepage->category_image3));
        }
                    $file = $request->file('category_image3');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['category_image3'] = $imageName;
                }   

if ($request->hasFile('category_image4')) {

  // Delete old image (optional but recommended)
        if ($homepage->category_image4 && file_exists(public_path('uploads/'.$homepage->category_image4))) {
            unlink(public_path('uploads/'.$homepage->category_image4));
        }
                    $file = $request->file('category_image4');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['category_image4'] = $imageName;
                }   

   if ($request->hasFile('category_image5')) {
  // Delete old image (optional but recommended)
        if ($homepage->category_image5 && file_exists(public_path('uploads/'.$homepage->category_image5))) {
            unlink(public_path('uploads/'.$homepage->category_image5));
        }
                    $file = $request->file('category_image5');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['category_image5'] = $imageName;
                }   

if ($request->hasFile('video')) {

 // Delete old image (optional but recommended)
        if ($homepage->video && file_exists(public_path('uploads/'.$homepage->video))) {
            unlink(public_path('uploads/'.$homepage->video));
        }


    $file = $request->file('video');

    $filename = time().'.'.$file->getClientOriginalExtension();

    $destinationPath = public_path('uploads');

    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0777, true);
    }

    $file->move($destinationPath, $filename);

    $validated['video'] = $filename;
}

if ($request->hasFile('category_video')) {

 // Delete old image (optional but recommended)
        if ($homepage->category_video && file_exists(public_path('uploads/'.$homepage->category_video))) {
            unlink(public_path('uploads/'.$homepage->category_video));
        }


    $file = $request->file('category_video');

    $filename = time().'.'.$file->getClientOriginalExtension();

    $destinationPath = public_path('uploads');

    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0777, true);
    }

    $file->move($destinationPath, $filename);

    $validated['category_video'] = $filename;
}

    $homepage->update($validated);


    return redirect()->back()->with('success', 'Homepage added successfully');

    // The data is valid, proceed with insertion

}
//bookpage--------------------------------------
public function bookpage(){
        $subcategories = Subcategory::all();
        $bookpage = Homepage::findOrFail(2);
        $subcategory_book=Subcategory::where('category_id','2')->get(); //book category id=2
        //return view('admin.addproduct', ['categories' => $categories]);
        return view('admin.bookpage', ['subcategories' => $subcategories,'bookpage' => $bookpage,'subcategory_book' => $subcategory_book]);


}
public function bookpage_edit(Request $request,$id){

//return('aaa');
       $homepage = Homepage::findOrFail($id);
        $subcategories = Subcategory::all();
       $validated = $request->validate([
            'first_slider'=>'required',
            'latest_title'=>'required',
            'latest_bigtitle'=>'required',          
            'video'=>'nullable|mimes:mp4,mov,avi,wmv',
            'latest_slider'=>'nullable',         
            'second_slider'=>'nullable',         
            'category_image1' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
            'image1_link'=>'nullable',         
            'category_image2' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
             'image2_link'=>'nullable',  
            'category_image3' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
             'image3_link'=>'nullable',          
             'category_image4' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
             'image4_link'=>'nullable',          
            'category_image5' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
             'image5_link'=>'nullable',          
            'category_video' => 'nullable|mimes:mp4,mov,avi,wmv',
              'third_slider'=>'nullable',          
             'fourth_slider'=>'nullable',          
             'fifth_slider'=>'nullable',          
             'homecategory1'=>'nullable',          
             'homecategory2'=>'nullable',          
             'homecategory3'=>'nullable',          
             'homecategory4'=>'nullable',          
             'homecategory5'=>'nullable',          


       ]);
   
      if ($request->hasFile('category_image1')) {


        // Delete old image (optional but recommended)
        if ($homepage->category_image1 && file_exists(public_path('uploads/'.$homepage->category_image1))) {
            unlink(public_path('uploads/'.$homepage->category_image1));
        }
            
                    $file = $request->file('category_image1');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['category_image1'] = $imageName;
                }

       if ($request->hasFile('category_image2')) {
  // Delete old image (optional but recommended)
        if ($homepage->category_image2 && file_exists(public_path('uploads/'.$homepage->category_image2))) {
            unlink(public_path('uploads/'.$homepage->category_image2));
        }

                    $file = $request->file('category_image2');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['category_image2'] = $imageName;
                }   

   if ($request->hasFile('category_image3')) {

  // Delete old image (optional but recommended)
        if ($homepage->category_image3 && file_exists(public_path('uploads/'.$homepage->category_image3))) {
            unlink(public_path('uploads/'.$homepage->category_image3));
        }
                    $file = $request->file('category_image3');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['category_image3'] = $imageName;
                }   

if ($request->hasFile('category_image4')) {

  // Delete old image (optional but recommended)
        if ($homepage->category_image4 && file_exists(public_path('uploads/'.$homepage->category_image4))) {
            unlink(public_path('uploads/'.$homepage->category_image4));
        }
                    $file = $request->file('category_image4');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['category_image4'] = $imageName;
                }   

   if ($request->hasFile('category_image5')) {
  // Delete old image (optional but recommended)
        if ($homepage->category_image5 && file_exists(public_path('uploads/'.$homepage->category_image5))) {
            unlink(public_path('uploads/'.$homepage->category_image5));
        }
                    $file = $request->file('category_image5');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['category_image5'] = $imageName;
                }   

if ($request->hasFile('video')) {

 // Delete old image (optional but recommended)
        if ($homepage->video && file_exists(public_path('uploads/'.$homepage->video))) {
            unlink(public_path('uploads/'.$homepage->video));
        }


    $file = $request->file('video');

    $filename = time().'.'.$file->getClientOriginalExtension();

    $destinationPath = public_path('uploads');

    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0777, true);
    }

    $file->move($destinationPath, $filename);

    $validated['video'] = $filename;
}

if ($request->hasFile('category_video')) {

 // Delete old image (optional but recommended)
        if ($homepage->category_video && file_exists(public_path('uploads/'.$homepage->category_video))) {
            unlink(public_path('uploads/'.$homepage->category_video));
        }


    $file = $request->file('category_video');

    $filename = time().'.'.$file->getClientOriginalExtension();

    $destinationPath = public_path('uploads');

    if (!file_exists($destinationPath)) {
        mkdir($destinationPath, 0777, true);
    }

    $file->move($destinationPath, $filename);

    $validated['category_video'] = $filename;
}

    $homepage->update($validated);


    return redirect()->back()->with('success', 'Homepage added successfully');

    // The data is valid, proceed with insertion

}
//series------------------------------
public function addseries(){
       
         //return view('admin.addproduct', ['categories' => $categories]);
        return view('admin.addseries');


}

public function addseries_data(Request $request){

//return('aaa');
 
 $validated = $request->validate([
              'name'=>'required',       
              'picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
              'link'=>'required', 
         
        ]);
   
  if ($request->hasFile('picture')) {

                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;
                }
    Series::create($validated);


    return redirect()->back()->with('success', 'Series added successfully');

    // The data is valid, proceed with insertion

}

public function allseries(){

 $series = Series::all();

   return view('admin.allseries', ['series' => $series]);

}
public function showseries($id){
   $series = Series::findOrFail($id);
return view('admin.showseries',compact('series'));
 
}

public function editseries(Request $request,$id){

     $series = Series::findOrFail($id);

 
 $validated = $request->validate([
              'link'=>'required',
               'name'=>'required',
              'picture' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
         
        ]);

   // 🔥 Handle Image Upload
    if ($request->hasFile('picture')) {

        // Delete old image (optional but recommended)
        if ($series->picture && file_exists(public_path('uploads/'.$series->picture))) {
            unlink(public_path('uploads/'.$series->picture));
        }
                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;
                }        
                    $series->update($validated);
   
    return redirect('/admin/showseries/'.$id)->with('success', 'Series updated successfully!');
}

  public function deleteseries($id){
  
     $series = Series::findOrFail($id);

    
        // delete file from folder (if exists)
        if ($series->picture && file_exists(public_path('uploads/'.$series->picture))) {
            unlink(public_path('uploads/'.$series->picture));
        }
        
        $series->delete();
        return redirect()->back()->with('success', 'series deleted successfully');


    } 
//brand------------------------
public function addbrand(){
       
         //return view('admin.addproduct', ['categories' => $categories]);
        return view('admin.addbrand');


}
public function addbrand_data(Request $request){

//return('aaa');
 
 $validated = $request->validate([
              'name'=>'required',
               'location'=>'nullable',
               'phone'=>'nullable',
              'picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', 
         
        ]);
   
  
                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;

    Brand::create($validated);


    return redirect()->back()->with('success', 'Brand added successfully');

    // The data is valid, proceed with insertion

}
public function allbrand(){

 $brands = Brand::all();
   return view('admin.allbrand', ['brands' => $brands]);

}
public function showbrand($id){
   $brand = Brand::findOrFail($id);
return view('admin.showbrand',compact('brand'));
 
}

public function editbrand(Request $request,$id){

     $brand = Brand::findOrFail($id);

 
 $validated = $request->validate([
              'location'=>'nullable',
              'phone'=>'nullable',
               'name'=>'required',
              'picture' => 'image|mimes:jpg,jpeg,png,webp|max:2048', 
         
        ]);

   // 🔥 Handle Image Upload
    if ($request->hasFile('picture')) {

        // Delete old image (optional but recommended)
        if ($brand->picture && file_exists(public_path('uploads/'.$brand->picture))) {
            unlink(public_path('uploads/'.$brand->picture));
        }
                    $file = $request->file('picture');
                    $imageName = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads'), $imageName);
                    $validated['picture'] = $imageName;
                }        
                    $brand->update($validated);
   
    return redirect('/admin/showbrand/'.$id)->with('success', 'brand updated successfully!');
}


  public function deletebrand($id){
  
     $brand = Brand::findOrFail($id);

    
        // delete file from folder (if exists)
        if ($brand->picture && file_exists(public_path('uploads/'.$brand->picture))) {
            unlink(public_path('uploads/'.$brand->picture));
        }
        
        $brand->delete();
        return redirect()->back()->with('success', 'brand deleted successfully');


    } 

public function updateBrandStatus(Request $request)
{
    $brand = Brand::find($request->id);

    if ($brand) {
        $brand->show_in_frontend = $request->show_in_frontend;
        $brand->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}

 //feedback--------------------   
public function addfeedback(){
       
         //return view('admin.addproduct', ['categories' => $categories]);
        return view('admin.addfeedback');


}

public function addfeedback_data(Request $request){

//return('aaa');
 
 $validated = $request->validate([
              'name'=>'required',
               'content'=>'required',
         
        ]);
   
   DB::table('feedbacks')->insert($validated);


    return redirect()->back()->with('success', 'Feedback added successfully');

    // The data is valid, proceed with insertion

}

public function editfeedback(Request $request,$id){

     $feedback = Feedback::findOrFail($id);

 
 $validated = $request->validate([
              'content'=>'required',
               'name'=>'required',
         
        ]);

   // 🔥 Handle Image Upload
        
                    $feedback->update($validated);
   
    return redirect('/admin/showbrand/'.$id)->with('success', 'brand updated successfully!');
}

public function allfeedback(){

 $feedbacks=  DB::table('feedbacks')->get();
   return view('admin.allfeedback', ['feedbacks' => $feedbacks]);

}
public function updateFeedbackStatus(Request $request)
{
    $product = Product::find($request->id);

    if ($product) {
        $product->trending = $request->trending;
        $product->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}
//shipping-----------------------------
public function shipping(){

  $shipping = Shipping::findOrFail(1);

    return view('admin.shipping',compact('shipping'));
}
public function shippingEdit(Request $request,$id){

//return('aaa');
       $shipping = Shipping::findOrFail($id);
      
       $validated = $request->validate([
            'citybase_next'=>'required',
            'citybase'=>'required',
            'statebase_next'=>'required',         
            'statebase'=>'required',         
            'statebase_next'=>'required',         
            'countrybase_next'=>'required',         
            'countrybase'=>'required',         
            'spclpincode_nxt'=>'required',         
            'spclpincode_base'=>'required',         

       ]);
   
    $shipping->update($validated);


    return redirect()->back()->with('success', 'Shipping added successfully');

    // The data is valid, proceed with insertion

}

 public function codPincode(){
 // $languages = Language::all();
 $cod = Cod::all();
             
return view('admin.codPincode',compact('cod'));
    }

 
 public function addcodPincode(Request $request)
{
    $request->validate([
        'pincode' => 'required|mimes:csv,txt,xlsx,xls'
    ]);

    $file = $request->file('pincode');

    // Read CSV
    if ($file->getClientOriginalExtension() == 'csv') {

        $handle = fopen($file->getRealPath(), 'r');


while (($row = fgetcsv($handle, 1000, ',')) !== false) {

    $pincode = trim($row[0]);

    if (!empty($pincode)) {

        $insert = DB::table('cod')->insert([
            'pincode' => $pincode,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

      //  dd($insert);
    }
}

        fclose($handle);
    }

    return back()->with('success', 'Pincodes uploaded successfully.');
}

  public function deletecod($id){
  
    $scod = SpecialCod::findOrFail($id);
        
        $scod->delete();
        return redirect()->back()->with('status', ' deleted successfully');


    } 
 public function specialPincode(){
 // $languages = Language::all();
 $special_cod = SpecialCod::all();
             
return view('admin.specialPincode',compact('special_cod'));
    }
 public function addspclPincode(Request $request)
{
    $request->validate([
        'pincode' => 'required|mimes:csv,txt,xlsx,xls'
    ]);

    $file = $request->file('pincode');

    // Read CSV
    if ($file->getClientOriginalExtension() == 'csv') {

        $handle = fopen($file->getRealPath(), 'r');


while (($row = fgetcsv($handle, 1000, ',')) !== false) {

    $pincode = trim($row[0]);

    if (!empty($pincode)) {

        $insert = DB::table('special_cod')->insert([
            'pincode' => $pincode,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

      //  dd($insert);
    }
}

        fclose($handle);
    }

    return back()->with('success', 'Pincodes uploaded successfully.');
}


}
