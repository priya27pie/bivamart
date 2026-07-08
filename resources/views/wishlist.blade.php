@extends('layouts.main')
@section('middle')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).on('click', '.add-to-cart-btn', function(e) {
    e.preventDefault();

    let productId = $(this).data('id');
    let type = $(this).data('type');
    let wishlist='wishlist';
//alert(productId);
    let url = "{{ route('cart.add.ajax', ':id') }}";
    url = url.replace(':id', productId);

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            quantity: 1,
            type: type,
            wishlist:wishlist
        },
        success: function(response) {
           //     alert("Success");
            alert(response.message);
            $('#cart-count').text(response.cart_count);
             location.reload();
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
});
</script>
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
        @forelse($wishlists as $wishlist)    
         @if($wishlist->item)       
		<div class="col-md-2 col-sm-4 col-xs-12">
          
                <div class="trending-box">
                    <a href="single/{{$wishlist->item->type}}/{{$wishlist->item->id}}/{{$wishlist->item->product_id}}" class="single_class">  

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
              
    <button class="add-to-cart button-submit OutofStock" disabled>
        Out of Stock
    </button>
    @endif      


                </div> 
            </div>
    @endif

    @empty
        <div class="col-12 text-center">
            <h4>No Wishlisted items found</h4>
        </div>
    @endforelse

      

        </div>
    </div>     
</div>

@endsection