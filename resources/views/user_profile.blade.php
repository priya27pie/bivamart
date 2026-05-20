@extends('layouts.main')
@section('middle')


<div class="col-md-3">
	<div class="side-bar-two">
		<div class="col-md-3 col-sm-4 col-xs-4" style="padding: 0;">
		 <i class="fa fa-user" aria-hidden="true"></i>
		</div>
		<div class="col-md-7 col-sm-8 col-xs-8">
			<p>Hello,</p>
			<h4 style="font-size: 13px;">Raaj Majumdar</h4>
		</div>
		<div class="clearfix"></div>
	</div>	
	
	<div class="category">
	<ul>
			<li><a href="{{ url('profile') }}"><i class="fa-solid fa-book"></i> My Account</a></li>
			<li><a href="{{ url('orders') }}"><i class="fa-solid fa-book"></i> Open Orders</a></li>
			<li><a href="{{ url('order_details') }}"><i class="fa-solid fa-book"></i>  Orders Details</a></li>			
			<li><a href="{{ url('logout') }}"><i class="fa-solid fa-book"></i> Logout</a></li>
			
		</ul>
	</div>
	</div>


@endsection