@extends('layouts.main')
@section('middle')

<div class="login sign">
  	<div>
        <div class="user-box"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
            <a href="index.php">
				<img src="images/login-logo.png" alt="" class="login-logo-img" />
			</a>
            <h4>Sign up to your Account</h4>
            <h5>Continue to bivamart.in</h5>
            <form method="post" id="form" class="form-registration">
                <div class="login-input sign-input" id="">
                    <label><i class="fas fa-user-alt" aria-hidden="true"></i></label>
				    <input type="text" placeholder="Full Name" name="name" required="">
                </div>
                <div class="login-input sign-input" id="">
				    <label><i class="fa fa-phone" aria-hidden="true"></i></label>
				    <input type="text" placeholder="Phone No" maxlength="10" id="phone" onblur="return check2()" pattern="[0-9]+" name="phone" required="">
				    <span class="label-danger" id="error" style="display:none">Phone Number already in use.Please Give another Phone Number</span>
                </div>                
                <div class="login-input sign-input" id="">
                    <label><i class="fa fa-envelope"></i></label>
                    <input type="email" placeholder="Registered Email" name="email" id="email" required="">
                    <span class="label-danger" id="error1" style="display:none">Email already in use.Please Give another Email ID</span>
                </div>                
                <div class="login-input sign-input" id="">
                    <label><i class="fa-solid fa-map-location"></i></label>
                    <select class="drop" name="state" required="" style="">
                        <option value="">~ State ~ </option>
                        <option value="ANDAMAN AND NICOBAR ISLANDS">ANDAMAN AND NICOBAR ISLANDS</option>
                        <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                        <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                    </select>
                </div> 
                <div class="login-input sign-input" id="">
                    <label><i class="fa fa-map-marker" aria-hidden="true"></i></label>
                    <input type="text" class="city" name="city" placeholder="City" required="">
                </div>
                <div class="login-input sign-input" id="">
                    <label><i class="fa-solid fa-map-pin"></i></label>
                    <input type="text" class="pin" name="pincode" placeholder="Pincode" pattern="[0-9]{6}" title="Please give Correct pincode" required="">
                </div>  
                
            
            
                 <div class="login-input sign-input" id="">
                    <label><i class="fa-solid fa-unlock"></i></label>
                    <input type="password" name="password" id="pass1" onkeyup="checkPass(); return false;" placeholder="New Password ">
                </div>
            
                 <div class="login-input sign-input" id="">
                    <label><i class="fa fa-lock" aria-hidden="true"></i></label>
                    <input type="password" name="cpassword1" id="pass2" onkeyup="checkPass(); return false;" placeholder="Confirm Password ">
                    <div id="error-nwl"></div>
                </div>
					
                 <div class="login-input sign-input captcha" id="">
                    <label><i class="fa fa-pen" aria-hidden="true"></i></label>
                    <input type="text" name="captcha" id="captcha" style="" value="1156" readonly="">
                </div>
            
                <div class="login-input sign-input" id="">
                    <label><i class="fa fa-pen" aria-hidden="true"></i></label>
                    <input type="text" name="put_captcha" id="put_captcha" placeholder="Captcha Please" required="">
                </div>

                <div class="login-input checkbox" id="">
                    <ul>
                        <li><input type="checkbox" id="Terms" name="Terms" value="terms-conditions" style="" required=""> <a href="terms-conditions.php">I agree to the Terms &amp; Conditions</a></li>
                        <li><a href="login.php">Sign in instead.</a></li>
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