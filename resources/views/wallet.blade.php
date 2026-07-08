@extends('layouts.main')
@section('middle')


<div class="inner-profile">  
	<img src="{{asset('images/profile-banner.png')}}" alt="" class="inner-banner-img">
 	<p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;"> Wallet </p>
   <div class="particle-network-animation"></div>
</div>



	<!-- top Products -->
<div class="ads-grid">
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Wallet Information<span> Wallet </span></h2>
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
					<div class="profile-banner" style="display: inline-block; width: 100%;">
						<h4><strong>Wallet Information</strong> <span class="bp">Balance : <b> ₹ 999/- </b></span></h4>
						<hr>
						<div class="col-md-8" style="padding:0;">
							<div class="balance-box" style="background:#fcf0e4;border-bottom: 15px solid #ffd1a4;">
								<h6>Balance</h6>
								<h3><b>₹</b> 8520</h3>
								<h5><b>74%</b> Then Last Month</h5>
							</div>
							<div class="balance-box" style="background:#ebf0fe;border-bottom: 15px solid #d8e2ff;">
								<h6>Spending</h6>
								<h3><b>₹</b> 6520</h3>
								<h5><b>36%</b> Then Last Month</h5>
							</div>	
							<div class="balance-box" style="background:#ecf5e7;border-bottom: 15px solid #dcffc9;">
								<h6>Investment</h6>
								<h3><b>₹</b> 3520</h3>
								<h5><b>13% </b> Then Last Month</h5>
							</div>													
						</div>
						<div class="col-md-4">
							<img src="{{asset('images/wallet-G.gif')}}" alt="" style="width: 100%; border: 1px solid #cccccc8f; border-radius: 5px; height: 200px; -webkit-box-shadow: 0px 20px 15px -15px rgba(0, 0, 0, 0.22);">
						</div>
		            </div>
					<!-- //first section -->
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
</div>



@endsection