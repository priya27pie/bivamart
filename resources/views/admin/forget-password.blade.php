<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login-Bivamart</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('admin/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Montserrat:100,200,300,400,500,600,700,800,900"]},
			custom: {"families":["Flaticon", "LineAwesome"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/ready.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/ssets/sweetalert-master/dist/sweetalert.css')}}">
	<script src="{{asset('admin/assets/sweetalert-master/dist/sweetalert.min.js')}}"></script>

</head>
<body class="login" style="  background-size: cover;">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Sign In To Admin->Bivamart</h3>

	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif
			<form method="POST" action="">
    @csrf

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        Send Reset Link
    </button>
</form>
				
		</div>

	
	</div>
	<script src="{{asset('admin/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/ready.js')}}"></script>

</body>
</html>