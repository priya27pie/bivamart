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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
.header-top .book_search form .search-container{
    position: relative;
}

.search-box{
    position:absolute;
    top:100%;
    left:0;
    width:100%;
    background:#fff;
    border:1px solid #ddd;
    box-shadow:0 4px 15px rgba(0,0,0,.2);
    z-index:999999;
    display:none;
    max-height:350px;
    overflow-y:auto;
}
.search-item{
    display:flex;
    align-items:center;
    gap:10px;
    padding:10px;
    border-bottom:1px solid #eee;
}

.search-item img{
    width:55px;
    height:70px;
    object-fit:cover;
    flex-shrink:0;
}

.search-item > div{
    display:flex;
    flex-direction:column;
}

.search-item small{
    color:#666;
}

.search-item:hover{
    background:#f5f5f5;
}

.search-box a{
    text-decoration:none;
    color:#333;
    display:block;
}

</style>
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
						<form method="get">  
							<div class="select-container">
						 <select id="category_search" name="category_search"  class="drop">
									<option value="null">All</option>
							@foreach($categories as $category)

								<option value="{{$category->id}}">{{$category->category}}</option>  
								@endforeach
					</select>
						    </div>
						    <div class="search-container">
						    	<input type="text" id="search" placeholder="Search books by title, author and ISBN" name="search">
						    
						 <button type="button" id="searchBtn"> <i class="fa fa-search"></i></button>
								<div id="searchResult" class="search-box"></div>

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
								<li><a href="{{ url('wallet') }}"><i class="fa-solid fa-indian-rupee-sign"></i> My Wallet</a></li>
								<li><a href="{{ url('allorders') }}"><i class="fa-solid fa-book"></i> All Orders</a></li>
								<li><a href="{{ url('wishlist') }}"><i class="fa-solid fa-heart"></i> Wishlist</a></li>
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
			    <a href="{{ url('index') }}">🏠 HOME</a>
			    <a href="#" class="dropdown-toggle" data-target="#userMenu">
			       📋 ALL Product<span class="float-end">▶</span>
			    </a>
			  <div class="submenu" id="userMenu">

@foreach($categories as $category)

    <a href="#" class="dropdown-toggle" data-target="#category{{$category->id}}">
        📋 {{ $category->category }}
        <span class="float-end">▶</span>
    </a>

    <div class="submenu" id="category{{$category->id}}" style="display:none; padding-left:20px;">

        @foreach($category->subcategories as $subcategory)
        		@if($category->category == 'Books')
            <a href="{{ url('allproduct?subcategory[]='.$subcategory->id) }}">
                {{ $subcategory->name }}
            </a>
            @else
  				
<a href="{{ route('allOtherproduct', ['category' => $category->id,'subcategory' => [$subcategory->id]
]) }}">
    {{ $subcategory->name }}
</a>
            @endif

        @endforeach

    </div>

@endforeach

</div>
			    
				<a href="{{url('faq')}}">📊 FAQ</a>
				<a href="{{url('contact')}}">👥 CONTACT US</a>				
				<a href="{{url('termsconditions')}}">⚙️ Terms & Conditions</a>


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
    				
			    <a href="{{ route('allOtherproduct', ['category' => 13]) }}">
			    <img src="{{ asset('images/m5.png') }}" alt="" class="menu-img" />
			    <span>Scientific Products</span>
			</a>
    				</li>
    	            <li>

			    <a href="{{ route('allOtherproduct', ['category' => 11]) }}">
			    <img src="{{ asset('images/m4.png') }}" alt="" class="menu-img" />
			    <span>Home Decor</span>
			</a>        	
    			
    				</li>
    	     <li>
	    	     <a href="{{ route('allOtherproduct', ['category' => 12]) }}">
				    <img src="{{ asset('images/m2.png') }}" alt="" class="menu-img" />
				    <span>Toys & Games</span>
						</a>            	
    			
    				</li>
    	      <li>
    				
    				  <a href="{{ route('allOtherproduct', ['category' => 14]) }}">
				    <img src="{{ asset('images/m6.png') }}" alt="" class="menu-img" />
				    <span>Designer Merchandise</span>
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

$("#search").keyup(function () {

    let search = $(this).val();

console.log("URL:", "{{ route('search-products.ajax') }}");


    $.ajax({
        url: "{{ route('search-products.ajax') }}",
        type: "GET",
        data: {
            search: search
        },
        beforeSend: function () {
            console.log("AJAX Started");
        },
success: function(res){
	  
    console.log("SUCCESS");
    console.log(res);

    try{

        let html = '';

        $.each(res, function(i, item){

         //   console.log(item);
//console.log(item.images);

            let image = '/bivamart/public/uploads/no-image.png';

            if(item.images && item.images.length > 0){
                image = '/bivamart/public/uploads/' + item.images[0].images;
            }

            let url = item.type == 'book'
                ? 'single/book/' + item.id+'/'+item.product_id
                : 'single/other/'+ item.id+'/'+ item.product_id;

            let title = item.type == 'book' ? item.title : item.name;

            let author = '';

            if(item.author_data){
                author = item.author_data.author;
            }

            html += `
            <a href="${url}">
                <div class="search-item">
                    <img src="${image}" width="55">
                    <div>
                        <div>${item.title}</div>
                        <small>${author}</small>
                    </div>
                </div>
            </a>`;
        });

  if(html !== ''){
        $("#searchResult").html(html).show();
    } else {
        $("#searchResult").hide().html('');
    }
    }catch(e){
        console.error("JS Error:", e);
    }
},
        error: function(xhr){
    console.log(xhr.responseJSON);
    console.log(xhr.responseText);
}
    });

});

$("#searchBtn").on("click", function () {

let search = $("#search").val().trim();
let category = $("#category_search").val();

if (search === "") {
    return;
}
let url;
// Category ID 2 = Book
if (category == "2") {
    url = "{{ route('allproduct') }}";
} else {
    url = "{{ route('allOtherproduct') }}";
}

url += "?search=" + encodeURIComponent(search);

if (category) {
    url += "&category=" + encodeURIComponent(category);
}

window.location.href = url;
});

$("#search").on("keypress", function(e){
    if(e.which == 13){
        e.preventDefault();
        $("#searchBtn").click();
    }
});
</script>
