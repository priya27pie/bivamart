@extends('layouts.main')
@section('middle')

<div class="inner-profile">  
	<img src="{{asset('images/profile-banner.png')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;"> Profile </p>
   <div class="particle-network-animation"></div>
</div>



	<!-- top Products -->
<div class="ads-grid">
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Order Information<span> My orders </span></h2>
    </div> 
  <!-- //tittle heading -->
	<div class="container">
		<div class="row">
			<!-- product left -->
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display w3l-rightpro col-md-12 offset-md-1">
				<div class="wrapper-profile">
					<!-- first section -->
		
	@forelse($orders as $order)

						<div class="profile-banner">
							<div class="row">
								<div class="col-md-12 pri-information">
									<h3>Primary Information - <span>{{ date("l ,jS F Y h:i:s A",strtotime($order->created_at)) }}</span></h3>
								</div>
								<div class="clearfix"></div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-12 pri-information">
									<p><label>Order Total: <b>₹ </b> {{ $order->total_amount+$order->shipping_charge-$order->coupon_discount}}</label></p>
									<p><label>Order ID:{{ $order->order_id }} </label></p>
									<p><label>Payment Status: {{ $order->payment_status }} ({{$order->payment_method}})</label></p>
								</div>
								<div class="clearfix"></div>
							</div>
							<hr>
							<div class="text-center">
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<a href="order_details/{{$order->order_id}}" class="button">View Details</a>
									<a href="bill/{{$order->order_id}}" target="_blank" class="button">Print bill</a>
								</div>
							</div>
						</div>
@empty

		<div class='profile-banner'> <h5 class='text-center'><b> You Have No order Show</b></h5>	</div>

@endforelse			


@endsection