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
				</div>
			</div>
<input type="hidden" class="type" value="{{ $type }}">
    @php
    $item = ($type == 'book') ? $product : $otherproducts;
@endphp
      <!-- single-right-->
      @if($type=='book')
    <form method="post" class="cart_single">
		<div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h6>{{$product->title}}</h6>
            <h3>
          

@if($item && $item->subcategories->count() > 0)
        (
        @foreach($item->subcategories as $sub)
            {{ $sub->name }} ,
        @endforeach
  

@endif
    {{$product->authorData->author}})</h3>

            <div class="Available-in-price">
                <h4>
                    <img src="{{asset('images/star4.png')}}" class="img-review">
                    <a href="review.php"> 1 Reviews </a>
                </h4>
                <span class="item_price"  id="price"><b>₹</b> {{$product->discounted_price}}/-<del><b>₹</b>{{$product->price}}</del></span>
                <h5><span>{{$product->discount}}% </span>OFF</h5>
            </div>
            <div class="snipcart-details" style="">
                <p><strong> Quantity : </strong></p>
                <select class="size" name="quantity" id="" required="">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
            </div>
         <div class="snipcart-details agileinfo_single_right_details">
                <p> <strong>All details :</strong>    </p>
               @if($type === 'book')
                 <ul>
                <li><i class="fa-solid fa-check"></i> Author <span>: {{$product->authorData->author}}</span></li>
                     <li><i class="fa-solid fa-check"></i> Series Name <span>: {{$product->series}}</span></li>
                     <li><i class="fa-solid fa-check"></i> Language <span>: {{$product->language}}</span></li>
                     <li><i class="fa-solid fa-check"></i> Publisher <span>: {{$product->publisherData->name}}</span></li>
                     <li><i class="fa-solid fa-check"></i> Published on <span>:{{ \Carbon\Carbon::parse($product->published_on)->format('d-m-Y') }}</span></li>
                     <li><i class="fa-solid fa-check"></i> No. of Pages <span>: {{$product->no_of_pages}}</span></li>
                     <li><i class="fa-solid fa-check"></i> Binding <span>: {{$product->binding}}</span></li>
                     <li><i class="fa-solid fa-check"></i> Edition <span>: {{$product->edition}}</span></li>
                     <li><i class="fa-solid fa-check"></i> Illustrations<span>: {{$product->illustrations}}</span></li>
                     <li><i class="fa-solid fa-check"></i> ISBN <span>: {{$product->isbn}}</span></li>
                 </ul>
                 @endif
            </div>
            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
               <!--- <input type="submit" name="submit" value="Add to cart" class="button-submit" onclick="runMyFunction1();return true">-->


    <button class="add-to-cart" class="button-submit" data-id="{{ $product->product_id }}">
            Add to Cart
        </button>
         <a href="{{ route('cart.index') }}">View Cart bbbbbbbbbbbbbbbbb</a>
            </div>

 				</div>
			</form>	


            <!--Accordion - Description Specification Reviews-->
			<div class="col-md-12">
			    <div class="accordion-sub Description-Specification-Reviews ">
                    <button class="accordion">Description nnnnnnnnnnnnn</button>
                    <div class="panel" style="display:block;">
                     {!!$product->description!!}
                    </div>
                
                    <button class="accordion">Specification</button>
                    <div class="panel" style="display:block;">
                     {!! $product->specification !!}
                    </div>
                 
                </div>
			</div>
    @else
  <form method="post" class="cart_single">
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
            <h6>{{$otherproducts->title}}</h6>
            <h3>          
      
@if($item && $item->subcategories->count() > 0)
        (
        @foreach($item->subcategories as $sub)
            {{ $sub->name }} ,
        @endforeach
  

@endif )</h3>

            <div class="Available-in-price">
                <h4>
                    <img src="{{asset('images/star4.png')}}" class="img-review">
                    <a href="review.php"> 1 Reviews </a>
                </h4>
                <span class="item_price"  id="price"><b>₹</b> {{$otherproducts->discounted_price}}/-<del><b>₹</b>{{$otherproducts->price}}</del></span>
                <h5><span>{{$otherproducts->discount}}% </span>OFF</h5>
            </div>
            <div class="snipcart-details" style="">
                <p><strong> Quantity : </strong></p>
                <select class="size" name="quantity" id="" required="">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
            </div>
         <div class="snipcart-details agileinfo_single_right_details">
                <p> <strong>All details :</strong>    </p>
             
                 <ul>
                     @foreach($otherspecifications as $speci) 
            <li><i class="fa-solid fa-check"></i> {{$speci->label_name}}<span>: {{$speci->lable_value}}</span></li>
                @endforeach    
                 </ul>
            </div>
            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
               <!--- <input type="submit" name="submit" value="Add to cart" class="button-submit" onclick="runMyFunction1();return true">-->
            
    <button class="add-to-cart" class="button-submit" data-id="{{ $otherproducts->product_id }}">
            Add to Cart
        </button>
         <a href="{{ route('cart.index') }}">View Cart abc</a>
            </div>

                </div>
            </form> 


            <!--Accordion - Description Specification Reviews-->
            <div class="col-md-12">
                <div class="accordion-sub Description-Specification-Reviews ">
                    <button class="accordion">Description hhhhhhhhhhhh</button>
                    <div class="panel" style="display:block;">
                     {!!$otherproducts->description!!}
                    </div>
                
                    <button class="accordion">Specification</button>
                    <div class="panel" style="display:block;">
                     {!! $otherproducts->specification !!}
                    </div>
                 
                </div>
            </div>

    @endif

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
                        <i class="fa fa-bag-shopping"></i> Add to Bag andd
                    </a>
                </div> 
            </div>   
            @endforeach
            <!----
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Trending2.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Podipisir Bormi Baksho</h3>
                    <h4><b>WRITER :</b> Saikat Mukhopadhyay </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Trending3.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Podipisir Bormi Baksho</h3>
                    <h4><b>WRITER :</b> L.Majumdar </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Trending4.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Nastik Panditer Bhita</h3>
                    <h4><b>WRITER :</b> A.Dipankar </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Trending2.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Podipisir Bormi Baksho</h3>
                    <h4><b>WRITER :</b> Saikat Mukhopadhyay </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Trending3.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Podipisir Bormi Baksho</h3>
                    <h4><b>WRITER :</b> L.Majumdar </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Trending4.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Nastik Panditer Bhita</h3>
                    <h4><b>WRITER :</b> A.Dipankar </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>
            -->
        </div>
    </div>     
</div>
<!-- //  Top Trending -->

@endsection