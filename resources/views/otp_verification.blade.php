@extends('layouts.main')
@section('middle')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="login">

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'OTP verified. welcome now!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
  
@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'failed!',
    text: "{{ session('error') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
              
        <div class="user-box"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
            <a href="">
				<img src="images/login-logo.png" alt="" class="login-logo-img" />
			</a>
            <h4>Verify Your Email/Phone</h4>
            <h5>Continue to bivamart.in</h5>
         <form method="post" id="form" action="{{route('submit.verifyotp')}}">
            
            <input type="text" name="otp" value="{{ session('login_otp') }}"  placeholder="OTP">
            <input type="text" name="email" value="{{ session('login_email') }}">
            <input type="text" name="phone" value="{{ session('login_phone') }}">
            
            <div class="form-left-to-w3l " id="b_name">
            <img src="images/fav.png" alt="" title="" class="logo-log" style="">
            <h4>OTP</h4>
            <h5>Confirm OTP</h5>
            <div class="form-left-to-w3l">
                <label>Please Enter Your OTP</label>
                <input type="text" name="otp_new" class="form-control form-control-lg" placeholder="Enter new OTP" aria-label="OTP" aria-describedby="basic-addon1" required="">
            </div>
                        
             <div class="login-input" id="">
            <input type="submit" name="sub" value="Verify" class="">
                </div>            
                <div style="color:red;font-weight:600">
                    <span id="timer">
                    <span id="time">60</span> Seconds      
                    </span>
                </div>
            
            <script>
            $( document ).ready(function() {
            var counter = 60;
            var interval = setInterval(function() {
                counter--;
                // Display 'counter' wherever you want to display it.
                if (counter <= 0) {
                        clearInterval(interval);
                        
                    $('#timer').hide();  
                    $('#resend').show();  
                    
                    return;
                }else{
                    $('#time').text(counter);
                  console.log("Timer --> " + counter);
                }
            }, 1000);
                
            });
            </script>          
                <div id="resend" style="display:none; text-align: center; color: #f00; font-size: 15px; padding: 5px 0 0;">
            <a href="{{ url('/resend-otp') }}">Resend OTP</a>
    </div>  
        </div>
                
</form>
        </div>
  	
</div>


@endsection