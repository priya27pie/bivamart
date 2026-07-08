@extends('layouts.main')
@section('middle')




<div class="inner-banner" style="height: 260px;">
  <img src="{{asset('images/product-inner.jpg')}}" alt="" class="inner-banner-img" style="margin: -20px 0 0 0;">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">All Product</p>
   <div class="particle-network-animation"></div>
</div>



<!-- Inner-Product -->
<div class="product-on">
    <!-- tittle heading -->
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Product<span> bivamart.com</span></h2>
    </div> 

<!---------------------------- All Filter ---------------------------->
        <div class="filter-left">
            <form action="{{ url('allproduct') }}" method="GET" id="filterForm">
                <!--Relevance-->
                <div class="Sort-By">
                    <label> Sort By : </label>
                    <select class="drop" name="sort" style="">
                        <option value="">~ Relevance ~ </option>
                        <option value="trending">Best Seller</option>                        
                        <option value="low_to_high">Price: Low to High</option>
                        <option value="high_to_low">Price: High to Low</option>
                        <option value="newest_to_oldest">Newest to Oldest</option>
                        <option value="oldest_to_newest">Oldest to Newest</option>                        
                        <option value="discount_highlow"> Discount : High to Low</option> 
                        <option value="discount_lowhigh"> Discount : Low to High</option>                        
                    </select>
                </div>
                
                
               
                <!--Category Sub-->
                <div class="Category-sub">
                    <div class="accordion-sub">
                        <button class="accordion">Category Sub <span class="caret"></span></button>
                        <div class="panel" style="">
                            <ul>
                                  @foreach($subcategories as $data)   
    <li><input id="subcategory{{$data->id}}" name="subcategory[]" class="Categorysub common_selector1"  type="checkbox" value="{{$data->id}}" {{ in_array($data->id, request()->subcategory ?? []) ? 'checked' : '' }}>
    <label for="subcategory{{$data->id}}" class="categories_filer_box" > {{$data->name}}</label>
    </li>
                                 @endforeach
                                 <!---
                                <li><input id="General And Literary Fiction" name="Category[]" class="Categorysub common_selector1" type="checkbox" value=" General And Literary Fiction ">
                                    <label for="General And Literary Fiction" class="categories_filer_box"> General And Literary Fiction </label>
                                </li>                            
                                <li><input id="Classics" name="Category[]" class="Categorysub common_selector1" type="checkbox" value=" Classics ">
                                    <label for="Classics" class="categories_filer_box"> Classics </label>
                                </li>                            
                                <li><input id="Romance" name="Category[]" class="Categorysub common_selector1" type="checkbox" value=" Romance ">
                                    <label for="Romance" class="categories_filer_box"> Romance </label>
                                </li>                            
                                <li><input id="Popular Scienc" name="Category[]" class="Categorysub common_selector1" type="checkbox" value=" Popular Scienc ">
                                    <label for="Popular Scienc" class="categories_filer_box"> Popular Scienc </label>
                                </li>   
                                --->                         
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!--Language-->
                <div class="Sort-By">
                    <label> Language  </label>
                    <select class="drop" name="language" >
                    <option value="">~ All Regional ~ </option>
                         @foreach($languages as $data)          
                      
                        <option value="{{$data->language_name}}" {{ request('language') == $data->language_name ? 'selected' : '' }}>{{$data->language_name}}  </option>
                         @endforeach
                    </select>
                </div>      
                
                <!--Format-->
                <div class="Category-sub Format">
                    <div class="accordion-sub">
                        <button class="accordion">Format <span class="caret"></span></button>
                        <div class="panel" style="">
                            <ul>
                                <li><input id="Paperback" name="binding[]" class="Categorysub common_selector1" type="checkbox" value="Paperback">
                                    <label for="Paperback" class="categories_filer_box"> Paperback</label>
                                </li>
                                <li><input id="Hardback" name="binding[]" class="Categorysub common_selector1" type="checkbox" value="Hardboard">
                                    <label for="Hardback" class="categories_filer_box"> Hardboard</label>
                                </li>                                
                                <li><input id="BoxSet" name="binding[]" class="Categorysub common_selector1" type="checkbox" value="Box Set">
                                    <label for="BoxSet" class="categories_filer_box"> Box Set</label>
                                </li>
                                <li><input id="TradePaperBack" name="binding[]" class="Categorysub common_selector1" type="checkbox" value="Trade Paper Back">
                                    <label for="TradePaperBack" class="categories_filer_box"> Trade Paper Back</label>
                                </li>  
                                                                
                            </ul>
                        </div>
                    </div>
                </div>  
                
                <!--Price-->
                <div class="Sort-By Price-ber">
                    <label> Price  </label>
                    <select class="drop" name="price" required="" style="">
                         <option value="">~ Choose</option>
                       <option value="0-199">~ Below ₹199 </option>
                        <option value="200-500">₹200 - ₹500  </option>
                        <option value="500-1000"> ₹500 - ₹1000 </option> 
                        <option value=" 1001-above">₹1000-above</option>                        
                    </select>
                </div> 
                
                <!--Discount-->
                <div class="Category-sub Format">
                    <div class="accordion-sub">
                        <button class="accordion">By Discount  <span class="caret"></span></button>
                        <div class="panel" style="">
                            <ul>
                                <li><input id="discount1" name="discount[]" class="Categorysub common_selector1" type="checkbox" value="10-20">
                                    <label for="Discount-price10" class="categories_filer_box"> 10% Above</label>
                                </li>
                                <li><input id="discount2" name="discount[]" class="Categorysub common_selector1" type="checkbox" value="21-30">
                                    <label for="Discount-price20" class="categories_filer_box"> 20% Above</label>
                                </li>                                
                                <li><input id="discount3" name="discount[]" class="Categorysub common_selector1" type="checkbox" value="31-40">
                                    <label for="Discount-price30" class="categories_filer_box"> 30% Above</label>
                                </li>
                                <li><input id="discount4" name="discount[]" class="Categorysub common_selector1" type="checkbox" value="41-50">
                                    <label for="Discount-price40" class="categories_filer_box"> 40% Above</label>
                                </li>                                
                                <li><input id="discount5" name="discount[]" class="Categorysub common_selector1" type="checkbox" value="51-99">
                                    <label for="Discount-price50" class="categories_filer_box"> 50% Above</label>
                                </li> 
                                                                
                            </ul>
                        </div>
                    </div>
               
                </div>       
                
                <!--Brand-->
                <div class="Sort-By Price-ber">
                    <label> Publishers  </label>
                     
                    <select class="drop" name="publishers" >
                        <option value="">~ By Publishers ~ </option>
                         @foreach($publishers as $data)          

                        <option value="{{$data->id}}" {{ request('publisher') == $data->id ? 'selected' : '' }}>{{$data->name}}  </option>
                           @endforeach
                    
                    </select>
                </div> 
                
                <!--Author-->
                <div class="Sort-By Price-ber">
                    <label> Author  </label>
                    <select class="drop" name="author">
                        <option value="">~ Chose by Author ~ </option>
                         @foreach($authors as $data)   

                        <option value="{{$data->id}}"  {{ request('author') == $data->id ? 'selected' : '' }}>  {{ $data->author }} </option>
                           @endforeach
                    </select>
                </div>     
            <!--Age-->
                <div class="Category-sub">
                    <div class="accordion-sub">
                        <button class="accordion">Age<span class="caret"></span></button>
                        <div class="panel" style="">
                            <ul>
                                  
                                <li><input id="0-2" name="age[]" class="age common_selector1" type="checkbox" value="0-2"  {{ in_array('0-2', (array)request()->age) ? 'checked' : '' }}>
                                <label for="0-2" class="categories_filer_box"> 0-2</label>
                                </li>                            
                                <li><input id="3-5" name="age[]" class="age common_selector1" type="checkbox" value="3-5"  {{ in_array('3-5', (array)request()->age) ? 'checked' : '' }}>
                                <label for="3-5" class="categories_filer_box"> 3-5</label>
                                </li>  
                                <li><input id="6-8" name="age[]" class="age common_selector1" type="checkbox" value="6-8" {{ in_array('6-8', (array)request()->age) ? 'checked' : '' }}>
                                <label for="6-8" class="categories_filer_box"> 6-8</label>
                                </li>   
                              <li><input id="9-12" name="age[]" class="age common_selector1" type="checkbox" value="9-12" {{ in_array('9-12', (array)request()->age) ? 'checked' : '' }}>
                                <label for="9-12" class="categories_filer_box"> 9-12</label>
                                </li>    
                                <li><input id="13-18" name="age[]" class="age common_selector1" type="checkbox" value="13-18" {{ in_array('13-18', (array)request()->age) ? 'checked' : '' }}>
                                <label for="13-18" class="categories_filer_box"> 13-18(Young Adult)</label>
                                </li>    
                                <li><input id="18+" name="age[]" class="age common_selector1" type="checkbox" value="18+" {{ in_array('18+', (array)request()->age) ? 'checked' : '' }}>
                                <label for="18+" class="categories_filer_box"> Adult</label>
                                </li>                     
                            </ul>
                        </div>
                    </div>
                </div>



            </form>
        </div>
    
    
    
<!----------------------------- All Product ----------------------------->
        <div class="book-right" id="product-data">
            @include('filter_products')

   
        </div>
  

</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!--Category js-->
<script>
const button = document.getElementById("button");
const listContainer = document.getElementById("list-container")

button.addEventListener("click", () => {
listContainer.classList.toggle("active");
})
</script>

<script>
$(document).ready(function(){

    $('.common_selector1, .drop').on('change', function(){
      //alert('ok');
        filter_data();

    });

    function filter_data()
    {
          console.log($('#filterForm').serialize());  
        $.ajax({

            url: "{{ url('filter-products') }}",

            method: "GET",

            data: $('#filterForm').serialize(),

            success:function(data)
{
    console.log(data);

    $('#product-data').html(data);
}

        });
    }

});

</script>

<script>
$(document).on('click', '.add-to-cart-btn', function(e) {
    e.preventDefault();

    let productId = $(this).data('id');
    let type = $(this).data('type');
//alert(type);
    let url = "{{ route('cart.add.ajax', ':id') }}";
    url = url.replace(':id', productId);

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            quantity: 1,
            type: type
        },
        success: function(response) {
            alert(response.message);
            $('#cart-count').text(response.cart_count);
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
});
</script>
<style>
    .product-on .book-right .book-box .book-img img { opacity: 0.9;
</style>



@endsection