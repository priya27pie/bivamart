@extends('layouts.main')
@section('middle')

<div class="inner-profile">
  <img src="{{asset('images/profile-banner.png')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">Wish  <i class="fa-regular fa-heart"></i>  list</p>
   <div class="particle-network-animation"></div>
</div>



<!--  New Arrival   -->
<div class="Top-Trending Best-Sellers New-Arrival Wish-block" style="">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2 style="">Wish  <i class="fa-regular fa-heart"></i>  list <span style="">bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div class="row">
            @foreach($wishlists as $wishlist)
         @if($wishlist->item)       
			<div class="col-md-2 col-sm-4 col-xs-12">
        <a href="single/{{$wishlist->item->type}}/{{$wishlist->item->id}}/{{$wishlist->item->product_id}}">
          
                <div class="trending-box">
                    <div class="trending-img">
                 @if($wishlist->item->images && $wishlist->item->images->count())
                    <img src="{{ asset('uploads/'.$wishlist->item->images->first()->images) }}" alt="">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif    
                 @if($wishlist->special_tag!='')          
                        <div class="ps-product__badge" style="background-color: {{$data->tagcolor}} !important">{{$data->special_tag}}</div>     
                    @endif

                    <h6> {{$wishlist->item->discount }}% OFF</h6>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <h3>{{ $wishlist->item->title }}</h3>
                    @if($wishlist->item->authorData)
                    <h4><b>WRITER :</b> {{ $wishlist->item->authorData->author }}</h4>
                    @else
                     <h4></h4>
                    @endif

                    <h5><b>₹ </b> {{$wishlist->item->discounted_price}}/- <del>{{$wishlist->item->price}}</del></h5>
                    </a>
@if($wishlist->item->stock > 0)                
 <button type="button" class="add-to-cart-btn"  data-type="{{$wishlist->item->type}}" data-id="{{ $wishlist->item->product_id }}">
        <i class="fa fa-bag-shopping" ></i> Add to Bag
    </button>    
   @else
              
    <button class="add-to-cart button-submit" disabled>
        Out of Stock
    </button>
    @endif      


                </div> 
            </div>
               @endif
            @endforeach

      

        </div>
    </div>     
</div>

@endsection