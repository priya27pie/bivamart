@extends('layouts.main')
@section('middle')

<div class="inner-profile">
  <img src="{{asset('images/profile-banner.png')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;"> Order Information</p>
   <div class="particle-network-animation"></div>
</div>

	<!-- top Products -->
	<div class="ads-grid">
        <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
            <h2>Order Delivered <span>  Information</span></h2>
        </div> 
		<div class="container">
			<div class="row">


				<!-- product left -->

				<!-- //product left -->
				<!-- product right -->
				<div class="agileinfo-ads-display col-md-9 w3l-rightpro">
					<div class="wrapper">
						<!-- first section -->
	  					<div class="profile-banner">
							<div class="row">
								<div class="col-md-12" id="order-view">
									<h4><strong>Delivered Primary Information</strong></h4>
									<label><b>Delivery Address <i class="fa-solid fa-check"></i></b></label><br>
									<label>Raaj Majumdar, village-shimulia,PO-shimulia,PS-gopalnagar ,North 24 parganas, Media to Nahata Rode. Shimulia bazar, North Twenty Four Parganas District, West Bengal</label>
								</div>
								<div class="clearfix"></div>
							</div>
	
							<div class="row">
								<div class="col-md-12" id="order-view">
									<h5>Order Summary : </h5>
									<p><label>Order Total: <span>7</span></label></p>
									<p><label>Order ID: <span>78Q#528</span></label></p>
									<p><label>Status: <span>PENDING</span></label></p>
								</div>
								<div class="clearfix"></div>
							</div>
							<hr>
							<div class="text-center">
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <a href="{{url('order_details')}}" class="button">View Details</a>
								</div>
							</div>
						</div>	
					

				<!-- //first section -->
					</div>
				</div>
				<!-- //product right -->
			</div>
		</div>
	</div>
	<!-- //top products -->


@endsection