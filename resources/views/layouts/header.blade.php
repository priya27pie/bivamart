<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>BM BIVA MART | bivamart.in</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Custom Theme files -->
	<link rel="icon" href="{{asset('images/fav.png')}}" type="image/x-icon"><!-- Fav icon-->
	<link href="{{asset('css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
    <link href="{{asset('css/particle.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> <!-- font-awesome icons -->
	<link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/aos.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- Animation -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
	<link href="{{asset('css/flexslider.css')}}" rel="stylesheet" type="text/css"><!--flexslider -->  
	<link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- jquery-ui.css -->    
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Parisienne&family=Raleway:ital,wght@0,700;1,300;1,400;1,700&display=swap" rel="stylesheet"><!-- font-family: 'Parisienne', cursive;
 // font-family: 'Raleway', sans-serif; -->
     <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" type="text/css" rel="stylesheet" media="all">

	<link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" media="all"> 


</head> 

<body>


<div class="header">
		<!-- header-top -->
	<div class="header-top">
	    <div class="container">
	    	<div class="row">
				<div class="col-md-3 col-sm-4 col-sx-12">
					 <div class="logo-new" data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
						<a href="{{ route('index') }}">
							<img src="{{asset('images/BivaMart-Logo.png')}}" alt="" class="logo-img" />
						</a>
					</div> 
				</div>
				<div class="col-md-5 col-sm-4 col-sx-6">
					<div class="book_search" data-aos="fade-down" style="transition:all 1400ms ease-in-out;">
						<form action="/action_page.php">  
							<div class="select-container">
						      	<select id="country" onchange="change_country(this.value)" class="drop">
									<option value="null">All</option>
									<option value="Book">Book</option>  
									<option value="Book">Book</option> 
								</select>
						    </div>
						    <div class="search-container">
						    	<input type="text" placeholder="Search books by title, author and ISBN" name="search">
						      	<button type="submit"><i class="fa fa-search"></i></button>
						    </div>
						</form>
					</div>
				</div>				
				<div class="col-md-4 col-sm-4 col-sx-6">
					<div class="barnd-login" data-aos="zoom-in" style="transition:all 1400ms ease-in-out;">
						<div class="dropdown">
						  <button class="dropbtn"><span>☰</span> USER</button>
						  <div class="dropdown-content">
						 <!--   <ul>-->
							<!--	<li><a href="profile.php"><i class="fa fa-id-badge"></i>Your Account</a></li>-->
							<!--	<li><a href="#"><i class="fa fa-rupee"></i>SD Cash</a></li>-->
							<!--</ul>	-->
						    <ul class="log-sing">
								<li><a href="login.php"><i class="fa fa-user"></i>Sign in</a></li>
								<li><a href="{{ url('signup') }}"><i class="fa fa-sign"></i>Sign up</a></li>
							</ul>										    
						  </div>
						</div>
					</div>
					<div class="barnd-cart" data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
				
					
<a href="{{ route('cart.index') }}">
    <i class="fa fa-cart-plus" aria-hidden="true"></i>

    <span id="cart-count">
        {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : '' }}
    </span>
</a>

					</div>
				</div>
			</div>			
		</div>
	</div>

		<!-- header-bottom -->
	<div class="header-bottom" data-aos="fade-down" style="transition:all 1500ms ease-in-out;">
			 <div class="menu-new">
			     <ul>
			        <li>
    				<a href="{{ url('allbook') }}">
    					<img src="{{asset('images/m1.png')}}" alt="" class="menu-img" />
    					<span class="all_book">All Book</span>
    				</a>
    				</li>
    	            <li>
    				<a href="all_product.php">
    					<img src="{{asset('images/m3.png')}}" alt="" class="menu-img" />
    					<span class=""> Product Pre Booking</span>
    				</a>
    				</li>
    	            <li>
    				<a href="all_product.php">
    					<img src="{{asset('images/m5.png')}}" alt="" class="menu-img" />
    					<span class="">Scientific Products</span>
    				</a>
    				</li>
    	            <li>
    				<a href="all_product.php">
    					<img src="{{asset('images/m4.png')}}" alt="" class="menu-img" />
    					<span class="">Home Decor</span>
    				</a>
    				</li>
    	            <li>
    				<a href="all_product.php">
    					<img src="{{asset('images/m2.png')}}" alt="" class="menu-img" />
    					<span class="">Toys & Games</span>
    				</a>
    				</li>
    	            <li>
    				<a href="all_product.php">
    					<img src="{{asset('images/m6.png')}}" alt="" class="menu-img" />
    					<span class="">Designer Merchandise</span>
    				</a>
    				</li>
				</ul>
			</div> 
	</div>





</div>
