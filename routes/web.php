<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
Auth::routes();

/*Route::get('/', function () {
    return view('welcome');
});
*/


//Admin Panel links
Route::get('/admin/', [AdminController::class, 'index']);
Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/login', [AdminController::class, 'login'])->name('submit.url');

Route::post('/admin/logout', [AdminController::class, 'logout'])->name('submit.logout');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

//category
Route::get('/admin/addcategory', [AdminController::class, 'addcategory']);
Route::get('/admin/add_sub_category', [AdminController::class, 'add_sub_category']);
Route::post('/admin/addcategory_data', [AdminController::class, 'addcategory_data'])->name('submit.addcategory');
Route::get('/admin/deletecategory/{id}', [AdminController::class, 'deletecategory']);
Route::post('/admin/addsubcategory_data', [AdminController::class, 'addsubcategory_data'])->name('submit.add_sub_category');
Route::get('/admin/deletesubcategory/{id}', [AdminController::class, 'deletesubcategory']);

//language
Route::get('/admin/addlanguage', [AdminController::class, 'addlanguage']);
Route::post('/admin/addlanguage_data', [AdminController::class, 'addlanguage_data'])->name('submit.addlanguage');
Route::get('/admin/deletelanguage/{id}', [AdminController::class, 'deletelanguage']);

//author
Route::get('/admin/addauthor', [AdminController::class, 'addauthor']);Route::get('/admin/addauthor', [AdminController::class, 'addauthor']);Route::post('/admin/addauthor_data', [AdminController::class, 'addauthor_data'])->name('submit.insertauthor');
Route::get('/admin/allauthor', [AdminController::class, 'allauthor']);
Route::get('/admin/showauthor/{id}', [AdminController::class, 'showauthor']);
Route::post('/admin/editauthor/{id}', [AdminController::class, 'editauthor'])->name('submit.edit_author');
Route::get('/admin/deleteauthor/{id}', [AdminController::class, 'deleteauthor']);

//Publisher
Route::get('/admin/addpublisher', [AdminController::class, 'addpublisher']);
Route::post('/admin/addpublisher_data', [AdminController::class, 'addpublisher_data'])->name('submit.insertpublisher');
Route::get('/admin/allpublisher', [AdminController::class, 'allpublisher']);
Route::get('/admin/showpublisher/{id}', [AdminController::class, 'showpublisher']);
Route::post('/admin/editpublisher/{id}', [AdminController::class, 'editpublisher'])->name('submit.edit_publisher');
Route::get('/admin/deletepublisher/{id}', [AdminController::class, 'deletepublisher']);


//Brand
Route::get('/admin/addbrand', [AdminController::class, 'addbrand']);
Route::post('/admin/addbrand_data', [AdminController::class, 'addbrand_data'])->name('submit.insertbrand');
Route::get('/admin/allbrand', [AdminController::class, 'allbrand']);
Route::get('/admin/showbrand/{id}', [AdminController::class, 'showbrand']);
Route::post('/admin/editbrand/{id}', [AdminController::class, 'editbrand'])->name('submit.edit_brand');
Route::get('/admin/deletebrand/{id}', [AdminController::class, 'deletebrand']);

//products->book
Route::get('/admin/addproduct', [AdminController::class, 'addproduct']);
Route::get('/admin/get-subcategories/{id}', [AdminController::class, 'getSubcategories']);
Route::post('/admin/addproduct_data', [AdminController::class, 'addproduct_data'])->name('submit.insertproduct');
Route::get('/admin/allproduct', [AdminController::class, 'allproduct']);
Route::get('/admin/deleteproduct/{id}/{product_id}', [AdminController::class, 'deleteproduct']);
Route::get('/admin/showproduct/{id}/{product_id}', [AdminController::class, 'showproduct']);
Route::post('/admin/editproduct/{id}/{product_id}', [AdminController::class, 'editproduct'])->name('submit.edit_product');
Route::post('/admin/update-trending', [AdminController::class, 'updateTrending']);
Route::post('/admin/update-latest', [AdminController::class, 'updateLatest']);
Auth::routes();

//other products
Route::get('/admin/addproduct_other', [AdminController::class, 'addproduct_other']);
Route::post('/admin/addotherproduct_data', [AdminController::class, 'addotherproduct_data'])->name('submit.otherproduct');
Route::get('/admin/allproduct_other', [AdminController::class, 'allproduct_other']);
Route::get('/admin/showproduct_other/{id}/{product_id}', [AdminController::class, 'showproduct_other']);
Route::post('/admin/updateSpec/', [AdminController::class, 'updateSpec']);
Route::post('/admin/deleteSpec/', [AdminController::class, 'deleteSpec']);
Route::post('/admin/editproduct_other/{id}/{product_id}', [AdminController::class, 'editproduct_other'])->name('submit.edit_product_other');
Route::get('/admin/deleteproduct_other/{id}/{product_id}', [AdminController::class, 'deleteproduct_other']);


//alluser
Route::get('/admin/alluser', [AdminController::class, 'alluser']);

//slider
Route::get('/admin/addslider', [AdminController::class, 'addslider']);
Route::post('/admin/addslider_data', [AdminController::class, 'addslider_data'])->name('submit.addslider');
Route::get('/admin/allbanner', [AdminController::class, 'allbanner']);
Route::get('/admin/showbanner/{id}', [AdminController::class, 'showbanner']);
Route::post('/admin/editbanner/{id}/', [AdminController::class, 'editbanner'])->name('submit.edit_slider');
Route::get('/admin/deletebanner/{id}', [AdminController::class, 'deletebanner']);

//settings
Route::get('/admin/homepage', [AdminController::class, 'homepage']);
Route::post('/admin/homepage_edit/{id}/', [AdminController::class, 'homepage_edit'])->name('submit.homepageedit');
Route::get('/admin/bookpage', [AdminController::class, 'bookpage']);
Route::post('/admin/bookpage_edit/{id}/', [AdminController::class, 'bookpage_edit'])->name('submit.bookpageedit');
Route::get('/admin/shipping', [AdminController::class, 'shipping']);
Route::post('/admin/shippingEdit/{id}/', [AdminController::class, 'shippingEdit'])->name('submit.shippingEdit');


//series
Route::get('/admin/addseries', [AdminController::class, 'addseries']);
Route::post('/admin/addseries_data', [AdminController::class, 'addseries_data'])->name('submit.insertseries');
Route::get('/admin/allseries', [AdminController::class, 'allseries']);
Route::get('/admin/showseries/{id}', [AdminController::class, 'showseries']);
Route::post('/admin/editseries/{id}/', [AdminController::class, 'editseries'])->name('submit.edit_series');
Route::get('/admin/deleteseries/{id}', [AdminController::class, 'deleteseries']);

//feedback
Route::get('/admin/addfeedback', [AdminController::class, 'addfeedback']);
Route::post('/admin/addfeedback_data', [AdminController::class, 'addfeedback_data'])->name('submit.insertfeedback');
Route::get('/admin/allfeedback', [AdminController::class, 'allfeedback']);
Route::post('/admin/update-feedback', [AdminController::class, 'updateFeedbackStatus']);


//frontend
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/single/{type}/{id}/{product_id}', [App\Http\Controllers\HomeController::class, 'single']);
Route::post('/add-to-cart/{product_id}', [App\Http\Controllers\CartController::class, 'addAjax'])->name('cart.add.ajax');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
//Route::post('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'removeAjax'])->name('cart.remove.ajax');

Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::get('/allbook', [App\Http\Controllers\HomeController::class, 'allbook'])->name('allbook');


//login & signup
Route::get('/signup', [App\Http\Controllers\HomeController::class, 'signup'])->name('signup');
Route::post('/check-phone',[App\Http\Controllers\HomeController::class,'checkPhone']);
Route::post('/check-email',[App\Http\Controllers\HomeController::class,'checkEmail']);
Route::post('/insertuser', [App\Http\Controllers\HomeController::class, 'insertuser'])->name('submit.insertuser');
Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::get('/otp_verification', [App\Http\Controllers\HomeController::class, 'otp_verification'])->name('otp_verification');
Route::post('/verifyotp', [App\Http\Controllers\HomeController::class, 'verifyotp'])->name('submit.verifyotp');
Route::post('/userLogin', [LoginController::class, 'userLogin'])->name('submit.userLogin');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/Userlogout', [LoginController::class, 'Userlogout'])->name('submit.Userlogout');

Route::get('/place_order', [App\Http\Controllers\HomeController::class, 'place_order'])->name('place_order');
Route::get('/user_profile', [App\Http\Controllers\HomeController::class, 'user_profile'])->name('user_profile');
Route::get('/orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');
