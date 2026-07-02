@extends('layouts.main')
@section('middle')


<div class="login">
  	<div>
        <div class="user-box"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
            <a href="index.php">
				<img src="images/login-logo.png" alt="" class="login-logo-img" />
			</a>
            <h4>Reset Password</h4>
            <h5>bivamart.in</h5>
            <form class="" method="post" action="otp.php">
                <div class="login-input" id="">
                    <label><i class="fa fa-envelope"></i></label>
                    <input type="email" placeholder="Registered Email" name="email" id="em" required="">
                </div>
                
                <div class="login-input" id="">
                   <input type="submit" class="" name="sub" id="sub" value="Submit">
                </div>
            </form>
        </div>
  	</div>
</div>


@endsection