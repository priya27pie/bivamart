@extends('layouts.main')
@section('middle')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

$('#phone').on('keyup', function(){

    var phone = $(this).val();
 if (phone.length == 0) {
        $('#msg').html('');
        return;
    }

    $.ajax({
       url:"{{ url('/check-phone') }}",
        type:'POST',
        data:{
            phone:phone,
            _token:$('input[name="_token"]').val()
        },
             success:function(response){

                //.log(response);

                $('#msg').html(response.message);
            if(response.status == true){

                    $('#sub').prop('disabled', true);

                }else{

                    $('#sub').prop('disabled', false);

                }
            },

            error:function(xhr){

                console.log(xhr.responseText);

            }
    });

});
});
        $(document).ready(function() {

$('#email').on('keyup', function(){

    var email = $(this).val();
     if (email.length == 0) {
        $('#msg1').html('');
        return;
    }
    $.ajax({
       url:"{{ url('/check-email') }}",
        type:'POST',
        data:{
            email:email,
            _token:$('input[name="_token"]').val()
        },
             success:function(response){

                console.log(response);

                 $('#msg1').html(response.message);
                   if(response.status == true){

                    $('#sub').prop('disabled', true);

                }else{

                    $('#sub').prop('disabled', false);

                }

            },

            error:function(xhr){

                console.log(xhr.responseText);

            }
    });

});
});

function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('error-nwl');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";

     if (email.pass2 == 0) {
        message.innerHTML = "";
         return;
    }
    if(pass1.value.length > 7)
    {
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
    }
    else
    {
        message.style.color = badColor;
        message.innerHTML = " you have to enter at least 8 digit!"
        return;
    }
  
    if(pass1.value == pass2.value)
    {
        message.style.color = goodColor;
        message.innerHTML = "ok!"
        document.getElementById("btn").disabled = false;
   
    }
    else
    {
        message.style.color = badColor;
        message.innerHTML = " These passwords don't match"
       document.getElementById("btn").disabled = true;

    }
}

$(document).ready(function() { 
  $('#form').submit(function(e) {
    
   var putcaptcha=$('#put_captcha').val();
   var captcha=$('#captcha').val();

   if(captcha!=putcaptcha){
        alert("Captcha is not same");
        e.preventDefault();
        return false;
    } else {
        return true;
    }
  });
});

</script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Registration Successful!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
}).then(() => {

    window.location.href = "{{ url('/otp_verification') }}";
});

</script>
@endif
<div class="login sign">
  	<div>
        <div class="user-box"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
            <a href="index.php">
				<img src="images/login-logo.png" alt="" class="login-logo-img" />
			</a>
            <h4>Sign up to your Account</h4>
            <h5>Continue to bivamart.in</h5>
            <form method="post" id="form" action="{{route('submit.insertuser')}}" class="form-registration">
                 {{csrf_field()}}
                <div class="login-input sign-input" id="" style="width:96%;">
                    <label style="width:8%;"><i class="fas fa-user-alt" aria-hidden="true"></i></label>
				    <input style="width:92%;" type="text" placeholder="Full Name" name="name" required="">
                </div>
                <div class="login-input sign-input" id="">
				    <label><i class="fa fa-phone" aria-hidden="true"></i></label>
				    <input type="text" placeholder="Phone No" maxlength="10" id="phone" pattern="[0-9]+" name="phone" required="">
				    <span class="label-danger" id="msg"></span>
                </div>                
                <div class="login-input sign-input" id="">
                    <label><i class="fa fa-envelope"></i></label>
                    <input type="email" placeholder="Registered Email" name="email" id="email" required="">
                    <span class="label-danger" id="msg1"></span>
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
                    <input type="text" name="captcha" id="captcha1" style="" value="<?php echo rand(0,1999); ?>" readonly="">
                </div>
            
                <div class="login-input sign-input" id="">
                    <label><i class="fa fa-pen" aria-hidden="true"></i></label>
                    <input type="text" name="put_captcha" id="put_captcha1" placeholder="Captcha Please" required="">
                </div>

                <div class="login-input checkbox" id="">
                    <ul>
                        <li><input type="checkbox" id="Terms" name="Terms" value="terms-conditions" style="" required=""> <a href="terms-conditions.php">I agree to the Terms &amp; Conditions</a></li>
                        <li><a href="{{ url('login') }}">Login Now</a></li>
                    </ul>
                </div>
                
                <div class="login-input" id="">
                   <input type="submit" class="" name="sub" id="sub" value="Submit" disabled>
                </div>
		    </form>

        </div>
  	</div>
</div>



@endsection