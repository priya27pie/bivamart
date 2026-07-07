<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ExportController;
Auth::routes();

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Panel links
Route::get('/admin', [AdminController::class, 'index']);
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
Route::post('/admin/update-brand', [AdminController::class, 'updateBrandStatus']);
Route::post('/admin/update-author', [AdminController::class, 'updateAuthorStatus']);
Route::post('/admin/update-publisher', [AdminController::class, 'updatePublisherStatus']);

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
Route::get('/admin/specialPincode', [AdminController::class, 'specialPincode']);
Route::get('/admin/codPincode', [AdminController::class, 'codPincode']);
Route::post('/admin/addcodPincode', [AdminController::class, 'addcodPincode'])->name('submit.addcodPincode');
Route::get('/admin/deletebill/{id}', [AdminController::class, 'deletebill']);
Route::post('/admin/addspclPincode', [AdminController::class, 'addspclPincode'])->name('submit.addspclPincode');
//bill
Route::get('/admin/allbill', [AdminController::class, 'allbill']);
Route::get('/admin/initiatedBill', [AdminController::class, 'initiatedBill']);
Route::post('/admin/bill/authorize', [AdminController::class, 'authorizeBill'])->name('admin.bill.authorize');
Route::get('/admin/deletecod/{id}', [AdminController::class, 'deletecod']);
Route::get('/admin/pendingBill', [AdminController::class, 'pendingBill'])->name('admin.pendingDateSearch');
Route::post('/admin/bill/confirm', [AdminController::class, 'confirmBill'])->name('admin.bill.confirm');
Route::get('/admin/billdetails/{order_id}', [AdminController::class, 'billdetails']);
Route::get('/admin/confirmedBill', [AdminController::class, 'confirmedBill'])->name('admin.confirmedDateSearch');
Route::post('/admin/bill/packBill', [AdminController::class, 'packBill'])->name('admin.bill.packBill');
Route::get('/admin/packedBill', [AdminController::class, 'packedBill'])->name('admin.packedDateSearch');
Route::post('/admin/bill/shipBill', [AdminController::class, 'shipBill'])->name('admin.bill.shipBill');
Route::get('/admin/shippedBill', [AdminController::class, 'shippedBill'])
    ->name('admin.shippedDateSearch');
Route::post('/admin/bill/shipDate', [AdminController::class, 'shipDate'])->name('admin.bill.shipDate');
Route::get('/admin/deliveredBill', [AdminController::class, 'deliveredBill'])->name('admin.deliveredDateSearch');
Route::get('/admin/cancelledBill', [AdminController::class, 'cancelledBill']);


//bill export
Route::get('/admin/pendingBill/export', [ExportController::class, 'exportPendingBill'])
    ->name('admin.exportPendingBill');
Route::get('/admin/confirmedBill/export', [ExportController::class, 'exportConfirmedBill'])
    ->name('admin.exportConfirmedBill');
Route::get('/admin/packedBill/export', [ExportController::class, 'exportPackedBill'])
    ->name('admin.exportPackedBill');    
Route::get('/admin/shippedBill/export', [ExportController::class, 'exportShippedBill'])
    ->name('admin.shippedExport');
Route::get('/admin/deliveredBill/export', [ExportController::class, 'exportDeliveredBill'])
    ->name('admin.deliveredExport');

//courier
Route::get('/admin/addcourier', [AdminController::class, 'addcourier']);
Route::post('/admin/addcourier_data', [AdminController::class, 'addcourier_data'])->name('submit.addcourier_data');
Route::get('/admin/allcourier', [AdminController::class, 'allcourier']);
Route::get('/admin/showcourier/{id}', [AdminController::class, 'showcourier']);
Route::post('/admin/editcourier/{id}/', [AdminController::class, 'editcourier'])->name('submit.editcourier');
Route::get('/admin/deletecourier/{id}', [AdminController::class, 'deletecourier']);



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
Route::get('/forgot', [App\Http\Controllers\HomeController::class, 'forgot'])->name('forgot');
Route::get('/edit_profile/{type}/{user_id}', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('edit_profile');
Route::post('/EditProfile_data/{id}', [App\Http\Controllers\HomeController::class, 'EditProfile_data'])->name('submit.EditProfile_data');
Route::get('/deleteAddress/{id}', [App\Http\Controllers\HomeController::class, 'deleteAddress']);


//checkout
Route::get('/allorders', [OrderController::class, 'allorders'])->name('allorders');
Route::get('/orders/{order}/{no_of_p}', [OrderController::class, 'orders'])
    ->name('orders');
Route::get('/order_details/{order_id}', [OrderController::class, 'order_details'])->name('order_details');
Route::post('/checkout', [OrderController::class, 'checkout'])
    ->middleware('auth')
    ->name('submit.checkout');

Route::get('/place_order/{order}/{cod}', [OrderController::class, 'place_order'])
    ->name('place_order');

Route::post('/addAddress', [OrderController::class, 'addAddress'])->name('submit.addAddress');
Route::post('/calculate-shipping', [OrderController::class, 'calculateShipping'])
    ->name('calculate.shipping');
Route::post('/selectAddress/{order}', [OrderController::class, 'selectAddress'])->name('submit.address');
Route::post('/paytype/{order}', [OrderController::class, 'paytype'])->name('submit.paytype');
Route::post('/CancelOrder', [OrderController::class, 'CancelOrder'])->name('submit.CancelOrder');


//other sections->all page
Route::get('/allproduct', [App\Http\Controllers\HomeController::class, 'allproduct'])->name('allproduct');
Route::get('/filter-products', [App\Http\Controllers\HomeController::class, 'filterProducts']);
Route::get('/allOtherproduct/{category_id}', [App\Http\Controllers\HomeController::class, 'allOtherproduct'])->name('allOtherproduct');
Route::get('/filter-productsother/{category_id}', [App\Http\Controllers\HomeController::class, 'filterProducts_Others'])->name('filter-productsother');

Route::get('/success', [App\Http\Controllers\HomeController::class, 'success'])->name('success');
Route::get('/failure', [App\Http\Controllers\HomeController::class, 'failure'])->name('failure');
Route::get('/bill/{order}', [OrderController::class, 'bill'])->name('bill');
Route::get('/wishlist', [App\Http\Controllers\HomeController::class, 'wishlist'])->name('wishlist');
Route::get('/wishlist/add/{product_id}', [App\Http\Controllers\HomeController::class, 'wishlist_ADD'])->name('wishlist.add');
//coupon
Route::post('/apply-coupon', [CouponController::class, 'applyCoupon'])->name('apply.coupon');

//payment
Route::get('/razorpay/{order}', [PaymentController::class, 'razorpayCheckout'])->name('razorpay.checkout');
Route::post('/razorpay/success/{order_id}', [PaymentController::class, 'razorpaySuccess'])
    ->name('razorpay.success');







