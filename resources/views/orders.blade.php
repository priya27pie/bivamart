@extends('layouts.main')
@section('middle')


@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Address added successfully',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});

</script>
@endif
<script>
  $('.address-radio').on('change', function () {

    var address_id = $(this).val();

    $.ajax({
        url: "{{ route('calculate.shipping') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            address_id: address_id
        },
        success: function(response) {

            $('#shipping_charge').text(response.shipping);

            $('#grand_total').text(response.total);

        }
    });

});
</script>
<div class="inner-profile">
  <img src="{{asset('images/profile-banner.png')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">Order Information</p>
   <div class="particle-network-animation"></div>
</div>

	<!-- top Products -->
	<div class="ads-grid">
        <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
            <h2>Ship Address <span>   Information</span></h2>
        </div> 
		<div class="container">
			<div class="row">


				<!-- product left -->

				<!-- //product left -->
				<!-- product right -->
				<div class="agileinfo-ads-display col-md-8 w3l-rightpro">
					<div class="wrapper">
						<!-- first section -->
	  					<div class="profile-banner">
							<div class="row">

							<div class="col-md-12" id="order-view">
    <h4><strong>Delivery Primary Information</strong></h4>
<form action="{{ route('submit.address',['order'=>request('order')]) }}" method="POST">
    @if(empty($user->address))
        <a data-target="#myModal2" data-backdrop="static" data-toggle="modal"
           href="#" class="Ship-Another-Address">
            Add Address
        </a>
    @else

        <label>
            <b>Delivery Address <i class="fa-solid fa-check"></i></b>
        </label><br>
    <div class="address-box mt-3">

            <input type="radio"  class="address-radio" name="address_id" value="primary">
         {{ $user->name }},
          {{ $user->phone }},
            {{ $user->address }},
            {{ $user->landmark }},
            {{ $user->city }},
            {{ $user->state }} - {{ $user->pincode }}
       
</div>
        <br>

        <a data-target="#myModal2" data-backdrop="static" data-toggle="modal"
           href="#" class="Ship-Another-Address">
            Ship to another Address?
        </a>

    @endif
@foreach($addresses as $address)
    <div class="address-box mt-3">
        <input type="radio"  class="address-radio" name="address_id" value="{{ $address->id }}">

        <strong>
        {{ $address->user_name }}</strong><br>
        {{ $address->user_phone }}<br>
        {{ $address->address }}<br>
        {{ $address->landmark }}<br>
        {{ $address->city }}, {{ $address->state }} - {{ $address->pincode }}
    </div>
@endforeach

<input type="submit" name="choose">
</form>
</div>

								<div class="clearfix"></div>
							</div>
	
							<div class="text-center">
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
<!--                                 <a href="#" class="button">Payment</a>
 -->                                <a href="{{url('order_details')}}" class="">NEXT</a>
								</div>
							</div>
						</div>	
					

				<!-- //first section -->
					</div>
				</div>
				<!-- //product right -->

				                  <div class="col-md-4 col-sm-4 col-xs-12">
                      <div class="flipkart-box-right">
                        <h3>Price Details </h3>
                          <div class="container-fluid" style="background-color: #ffffff;">
                            <h4 style="font-size:16px;font-weight:600;">Coupons &amp; Offers (if any)</h4>
                           
                              <div class="row" style="">
                                <div class="col-md-9" style="padding:0px;background-color: white;">
                                  <input type="text" class="form-control" placeholder="Enter Coupon Code" id="couponcode" name="code">
                                </div>
                                <div class="col-md-3" style="padding:0px">
                                  <button class="form-control" style="background-color: black;color: white;width:100%" onclick="checkcouponcode()">APPLY</button>
                                </div>
                              </div>
                        </div>
                        <hr>

                          <p>Price (5 items)<span> ₹7,246</span></p>

                            <p>Total MRP (Inclusive of all taxes)  ₹<span id="grand-mrp"> 5,929</span></p>
                            <p>Discount -₹<span style="color: #ff0000;" id="grand-discount">929</span></p>
                            <h2>Total  ₹<span id="grand-total">2,929</span></h2>
                            <p>Coupon ₹<span id="coupon">0</span></p>
                            <h2>Cart Total ₹<span id="grand-cart">2,929</span></h2>
                            <p>Shipping <span id="shipping_charge">0</span></p>
                            <h2>Total Payable ₹<span id="grand_total"></span></h2>
                            <img src="{{asset('images/cart-bg-right.jpg')}}" alt="" style="width:100%;">
                      	<a href="#" class="button">Payment</a>
                      </div>                      
                  </div>
			</div>
		</div>
	</div>
	<!-- //top products -->



<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(90deg,rgb(111, 43, 0) 0%, rgb(255, 139, 0) 50%, rgb(113, 44, 0) 100%); border: 5px solid #fe8a001c;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Your Shipping Address</h4>
        </div>
        
        <div class="modal-body">
        <form class="form-horizontal" action="{{route('submit.addAddress')}}" id="form" role="form" method="post">
        <div class="form-group">
            <div class="col-md-10 col-xs-offset-1">
                <label>Name *</label>
                <input type="text" class="name" name="user_name" value="{{session('user_name')}}" placeholder="Name">    
                
                <label>Phone NO *</label>
                <input type="text"  placeholder="phone No" name="user_phone" value="{{session('user_phone')}}" >              
                
                <label>Address</label>   
                <textarea class="form-control" name="address" placeholder="Address" required></textarea>
                <label>Landmark </label>
                <input type="text" class="pin" name="landmark" placeholder="Landmark"  title="Please give Correct Landmark" required>
                
              
                <label>Pincode </label>
                <input type="text" class="pin" name="pincode" placeholder="Pincode" title="Please give Correct pincode" required>
                
                <label>City </label>
                <input type="text" class="city" name="city" placeholder="City" style="" required>
                
                <label>State </label>
                  <select class="drop" name="state" required="" style="">
                        <option value="">~ State ~ </option>
                        @foreach($state_list as $state)
                        <option value="{{$state->state}}">{{$state->state}}</option>
                        @endforeach
                       
                    </select>
            </div>
            </div>
            <div class="col-xs-offset-6">
                <div class="snipcart-details top_brand_home_details">
                    <input type="submit" class="button_1" value="Update" id="submit" name="change"/> 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>  
            </div>
        </form>
         </div>
      
    </div>

  </div>
</div>




@endsection