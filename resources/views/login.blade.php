@extends('layouts.main')
@section('middle')



@if(session('error'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Wrong Credentials!',
    text: "{{ session('error') }}",
    timer: 2000,
    showConfirmButton: false
});

</script>
@endif
<div class="login">
  	<div>
        <div class="user-box"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
            <a href="index.php">
				<img src="images/login-logo.png" alt="" class="login-logo-img" />
			</a>
            <h4>Login to your Account</h4>
            <h5>Continue to bivamart.in</h5>
            <form class="" url="{{route('submit.userLogin')}}" method="post">
              {{csrf_field()}}
                <div class="login-input" id="">
                    <label><i class="fa fa-user" aria-hidden="true"></i></label>
                    <input type="email" placeholder=" User ID" name="email" id="em" required="">
                </div>
                <div class="login-input" id="">
                    <label><i class="fa fa-lock" aria-hidden="true"></i></label>
                    <input type="password" placeholder=" Password" name="password" id="password" required="">
                </div>  
                <div class="login-input" id="">
                    <ul>
                        <li><a href="forgot_pass.php">Forgot password ?</a></li>
                        <li><a href="{{ url('signup') }}">Create a new account.</a></li>
                    </ul>
                </div>
                <div class="login-input" id="">
                   <input type="submit" class="" name="sub" id="sub" value="Submit">
                </div>
            </form>
        </div>
  	</div>
</div>


@endsection