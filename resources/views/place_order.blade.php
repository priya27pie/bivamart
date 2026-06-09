@extends('layouts.main')
@section('middle')

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Order Placed successfully!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});

</script>
@endif

<div class="inner-profile">
  <img src="{{asset('images/profile-banner.png')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">Place Your Order</p>
   <div class="particle-network-animation"></div>
</div>

	<!-- top Products -->
	<div class="ads-grid">
      <!-- tittle heading -->
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Your Order<span>  Check Out</span></h2>
    </div>
      <!-- //tittle heading -->
		<div class="container">
			<div class="row">
<form action="{{ route('submit.paytype',['order'=>request('order')]) }}" method="POST">

					<div class="agileinfo-ads-display w3l-rightpro">
                <div class="col-md-8 col-sm-8 col-xs-12">
						<div class="wrapper-profile">
							<!-- first section -->
							<div class="profile-banner">
								<h4><strong>Payment Option</strong></h4>
								<hr>
                                                              
                  <div class="agileinfo_mail_grid_left">
                  <ul class="big">
                  <li><i class="fa fa-check" aria-hidden="true"></i></li>
                  <li>Payment mode</li>
                  </ul>
                  <label><input type="radio" name="payment_method" value="COD" /> COD</label>
                  <label><input type="radio"  name="payment_method" value="Online" checked /> Online</label>
                  </div>

                  <div class="clearfix"></div>

                           
                             
                                                         
						    </div>
							<!-- //first section -->
						</div>
					</div>
                    </div>
				<!-- //product right -->
                 
        <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="flipkart-box-right">
         <h3>Order Summary </h3>
                      

          <p>Total MRP (Inclusive of all taxes)  ₹<span id="grand-mrp"> {{ $order->total_amount }}</span></p>
          <p>Discount <span style="color: #ff0000;" id="grand-discount">-<b>₹</b>{{ $order->total_discount }}</span></p>
          <h2>Total  <span id="grand-total"><b>₹</b>{{ $order->total_amount }}</span></h2>
          <p>Coupon <span id="coupon">-<b>₹</b>{{ $order->coupon_discount }}</span></p>
          <h2>Cart Total <span id="grand-cart"><b>₹</b> {{ $order->total_amount-$order->coupon_discount }}</span></h2>
          <p>Shipping <span>{{ $order->shipping_charge }}</span></p>
          <h2>Total Payable <span id="shipping_total"><b>₹</b> {{ $order->total_amount+$order->shipping_charge-$order->coupon_discount }}</span></h2>

              <input type="hidden" name="sub_tot" id="sub_total" value="{{ $order->total_amount }}">

          <img src="{{asset('images/cart-bg-right.jpg')}}" alt="" style="width:100%;">
        </div>                     
        <div class="snipcart-details top_brand_home_details">
          <input type="submit" value="CHECKOUT" name="choose" class="button-submit" style=" width: 40% !important; margin: 15px 0 0 0; ">
        


        </div>
      </div> 
</form>


			</div>
		</div>
	</div>
	<!-- //top products -->





@endsection