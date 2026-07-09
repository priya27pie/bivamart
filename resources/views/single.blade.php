@extends('layouts.main')
@section('middle')

<style>
.alert { padding: 20px; background-color: #f44336; color: white; opacity: 1; transition: opacity 0.6s; margin-bottom: 15px; }
.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}
.closebtn { margin-left: 15px; color: white; font-weight: bold; float: right; font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s; }
.closebtn:hover { color: black;}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Product Wishlisted!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
<script>
    $(document).ready(function() {
$(document).on('click', '.add-to-cart', function(e){
    e.preventDefault();

    let id = $(this).data('id');
let qty = $('.size').val();
let type = $('.type').val();
//alert(type);
   // alert(qty);
    $.ajax({
        url: '{{ url("add-to-cart") }}/'+ id,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            quantity: qty,
            type:type
        },
        success: function(response){
            if(response.status === 'success'){
                
                // update cart count
             if(response.cart_count > 0){
    $('#cart-count').text(response.cart_count).show();
          $('#viewcart').show();
          $('#addcart').hide();

} else {
    $('#cart-count').hide();
  
}

                alert(response.message); // you can replace with toast
            }
        },
        error: function(xhr){
    console.log("STATUS:", xhr.status);
    console.log("RESPONSE:", xhr.responseText);
   // alert("Check console");
}
    });
});
});
</script>
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits">

		<div class="container">
	   <!-- single-right-left-->
			<div class="col-md-5 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides">
                @foreach($product_images as $img)
              <li data-thumb="{{ asset('uploads/'.$img->images)}}">
                <div class="thumb-image">
                  <img src="{{ asset('uploads/'.$img->images)}}" data-imagezoom="true" class="img-single">
                </div>
              </li>
                  @endforeach
              </ul>
						<div class="clearfix"></div>
					</div>
         @if($product->stock==0)
          <img src="{{asset('images/soldout-IMG.png')}}" class="img-soldout">
          @endif
				</div>
			</div>
      <input type="hidden" class="type" value="{{ $type }}">
          @php
          $item = $product;
      @endphp
      <!-- single-right-->
 <form method="post" class="cart_single">

    <div class="col-md-7 single-right-left simpleCart_shelfItem">

        <h6>{{ $product->title }}</h6>

        <h3>
            @if($product->subcategories->count())
                (
                @foreach($product->subcategories as $sub)
                    {{ $sub->name }},
                @endforeach
                )
            @endif

            @if($type == 'book')
                {{ $product->authorData->author ?? '' }}
            @endif
        </h3>

        <div class="Available-in-price">
             <h4>
                    <img src="{{ asset('images/star4.png')}}" class="img-review">
                    <a href="review.php"> 1 Reviews </a>
                </h4>
            <span class="item_price">
                <b>₹</b> {{ $product->discounted_price }}/-
                <del><b>₹</b> {{ $product->price }}</del>
            </span>

            <h5>
                <span>{{ $product->discount }}%</span> OFF
            </h5>
        </div>

        <div class="snipcart-details">
            <p>
                <strong>Quantity :</strong>

                <select class="size" name="quantity">
                    @for($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </p>
        </div>

        <div class="snipcart-details agileinfo_single_right_details">
            <p><strong>All details :</strong></p>

            @if($type == 'book')

                <ul>
                    <li>Author: {{ $product->authorData->author }}</li>
                    <li>Publisher: {{ $product->publisherData->name }}</li>
                    <li>ISBN: {{ $product->isbn }}</li>
                </ul>

            @else

                <ul>
                    @foreach($otherspecifications as $spec)
                        <li>
                            {{ $spec->label_name }}:
                            {{ $spec->lable_value }}
                        </li>
                    @endforeach
                </ul>

            @endif
        </div>

        <div class="snipcart-details top_brand_home_details">

            @if($product->stock > 0)

                <button
                    class="add-to-cart button-submit"
                    data-id="{{ $product->product_id }}">
                    Add to Cart
                </button>

                <a href="{{ route('wishlist.add', $product->product_id) }}"
                   class="viewcart-single" style="border:3px solid #00dd61;background:#05b954;">
                    <i class="fa-solid fa-heart"></i> Wishlist
                </a>

            @else
              
                <button class="add-to-cart button-submit OutofStock" disabled>
                    Out of Stock
                </button>

            @endif

        </div>

    </div>

</form>

            <!--Accordion - Description Specification Reviews-->
            <div class="col-md-12">
                <div class="accordion-sub Description-Specification-Reviews ">
                    <button class="accordion">Description </button>
                    <div class="panel" style="display:block;">
                     {!!$product->description!!}
                    </div>
                
                    <button class="accordion">Specification</button>
                    <div class="panel" style="display:block;">
                     {!! $product->specification !!}
                    </div>
                 
                </div>
            </div>


		</div>
	</div>
	<!-- //Single Page -->

    
    
    
    
    
<!--  Top Trending -->
<div class="Top-Trending" style="background: url(images/ser-bg.jpg) repeat;">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2>Top Selling <span>bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div id="trending-slider" class="owl-carousel">
     @foreach($show_trending as $data)
            <div class="item">
                <a href="#" class="single_class"> 
                <div class="trending-box">
                    <div class="trending-img">
                          @if($data->images && $data->images->count())
                    <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif
                        <h6>{{$data->discount}} % OFF</h6>
                    </div>
                    <h3>{{$data->title}}</h3>
                    <h4><b>WRITER :</b> {{ $data->authorData?->author }}</h4>
                    <h5><b>₹ </b> {{$data->discounted_price}}/- <del><b>₹ </b> {{$data->price}}</del></h5>
                    <a href="{{ url('single/'.$type.'/'.$data->id.'/'.$data->product_id) }}">
                        <i class="fa fa-bag-shopping"></i> Add to Bag 
                    </a>
                    <button type="button" class="add-to-cart-btn"  data-type="book" data-id="">
                        <i class="fa fa-bag-shopping" ></i> Add to Bag
                    </button>    
                    <button class="add-to-cart button-submit OutofStock" disabled>
                        Out of Stock
                    </button>
                </div> 
                </a>
            </div>   
            @endforeach
           
        </div>
    </div>     
</div>
<!-- //  Top Trending -->

@endsection