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
            <form action="{{ url('allOtherproduct') }}" method="GET" id="filterForm">
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
                
               
                
                        
            </form>
        </div>
    
    
    
<!----------------------------- All Product ----------------------------->
        <div class="book-right" id="product-data">
            @include('filter-productsother')
   
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
      //  alert('ok');
        filter_data();

    });

    function filter_data()
    {
          console.log($('#filterForm').serialize());  
        $.ajax({

            url: "{{ route('filter-productsother', $category_id) }}",
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

<style>
    .product-on .book-right .book-box .book-img img { opacity: 0.9;
</style>



@endsection