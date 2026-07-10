@extends('layouts.main')
@section('middle')


<div class="given-reviews">	 
	<div class="container">	
            <!-- tittle heading -->
        <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
            <h2>Share your Reviews<span> Review</span></h2>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="Writereviewsgiven">
                <h6>Share your views with other customers..</h6>
                <a href="{{ url('given-reviews') }}" onclick="check_login('UElENTUx')">Write a Review</a>
                <div class="reviewsProduct">
                    <img src="{{ asset('images/Pre-Order3.png')}}" alt="reviews-man">
                    <h2>TEEN TIRIKKE BHOY</h2>
                    <h3><span> <b>02</b> Reviews </span><img src="{{asset('images/star4.png')}}" class="img-review"></h3>
                </div> 
            </div>            
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12">   
            <div class="all-reviews" style="width:100%;">
                <div class="all-reviews-show">
                    <div class="lt-box-icon">
                        <img src="{{asset('images/Reviewsuser01.png')}}" alt="reviews-man">
                    </div>
                    
                    <div class="lt-box-text">
                        <h4>Priyanka das</h4>
                        <li><img src="{{asset('images/star4.png')}}"></li>
                        <p>Some of the plants were not upto the mark</p>
                    </div>                              
                </div>
                <div class="all-reviews-show">
                    <div class="lt-box-icon">
                        <img src="{{asset('images/Reviewsuser01.png')}}" alt="reviews-man">
                    </div>
                    
                    <div class="lt-box-text">
                        <h4>Raaj Majumdar</h4>
                        <li><img src="{{asset('images/star3.png')}}"></li>
                        <p>Ok kind of products</p>
                    </div>                              
                </div>
        

        </div>
        </div>		

        
	</div>
</div>

@endsection