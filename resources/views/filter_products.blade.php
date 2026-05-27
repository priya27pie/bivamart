@forelse($products as $data)

<div class="book-box">

    <div class="book-img">

        @if($data->images && $data->images->count())

            <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">

        @else

            <img src="{{ asset('uploads/no-image.png') }}" alt="">

        @endif

        <h6>{{ $data->discount }}% OFF</h6>

    </div>

    <h3>{{ $data->title }}</h3>

    <h4>
        <b>WRITER :</b>
       {{ $data->authorData->author ?? 'N/A' }}
    </h4>

    <h5>
        <b>₹</b> {{ $data->discounted_price }}/-
    </h5>
  <a href="{{ url('single/book/'.$data->id.'/'.$data->product_id) }}">
    <i class="fa fa-bag-shopping"></i> Add to Bag
</a>
</div>

@empty

<h2>No Product Found</h2>

@endforelse