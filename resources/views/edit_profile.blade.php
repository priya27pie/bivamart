@extends('layouts.main')
@section('middle')

<div class="inner-profile">
  <img src="{{asset('images/banner2.jpg')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">Edit_profile</p>
   <div class="particle-network-animation"></div>
</div>


@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'User has been updated successfully!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
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
				<div class="agileinfo-ads-display w3l-rightpro col-md-12 offset-md-1">
					<div class="wrapper-profile">
						<!-- first section -->
					<div class="profile-banner">
						<h4><strong>Profile Information</strong></h4>
						<hr>
						@if($type == 'main')
						<form class="profile_edit" action="{{route('submit.EditProfile_data', [$user->id]) }}"  method="post">
							<div class="col-md-2">
								<label>Name:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="{{$user->name}}" name="name"  />
									<input type="hidden" value="main" name="type"  />

							</div>
						
							<div class="col-md-2">
								<label>E-mail id:</label>
							</div>
							<div class="col-md-4">
								<input type="email" value="{{$user->email}}" name="email"   />
							</div>
							<div class="col-md-2">
								<label>Mobile No.:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="{{$user->phone}}" name="phone"  />
							</div>
							<div class="col-md-2">
								<label>State:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="{{$user->state}}" name="state"  />
							</div>
							<div class="col-md-2">
								<label>City:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="{{$user->city}}" name="city"  />
							</div>
							<div class="col-md-2">
								<label>Landmark:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="{{$user->landmark}}" name="landmark"   />
							</div>
							
							
							<div class="col-md-2">
								<label>Pincode:</label>
							</div>
							<div class="col-md-10">
								<input type="text" value="{{$user->pincode}}" name="pincode" />
							</div>
							<div class="col-md-2">
								<label>Address:</label>
							</div>
							<div class="col-md-10">
								<textarea name="address">{{$user->address}}</textarea>
							</div>
							<div class="clearfix"></div>
							<input type="submit" class="green_button" value="Edit" />
														<a href="{{ url('profile')}}" class="button_b">Back</a>

						</form>
							@elseif($type == 'other')	

							<form class="profile_edit" action="{{route('submit.EditProfile_data', [$addresses->id]) }}"  method="post">
							{{csrf_field()}}

							<div class="col-md-2">
								<label>Name:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="{{$addresses->user_name}}" name="user_name"  />
													<input type="hidden" value="other" name="type"  />
							</div>
						
							
							<div class="col-md-2">
								<label>Mobile No.:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="{{$addresses->user_phone}}" name="user_phone" />
							</div>
							<div class="col-md-2">
								<label>State:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="{{$addresses->state}}" name="state"   />
							</div>
								<div class="col-md-2">
								<label>City:</label>
							</div>

							<div class="col-md-4">
								<input type="text" value="{{$addresses->city}}" name="city"   />
							</div>
							<div class="col-md-2">
								<label>Landmark:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="{{$addresses->landmark}}" name="landmark" />
							</div>
							<div class="col-md-2">
								<label>Pincode:</label>
							</div>
							<div class="col-md-4">
								<input type="text" value="{{$addresses->pincode}}" name="pincode" />
							</div>
							<div class="col-md-2">
								<label>Address:</label>
							</div>
							<div class="col-md-10">
								<textarea name="address">{{$addresses->address}}</textarea>
							</div>
							<div class="clearfix"></div>
							<input type="submit" class="green_button" value="Edit" />
							<a href="{{ url('profile')}}" class="button_b">Back</a>
						</form>						
		           @endif 



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