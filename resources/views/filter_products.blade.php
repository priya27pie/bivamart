@forelse($products as $data)

<div class="book-box">
    <a href="{{ url('single/book/'.$data->id.'/'.$data->product_id) }}"  class="single_class"> 
    <div class="book-img">
        @if($data->images && $data->images->count())
        <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
        @else
        <img src="{{ asset('uploads/no-image.png') }}" alt="">
        @endif
        @if($data->special_tag!='')          
        <div class="ps-product__badge" style="background-color: {{$data->tagcolor}} !important">{{$data->special_tag}}</div>     
        @endif
        <h6>{{ $data->discount }}% OFF</h6>
    </div>
    </a>
    <h3>{{ $data->title }}</h3>
    <h4>
        <b>WRITER :</b>
       {{ $data->authorData->author ?? 'N/A' }}
    </h4>
    <h5><b>₹ </b> {{$data->discounted_price}}/- <del><b>₹ </b> {{$data->price}}</del></h5>

  


 @if($data->stock > 0)   
 <button type="button" class="add-to-cart-btn"  data-type="book" data-id="{{ $data->product_id }}">
        <i class="fa fa-bag-shopping" ></i> Add to Bag
    </button>
     @else
              
    <button class="add-to-cart button-submit OutofStock" disabled>
        Out of Stock
    </button>
    @endif
</div>

@empty

<h2>No Product Found</h2>

@endforelse
