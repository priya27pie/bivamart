@extends('layouts.main')
@section('middle')

<div class="inner-profile">
  <img src="{{asset('images/banner2.jpg')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">Edit_profile</p>
   <div class="particle-network-animation"></div>
</div>



	<!-- top Products -->
<div class="ads-grid">
	<div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Edit Profile<span> Edit Profile Details </span></h2>
    </div> 

		<div class="container">
			<div class="row">
				<!-- product left -->

				<!-- //product left -->
				<!-- product right -->
				<div class="agileinfo-ads-display w3l-rightpro col-md-10 offset-md-1">
					<div class="wrapper-profile">
						<!-- first section -->
					<div class="profile-banner">
						<h4><strong>Profile Information</strong></h4>
						<hr>
						<form class="profile_edit"  method="post">
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
						</form>		
		            </div>


					<div class="profile-banner">
						<form class="profile"  method="post">
	                        <div class="col-md-6">
	            			    <div class="input">
	                			    <label for="password">New Password :</label>
	                				<input type="password" placeholder="New Password" id="reg_pass" name="password" required="">
	                			</div>                            
	                        </div>                       				    
	                        <div class="col-md-6">
	            			    <div class="input">
	            			        <label for="com-password">Confirm Password :</label>
	            				    <input type="password" placeholder="Confirm Password" onkeyup="check()" id="reg_confirm_pass" name="password" required="">
	            				    <div id="message"></div>
	            			    </div>                            
	                        </div>
	                        <input type="submit" id="pass_up" class="green_button" name="update_pass" value="Update" />
						</form>
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