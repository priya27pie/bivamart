@extends('layouts.main')
@section('middle')



<style>
    /*.header-bottom{display: none;}*/
</style>		
<!-- Inner-Banner -->

<div class="inner-profile">  
	<img src="{{asset('images/profile-banner.png')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;"> Profile </p>
   <div class="particle-network-animation"></div>
</div>



	<!-- top Products -->
<div class="ads-grid">
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Account Information<span> Profile </span></h2>
    </div> 
  <!-- //tittle heading -->
	<div class="container">
		<div class="row">
			<!-- product left -->
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9 w3l-rightpro">
				<div class="wrapper-profile">
					<!-- first section -->
					<div class="profile-banner">
						<h4><strong>Profile Information</strong></h4>
						<hr>
						<form class="profile" action="" method="post">
							<div class="col-md-2">
								<label>Name:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="Raaj Majumdar" name="name"   readonly/>
							</div>
							<div class="col-md-2">
								<label>City:</label>
							</div>
							<div class="col-md-4">
								<input type="text"  value="Gopalnagar" name="city"   readonly/>
							</div>
							<div class="col-md-2">
								<label>E-mail id:</label>
							</div>
							<div class="col-md-4">
								<input type="email" value="babul@gmail.com" name="em"   readonly/>
							</div>
							<div class="col-md-2">
								<label>Mobile No.:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="+91 9876504321" name="mob"  readonly/>
							</div>
							<div class="col-md-2">
								<label>State:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="West bengal" name="st"   readonly/>
							</div>
							<div class="col-md-2">
								<label>Pincode:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="743299" name="pin" readonly/>
							</div>
							<div class="col-md-2">
								<label>Address:</label>
							</div>
							<div class="col-md-10">
								<textarea name="add" readonly>Village-Shimulia, PO-Shimulia, PS-gopalnagar, North 24 parganas, Shimulia</textarea>
							</div>
							<div class="clearfix"></div>
							<input type="submit" class="green_button" value="Edit" />
							 <a href="{{ url('edit_profile') }}">NEXT</a>
						</form>		
		            </div>
					<!-- //first section -->
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
</div>
@endsection