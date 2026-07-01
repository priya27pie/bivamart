<!DOCTYPE html>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Sweet Alert -->
<script src="{{asset('admin/assets/sweetalert-master/dist/sweetalert.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/sweetalert-master/dist/sweetalert.css')}}">
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
						  <button class="dropbtn"><span>☰</span>
						  @if(session('user_phone')!="" || session('user_phone')!="") 
						Hi ! {{session('user_name')}}
						@else
						User
						@endif
					</button>
						  <div class="dropdown-content">
					
						    <ul class="log-sing">
						    	@if(session('user_phone')!="" || session('user_name')!="")
								<li><a href="{{ url('profile') }}"><i class="fa fa-user"></i> Profile</a></li>
								<li><a href="{{ url('allorders') }}"><i class="fa-solid fa-book"></i> All Orders</a></li>
								<li><a href="{{ url('profile') }}"><i class="fa-solid fa-heart"></i> Wishlist</a></li>
								<li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign"></i>Logout</a>
								<form id="logout-form" action="{{route('submit.Userlogout')}}" method="POST" style="display:none;">
								@csrf
								</form>
								</li>
								@else
								<li><a href="{{ url('login') }}"><i class="fa fa-user"></i>Sign in</a></li>
								<li><a href="{{ url('signup') }}"><i class="fa fa-sign"></i>Sign up</a></li>
								@endif
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
		<div class="menu-all">	
			<nav class="navbar navbar-dark bg-dark">
			  <div class="container-fluid">
			    <button class="btn btn-outline-light button-icon" id="toggleSidebar">☰</button>
			  </div>
			</nav>
			<!-- 🔹 Sidebar + Main -->

			<div class="wrapper">
			  	<div class="sidebar" id="sidebar" style="">
			    <h5 class=""><span>📋 </span>Menu</h5>
			    <a href="#">🏠 HOME</a>
			    <a href="#" class="dropdown-toggle" data-target="#userMenu">
			       📋 ALL BOOK<span class="float-end">▶</span>
			    </a>

			    <div class="submenu" id="userMenu">
			      <a href="#">Demo All 01</a>
			      <a href="#">Demo All 02</a>
			      <a href="#">Demo All 03</a>
			    </div>

			    <a href="#" class="dropdown-toggle" data-target="#productMenu">
			      🛍️ ALL PRODUCT <span class="float-end">▶</span>
			    </a>
			    <div class="submenu" id="productMenu">
			      <a href="#"> Pre Booking</a>
			      <a href="#"> Scientific Products</a>
			      <a href="#">Home Decor </a>
			      <a href="#"> Toys & Games </a>
			      <a href="#">Designer Merchandise </a>

			    </div>
				<a href="#">📊 FAQ</a>
				<a href="#">👥 CONTACT US</a>				
				<a href="#">⚙️ Terms & Conditions</a>


				</div>
			</div>
		</div>

			<div class="menu-new">
			     <ul>
			        <li>
    				<a href="{{ url('allbook') }}">
    					<img src="{{asset('images/m1.png')}}" alt="" class="menu-img" />
    					<span class="all_book">All Book</span>
    				</a>
    				</li>
    	            <li>
    				<a href="{{ url('allproduct') }}">
    					<img src="{{asset('images/m3.png')}}" alt="" class="menu-img" />
    					<span class=""> Product Pre Booking</span>
    				</a>
    				</li>
    	            <li>
    				<a href="{{ url('allOtherproduct/13') }}">
    					<img src="{{asset('images/m5.png')}}" alt="" class="menu-img" />
    					<span class="">Scientific Products</span>
    				</a>
    				</li>
    	            <li>
    				<a href="{{ url('allOtherproduct/11') }}">
    					<img src="{{asset('images/m4.png')}}" alt="" class="menu-img" />
    					<span class="">Home Decor</span>
    				</a>
    				</li>
    	            <li>
    				<a href="{{ url('allOtherproduct/12') }}">
    					<img src="{{asset('images/m2.png')}}" alt="" class="menu-img" />
    					<span class="">Toys & Games</span>
    				</a>
    				</li>
    	            <li>
    				<a href="{{ url('allOtherproduct/14') }}">
    					<img src="{{asset('images/m6.png')}}" alt="" class="menu-img" />
    					<span class="">Designer Merchandise</span>
    				</a>
    				</li>
				</ul>
			</div> 
	</div>


</div>



<!-- collapsed / Sidebar -->
<!--
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   -->
<script>
  // Sidebar toggle
  const toggleSidebar = document.getElementById('toggleSidebar');
  const sidebar = document.getElementById('sidebar');
  toggleSidebar.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');

  });

  // Dropdown submenu toggle
  document.querySelectorAll('.dropdown-toggle').forEach(item => {
    item.addEventListener('click', e => {
      e.preventDefault();
      const target = document.querySelector(item.getAttribute('data-target'));
      target.style.display = target.style.display === 'block' ? 'none' : 'block';
      const arrow = item.querySelector('span');
      arrow.classList.toggle('rotate');
    });
  });

</script>
