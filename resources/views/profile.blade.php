@extends('layouts.main')
@section('middle')



@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'User address has been deleted!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

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
			<div class="agileinfo-ads-display w3l-rightpro col-md-12 offset-md-1">
				<div class="wrapper-profile">
					<!-- first section -->
					<div class="profile-banner">
				<h4><strong>Profile Information</strong> <span class="bp">Biva Point : <b>{{ $user->biva_points }} </b></span></h4>
						<hr>
						<form class="profile" action="" method="post">
							<div class="col-md-2">
								<label>Name:</label>
							</div>
							<div class="col-md-2">
								<input type="text" value="{{session('user_name')}}" name="name"   readonly/>
							</div>
							
							<div class="col-md-2">
								<label>E-mail id:</label>
							</div>
							<div class="col-md-2" style="padding: 0;">
								<input type="email" value="{{session('user_email')}}" name="em"   readonly/>
							</div>
							<div class="col-md-2">
								<label>Mobile :</label>
							</div>
							<div class="col-md-2">
								<input type="text" value="{{session('user_phone')}}" name="mob"  readonly/>
							</div>
							
							<div class="col-md-2">
								<label>Address:</label>
							</div>
							<div class="col-md-10">
							<div class="address-box">
								<sup>Primary address</sup>	
								<strong>{{session('user_name')}}</strong>,
								<span>{{session('user_phone')}},</span>
								<span>

									{{ $user->address }},</span>
								<span>{{ $user->landmark }},</span>
								<span>{{ $user->city }}, {{ $user->state }} - {{ $user->pincode }}</span>
								<span class="editanddelet">
									<a href="{{ url('edit_profile/main/'.$user->id)}}"><i class="fa-regular fa-pen-to-square"></i>Edit</a>
									
								</span>
							</div>
						</div>
							<div class="col-md-10 offset-md-2">
								<sup>Other Address</sup>
							@foreach($addresses as $address)
							<div class="address-box">
							<strong>{{ $address->user_name }}</strong>,
							<span>{{ $address->user_phone }},</span>
							<span>{{ $address->address }},</span>
							<span>{{ $address->landmark }},</span>
							<span>{{ $address->city }}, {{ $address->state }} - {{ $address->pincode }}</span>
								<span class="editanddelet">
									<a href="{{ url('edit_profile/other/'.$address->id)}}"><i class="fa-regular fa-pen-to-square"></i>Edit</a> /
									<a href="deleteAddress/{{$address->id}}" style="background: #d70101;"><i class="fa-solid fa-delete-left"></i>Delete </a>
								</span>
							</div>
							@endforeach
							</div>
							<div class="clearfix"></div>
							
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