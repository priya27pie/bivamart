@extends('layouts.main')
@section('middle')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
.qty-box {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    width: fit-content;
    border-radius: 6px;
}

.qty-box button {
    background: #f5f5f5;
    border: none;
    padding: 5px 12px;
    cursor: pointer;
    font-size: 18px;
}

.qty-input {
    width: 40px;
    text-align: center;
    border: none;
}

.remove-item {
    background: red;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}
</style>

<style>
    /*.header-bottom{display: none;}*/
</style>        
<!-- Inner-Banner -->

<div class="inner-profile">
  <img src="{{asset('images/profile-banner.png')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">Check Out</p>
   <div class="particle-network-animation"></div>
</div>

<!-- // Inner-Banner -->

    <div class="cart-flipkart">
  
 @if(session('cart') && count(session('cart')) > 0)
  <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Welcome to Cart<span>  Check Out</span></h2>
    </div> 
<div class="container">
            <div class="flipkart-box">
                <div class="row">
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <div class="flipkart-box-left">
                          <div class="title-top">
                              <h3>My Cart </h3>
                           
                          </div>

@if(count($cart) > 0)
<table width="100%" cellpadding="10">

<tr class="title-top">
<td>Product Name</td>
<td>Price</td>
<td>Quantity</td>
<td>Total</td>
</tr>

@foreach($cart as $key => $item)

@php
    $price = $item['discounted_price'] ?? $item['price'];
@endphp

<tr data-key="{{ $key }}">
    <td>
        <img src="{{ asset('uploads/'.$item['image']) }}" width="60">
           <strong>{{ $item['name'] }}</strong>
           <input type="hidden" class="main_price" value="{{ $item['price'] }}">
           <input type="hidden" class="disc_price" value="{{ $item['discounted_price'] }}">

<h3 style="color:#10b610;font-size:18px;font-weight:600;" class="discountshow">You Saved ₹ {{ $item['price']*$item['quantity'] - $item['discounted_price']*$item['quantity'] }}!</h3>

    </td>

   
    <td>  ₹<span class="price">{{ $price }}</span></td>
    <td>
        <!-- 🔥 Quantity UI -->
        <div class="qty-box">
            <button class="qty-minus">−</button>
            <input type="text" class="qty-input" value="{{ $item['quantity'] }}" readonly>
            <button class="qty-plus">+</button>
        </div>
    </td>

    <td>
        ₹<span class="item-total">
            {{ $price * $item['quantity'] }}
        </span>
    </td>

    <td>

        <button class="remove-item" data-key="{{ $key }}">🗑</button>    </td>

</tr>

@endforeach
</table>

</div>


    @else
        <p>Your cart is empty</p>
    @endif

</div>

      <div class="col-md-4 col-sm-4 col-xs-12">


                      <div class="flipkart-box-right">
<div class="container-fluid" style="background-color: #ffffff;padding-top: 20px;padding-bottom: 20px;">
                    <h4 style="font-size:16px;font-weight:600;">Coupons &amp; Offers (if any)</h4><hr>
                    <div class="col-md-12">
                            <div class="row" style="">
                                <div class="col-md-9" style="padding:0px;background-color: white;">
                                    <input type="text" class="form-control" placeholder="Enter Coupon Code" id="couponcode" name="code">
                                </div>
                                <div class="col-md-3" style="padding:0px">
                                    <button class="form-control" style="background-color: black;color: white;width:100%" onclick="checkcouponcode()">APPLY</button>
                                </div>
                            </div>
                    </div>
            </div>

                        
                          <h3>Order Summary </h3>
                          <p>Total MRP (Inclusive of all taxes)  ₹<span id="grand-mrp"> {{ $mrptotal }}</span></p>
                          <p>Discount -₹<span style="color: #ff0000;" id="grand-discount">{{ $discounttotal }}</span></p>
                          <h2>Total  ₹<span id="grand-total">{{ $total }}</span></h2>
                          <p>Coupon ₹<span id="coupon">0</span></p>
                          <h2>Cart Total ₹<span id="grand-cart">{{ $total }}</span></h2>
                           <p>Shipping <span>Extra</span></p>
                           <h2>Total Payable ₹<span id="shipping_total">{{ $total }}</span></h2>


                        <img src="{{asset('images/cart-bg-right.jpg')}}" alt="" style="width:100%;">
                      </div>                      
              <div class="snipcart-details top_brand_home_details">
                                <input type="submit" value="CHECKOUT" name="sub" class="button" style="  ">
                                <a href="place_order.php">NEXT</a>
                            </div>
     

                  </div>       



</div>
</div>

</div>
   @else
       <div class="cart_empty">
    <br>
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Your Cart is empty</h2>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xm-12" style="text-align: center;">
              <img src="{{asset('images/Cart-empty.gif')}}" alt="" style="width: 40%;" />
          </div>
        </div>
    </div>
</div>
    @endif
</div>

<script>
$(document).on('click', '.qty-plus, .qty-minus', function(){

    let row = $(this).closest('tr');
    let key = row.data('key');
    let input = row.find('.qty-input');
    let qty = parseInt(input.val());
   
 

//console.log("KEY:", key);
//console.log("QTY:", qty);

    if($(this).hasClass('qty-plus')){
        qty++;
    } else {
        qty--;
        if(qty < 1) return;
    }

    updateCart(key, qty, row);


});


function updateCart(key, qty, row){

    $.ajax({
        url: '{{ route("cart.update") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            key: key,
            quantity: qty
        },
        success: function(res){
 console.log("RESPONSE:", res);
            // update qty input
            row.find('.qty-input').val(qty);

            // update item total
            let price = parseFloat(row.find('.price').text());
           row.find('.item-total').text(price * qty);
 
    let main_price = parseFloat(row.find('.main_price').val());
    let disc_price = parseFloat(row.find('.disc_price').val());
    let discount = (main_price - disc_price) * qty;

    row.find('.discountshow').text('You Saved ₹ '+discount+' !');
;

            // update grand total
            $('#grand-total').text(res.total);
            $('#grand-cart').text(res.total);
            //update mrp total
            $('#grand-mrp').text(res.mrptotal);
            //update discount total
             $('#grand-discount').text(res.discounttotal);

            // update cart count
            $('#cart-count').text(res.cart_count);


            // update shipping 
            $('#shipping_total').text(res.total);
        },

        error: function(xhr){
    console.log("ERROR:", xhr.responseText);
}
    });
}


$(document).on('click', '.remove-item', function(){
    let key = $(this).data('key');

    $.post('{{ route("cart.remove") }}', {
        _token: '{{ csrf_token() }}',
        key: key
    }, function(){
        location.reload();
    });
});
</script>
@endsection