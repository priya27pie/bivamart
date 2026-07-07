@extends('layouts.main')
@section('middle')




<div class="login">
  	<div>
        <div class="user-box"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
            <a href="index.php">
                <img src="{{asset('images/login-logo.png)}}" alt="" class="login-logo-img" />
			</a>
            <h4>Reset Password</h4>
            <h5>bivamart.in</h5>
            <form class="" method="post" action="otp.php">
                <div class="login-input" id="">
                    <label><i class="fa-regular fa-comment"></i></label>
                    <input type="text" placeholder="Enter OTP" name="text" id="otp" required="">
                </div>
                <div class="login-input" id="">
                    <label><i class="fa-solid fa-unlock"></i></label>
                    <input type="password" name="cpassword1" id="pass2" onkeyup="checkPass(); return false;" placeholder="New Password ">
                </div>
                <div class="login-input" id="">
                    <label><i class="fa fa-lock" aria-hidden="true"></i></label>
                    <input type="password" name="cpassword1" id="pass2" onkeyup="checkPass(); return false;" placeholder="Confirm Password ">
                </div>
                
                <div class="login-input" id="">
                   <input type="submit" class="" name="sub" id="sub" value="Submit">
                </div>
            </form>
        </div>
  	</div>
</div>


<!-- Header include -->
@endsection
<!-- // Header include -->


<style>
    .header{display: none;}
    #footer{display: none;}
</style>