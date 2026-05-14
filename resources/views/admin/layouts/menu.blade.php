		<div class="sidebar">
			<!--
				Tip 1: You can change the background color of the sidebar using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
				Tip 2: you can also add an image using data-image attribute
			-->
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="photo">
							<img src="assets/img/profile.jpg" alt="image profile">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php //$_SESSION['login_user']?>
									<span class="user-level">ADMINISTRATOR</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
							<div class="collapse in " id="collapseExample">
								<ul class="nav">
									<li <?php if (stripos($_SERVER['REQUEST_URI'],'add_about.php')!== false || stripos($_SERVER['REQUEST_URI'],'profile.php')!== false) echo "active";?>>
										<a href="profile.php">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
								
									
								</ul>
							</div>
						</div>
					</div>
						<ul class="nav">
						<li class="nav-item <?php if (stripos($_SERVER['REQUEST_URI'],'dashboard.php')!== false) echo "active";?>">
						<a href="{{ url('admin/dashboard') }}">
						<i class="flaticon-home"></i>
						<p>Dashboard</p>
						<span class="badge badge-count">5</span>
						</a>
						</li>
						<li class="nav-section">
						<span class="sidebar-mini-icon">
						<i class="la la-ellipsis-h"></i>
						</span>
						<h4 class="text-section">Products Management</h4>
						</li>
       
   
   		<li class="nav-item {{ request()->is('admin/homepage') || request()->is('admin/bookpage')  ? 'active' : '' }}">
						<a data-toggle="collapse" href="#home">
						<i class="flaticon-file-1"></i>
						<p> Settings</p>
						<span class="caret"></span>
						</a>
                       <div class="collapse {{ request()->is('admin/homepage') || request()->is('admin/bookpage')  ? 'show' : '' }}" id="home">
			         <ul class="nav nav-collapse active">
						
						<li>
						<a href="{{ url('admin/homepage') }}">
						<span class="sub-item">Homepage</span>
						</a>
						</li>
						<li>
						<a href="{{ url('admin/bookpage') }}">
						<span class="sub-item"> Bookpage</span>
						</a>
						</li>	
							<li>
						<a href="{{ url('admin/shipping') }}">
						<span class="sub-item"> Delivery Charges</span>
						</a>
						</li>	
						</ul>
					</div>
				</li>       
   		<li class="nav-item {{ request()->is('admin/addslider') || request()->is('admin/allbanner') || request()->is('admin/showbanner/*') ? 'active' : '' }}">
						<a data-toggle="collapse" href="#slider">
						<i class="flaticon-file-1"></i>
						<p> Banner Mgmnt</p>
						<span class="caret"></span>
						</a>
                       <div class="collapse {{ request()->is('admin/addslider') || request()->is('admin/allbanner') || request()->is('admin/showbanner/*') ? 'show' : '' }}" id="slider">
			         <ul class="nav nav-collapse active">
						
						<li>
						<a href="{{ url('admin/addslider') }}">
						<span class="sub-item">Add Banner</span>
						</a>
						</li>
						<li>
						<a href="{{ url('admin/allbanner') }}">
						<span class="sub-item">All Banner</span>
						</a>
						</li>
						</ul>
					</div>
				</li>
				             
		<li class="nav-item {{ request()->is('admin/addlanguage') ? 'active' : '' }}">
						<a data-toggle="collapse" href="#language">
						<i class="flaticon-file-1"></i>
						<p> Language Mgmnt</p>
						<span class="caret"></span>
						</a>
                       <div class="collapse {{ request()->is('admin/addlanguage') ? 'show' : '' }}" id="language">
			         <ul class="nav nav-collapse active">
						
						<li>
						<a href="{{ url('admin/addlanguage') }}">
						<span class="sub-item">Add Language</span>
						</a>
						</li>
					
						</ul>
					</div>
				</li>
				
       	<li class="nav-item  <?php if (stripos($_SERVER['REQUEST_URI'],'addauthor')!== false || stripos($_SERVER['REQUEST_URI'],'allauthor')!== false  || stripos($_SERVER['REQUEST_URI'],'showauthor')!== false) echo "active";?>">
						<a data-toggle="collapse" href="#auth">
						<i class="flaticon-file-1"></i>
						<p> Author Mgmnt</p>
						<span class="caret"></span>
						</a>
                        <div class="collapse <?php if (stripos($_SERVER['REQUEST_URI'],'addauthor')!== false || stripos($_SERVER['REQUEST_URI'],'showauthor')!== false || stripos($_SERVER['REQUEST_URI'],'allauthor')!== false  || stripos($_SERVER['REQUEST_URI'],'showauthor')!== false) echo " show";?>" id="auth">
			         <ul class="nav nav-collapse active">
						<li>
						<a href="{{ url('admin/addauthor') }}">
						<span class="sub-item">Add Author</span>
						</a>
						</li>
						
						<li>
						<a href="{{ url('admin/allauthor') }}">
						<span class="sub-item">All Author</span>
						</a>
						</li>
						
						
					 
						</ul>
						</div>
						</li>
<li class="nav-item  <?php if (stripos($_SERVER['REQUEST_URI'],'addpublisher')!== false || stripos($_SERVER['REQUEST_URI'],'addpublisher')!== false  || stripos($_SERVER['REQUEST_URI'],'addpublisher')!== false || stripos($_SERVER['REQUEST_URI'],'showpublisher')!== false) echo "active";?>">
						<a data-toggle="collapse" href="#publisher">
						<i class="flaticon-file-1"></i>
						<p> Publisher Mgmnt</p>
						<span class="caret"></span>
						</a>
                        <div class="collapse <?php if (stripos($_SERVER['REQUEST_URI'],'addpublisher')!== false || stripos($_SERVER['REQUEST_URI'],'allpublisher')!== false || stripos($_SERVER['REQUEST_URI'],'allpublisher')!== false  || stripos($_SERVER['REQUEST_URI'],'allpublisher')!== false  || stripos($_SERVER['REQUEST_URI'],'showpublisher')!== false) echo " show";?>" id="publisher">
			         <ul class="nav nav-collapse active">
						<li>
						<a href="{{ url('admin/addpublisher') }}">
						<span class="sub-item">Add Publisher</span>
						</a>
						</li>
						
						<li>
						<a href="{{ url('admin/allpublisher') }}">
						<span class="sub-item">All Publisher</span>
						</a>
						</li>
						
						
					 
						</ul>
						</div>
						</li>	

			<li class="nav-item {{ request()->is('admin/addbrand') || request()->is('admin/allbrand') || request()->is('admin/showbrand/*')? 'active' : '' }}">
						<a data-toggle="collapse" href="#Brand">
						<i class="flaticon-file-1"></i>
						<p> Brand Mgmnt</p>
						<span class="caret"></span>
						</a>
                       <div class="collapse {{ request()->is('admin/addbrand') || request()->is('admin/allbrand') || request()->is('admin/showbrand/*') ? 'show' : '' }}" id="Brand">
			         <ul class="nav nav-collapse active">
						
						<li>
						<a href="{{ url('admin/addbrand') }}">
						<span class="sub-item">Add Brand</span>
						</a>
						</li>
					<li>
						<a href="{{ url('admin/allbrand') }}">
						<span class="sub-item">All Brand</span>
						</a>
						</li>
						</ul>
					</div>
				</li>								            
    <li class="nav-item  <?php if (stripos($_SERVER['REQUEST_URI'],'addcategory')!== false || stripos($_SERVER['REQUEST_URI'],'add_sub_category')!== false )  echo "active";?>">
						<a data-toggle="collapse" href="#category">
						<i class="flaticon-file-1"></i>
						<p> Category Mgmnt</p>
						<span class="caret"></span>
						</a>
                        <div class="collapse <?php if (stripos($_SERVER['REQUEST_URI'],'addcategory')!== false || stripos($_SERVER['REQUEST_URI'],'add_sub_category')!== false ) echo " show";?>" id="category">
			         <ul class="nav nav-collapse active">
					<li>
						<a href="{{ url('admin/addcategory') }}">
						<span class="sub-item">Add Category</span>
						</a>
						</li>
						
						<li>
						<a href="{{ url('admin/add_sub_category') }}">
						<span class="sub-item">Add Sub Category</span>
						</a>
						</li>
						
						
					 
						</ul>
						</div>
						</li>	 

<li class="nav-item {{ request()->is('admin/addseries') || request()->is('admin/allseries') || request()->is('admin/showseries/*')? 'active' : '' }}">
						<a data-toggle="collapse" href="#series">
						<i class="flaticon-file-1"></i>
						<p> Series Mgmnt</p>
						<span class="caret"></span>
						</a>
                       <div class="collapse {{ request()->is('admin/addseries') || request()->is('admin/allseries') || request()->is('admin/showseries/*') ? 'show' : '' }}" id="series">
			         <ul class="nav nav-collapse active">
						
						<li>
						<a href="{{ url('admin/addseries') }}">
						<span class="sub-item">Add Series</span>
						</a>
						</li>
					<li>
						<a href="{{ url('admin/allseries') }}">
						<span class="sub-item">All Series</span>
						</a>
						</li>
						</ul>
					</div>
				</li>

        	<li class="nav-item {{ request()->is('admin/addproduct') || request()->is('admin/allproduct') || request()->is('admin/showproduct/*') ? 'active' : '' }}">
						<a data-toggle="collapse" href="#pro">
						<i class="flaticon-file-1"></i>
						<p> Product Mgmnt(Books)</p>
						<span class="caret"></span>
						</a>
                       <div class="collapse {{ request()->is('admin/addproduct') || request()->is('admin/allproduct') || request()->is('admin/showproduct/*') ? 'show' : '' }}" id="pro">
			         <ul class="nav nav-collapse active">
						
						<li>
						<a href="{{ url('admin/addproduct') }}">
						<span class="sub-item">Add Product</span>
						</a>
						</li>
						
						<li>
						<a href="{{ url('admin/allproduct') }}">
						<span class="sub-item">All Product</span>
						</a>
						</li>
						</ul>
					</div>
				</li>

<li class="nav-item {{ request()->is('admin/addproduct_other') || request()->is('admin/allproduct_other') || request()->is('admin/showproduct_other/*') ? 'active' : '' }}">
						<a data-toggle="collapse" href="#nonbook">
						<i class="flaticon-file-1"></i>
						<p> Product Mgmnt(Non-Books)</p>
						<span class="caret"></span>
						</a>
                   
   <div class="collapse {{ request()->is('admin/addproduct_other') || request()->is('admin/allproduct_other') || request()->is('admin/showproduct_other/*') ? 'show' : '' }}" id="nonbook">        	
			         <ul class="nav nav-collapse active">
						
						<li>
						<a href="{{ url('admin/addproduct_other') }}">
						<span class="sub-item">Add Product</span>
						</a>
						</li>
						
						<li>
						<a href="{{ url('admin/allproduct_other') }}">
						<span class="sub-item">All Product</span>
						</a>
						</li>					 
						</ul>
						</div>
						</li>

				<li class="nav-item {{ request()->is('admin/alluser') ? 'active' : '' }}">
						<a data-toggle="collapse" href="#user">
						<i class="flaticon-file-1"></i>
						<p> User Management</p>
						<span class="caret"></span>
						</a>
                   
   <div class="collapse {{ request()->is('admin/alluser') ? 'show' : '' }}" id="user">        	
			         <ul class="nav nav-collapse active">
						
						<li>
						<a href="{{ url('admin/alluser') }}">
						<span class="sub-item">All Users</span>
						</a>
						</li>
						
										 
						</ul>
						</div>
						</li>

<li class="nav-item {{ request()->is('admin/addfeedback') || request()->is('admin/allfeedback') || request()->is('admin/showbrand/*')? 'active' : '' }}">
						<a data-toggle="collapse" href="#Feedback">
						<i class="flaticon-file-1"></i>
						<p> Feedback Mgmnt</p>
						<span class="caret"></span>
						</a>
                       <div class="collapse {{ request()->is('admin/addfeedback') || request()->is('admin/allfeedback') || request()->is('admin/showbrand/*') ? 'show' : '' }}" id="Feedback">
			         <ul class="nav nav-collapse active">
						
						<li>
						<a href="{{ url('admin/addfeedback') }}">
						<span class="sub-item">Add Feedback</span>
						</a>
						</li>
					<li>
						<a href="{{ url('admin/allfeedback') }}">
						<span class="sub-item">All Feedback</span>
						</a>
						</li>
						</ul>
					</div>
				</li>			

</ul>

				</div>
			</div>
		</div>