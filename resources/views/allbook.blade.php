@extends('layouts.main')
@section('middle')

<style>.header-bottom .menu-new ul li a span.all_book{color: #99340c; text-shadow: 1px 1px 0px rgb(255, 255, 255);}</style>


<!--Banner / slick-slider-->
<div class="banner" data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
    <div class="slick-slider">
           @foreach($banners as $data) 
        <div class="element element-1">
            <a href="{{ url($data->link) }}">
                <img src="{{ asset('uploads/'.$data->picture)}}" alt="" class="banner-img" />
            </a>
        </div>
  @endforeach
  <!---
        <div class="element element-2">
            <a href="all_book.php">
                <img src="images/banner4.jpg" alt="" class="banner-img" />
            </a>
        </div>
        <div class="element element-3">
            <a href="all_book.php">
                <img src="images/banner2.jpg" alt="" class="banner-img" />
            </a>
        </div>
        <div class="element element-4">
            <a href="all_book.php">
                <img src="images/banner5.jpg" alt="" class="banner-img" />
            </a>
        </div>
        <div class="element element-5">
            <a href="book.php">
                <img src="images/banner1.jpg" alt="" class="banner-img" />
            </a>
        </div>
        <div class="element element-6">
            <a href="all_book.php">
                <img src="images/banner7.jpg" alt="" class="banner-img" />
            </a>
        </div>
        <div class="element element-7">
            <a href="all_book.php">
                <img src="images/banner3.jpg" alt="" class="banner-img" />
            </a>
        </div>
        <div class="element element-8">
            <a href="all_book.php">
                <img src="images/banner4.jpg" alt="" class="banner-img" />
            </a>
        </div>
        <div class="element element-9">
            <a href="all_book.php">
                <img src="images/banner5.jpg" alt="" class="banner-img" />
            </a>
        </div>
        <div class="element element-10">
            <a href="all_book.php">
                <img src="images/banner1.jpg" alt="" class="banner-img" />
            </a>
        </div>
    --->
    </div>
</div>


<!--  All Sub-Category of books  -->
<div class="all-Sub-Category-block">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2>All Sub-Category <span>bivamart.com</span></h2>
    </div> 
    <div id="all-Sub-Category" class="owl-carousel">
   @foreach($subcategories as $data)   
        <div class="item">
        <div class="Category-block-book"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
        <a href="book.php"><img src="{{ asset('uploads/'.$data->image)}}" title=""><span>{{$data->name}}</span></a>
            </a>
        </div>
          </div> 
        @endforeach

<!---
        <div class="item">
            <div class="Category-block-book"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <a href="book.php"><img src="images/Sub-Category1.png" title=""><span>New releases </span></a>
            </div>
        </div> 
        <div class="item">
            <div class="Category-block-book"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <a href="book.php"><img src="images/Sub-Category2.png" title="Fiction"><span>Fiction</span></a>
            </div>
        </div> 
        <div class="item">
            <div class="Category-block-book"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <a href="book.php"><img src="images/Sub-Category3.png" title="Non-Fiction"><span>Non-Fiction</span></a>
            </div>
        </div> 
        <div class="item">
            <div class="Category-block-book"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <a href="book.php"><img src="images/Sub-Category4.png" title="Children Books"><span>Children Books</span></a>
            </div>
        </div> 
        <div class="item">
            <div class="Category-block-book"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <a href="book.php"><img src="images/Sub-Category5.png" title="School Books"><span>School Books</span></a>
            </div>
        </div> 
        <div class="item">
            <div class="Category-block-book"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <a href="book.php"><img src="images/Sub-Category6.png" title="Exam Prep"><span>Exam Prep</span></a>
            </div>
        </div> 
        <div class="item">
            <div class="Category-block-book"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <a href="book.php"><img src="images/Sub-Category7.png" title="Higher Education"><span>Higher Education</span></a>
            </div>
        </div> 
        <div class="item">
            <div class="Category-block-book"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <a href="book.php"><img src="images/Sub-Category8.png" title="Magazines"><span>Magazines</span></a>
            </div>
        </div> 
        <div class="item">
            <div class="Category-block-book"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <a href="book.php"><img src="images/Sub-Category9.png" title="Book Gifts"><span>Book Gifts</span></a>
            </div>
        </div> 
       -->   
    </div> 
</div>   



<!--  Pre-Order-book-->
<div class="Top-Trending Pre-Order-book" style="padding: 20px 0 30px;">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2>{{$first_sliderCategoryName->name}}<span>bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div id="Pre-Order-book" class="owl-carousel">
         @foreach($products_slider as $data)


            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
            @if($data->images && $data->images->count())
                    <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif

                        <h6> {{$data->discount}}% OFF</h6>
                    </div>
                    <h3>{{$data->title}}</h3>
                    <h4><b>WRITER :</b>{{ $data->authorData?->author }}</h4>
                    <h5><b>₹ </b> {{$data->discounted_price}}/- <del><b>₹ </b> {{$data->price}}</del></h5>
                    <a href="single/book/{{$data->id}}/{{$data->product_id}}">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>   
@endforeach
            <!----
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Pre-Order2.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Podipisir Bormi Baksho</h3>
                    <h4><b>WRITER :</b> Saikat Mukhopadhyay </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Pre-Order Now
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Pre-Order3.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Kauriburi Temple</h3>
                    <h4><b>WRITER :</b> Avik Sarkar </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Pre-Order Now
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
                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Pre-Order Now
                    </a>
                </div> 
            </div>
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Pre-Order1.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>TIN TIRRIKE BHOI</h3>
                    <h4><b>WRITER :</b> Trijit Kar </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Pre-Order Now
                    </a>
                </div> 
            </div>   
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Pre-Order2.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Podipisir Bormi Baksho</h3>
                    <h4><b>WRITER :</b> Saikat Mukhopadhyay </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Pre-Order Now
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Pre-Order3.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Kauriburi Temple</h3>
                    <h4><b>WRITER :</b> Avik Sarkar </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Pre-Order Now
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
                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Pre-Order Now
                    </a>
                </div> 
            </div>
            -->
        </div>
    </div>     
</div>
<!-- //  Pre-Order  -->


<!--  Pre-Order Latest Books  -->
<div class="Pre-Order Latest-Books">
    <div class="row" style="width: 90%;  margin: 0 auto;">
        <div class="col-md-5 col-sm-5 col-xs-12"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
            <h5>{{$homepage->latest_title}}</h5>
            <h4>{{$homepage->latest_bigtitle}}</h4>
            <video controls="" muted="" loop="" id="myVideo">
                <source src="{{ asset('uploads/'.$homepage->video) }}" type="video/mp4">          
            </video>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12"  data-aos="fade-down" style="transition:all 1500ms ease-in-out;">
        <div id="LatestBooks" class="owl-carousel">
           @foreach($products_latest as $data)

            <div class="item">
        <div class="Pre-box">
            <a href="{{ url($data->id) }}">

                @if($data->images->count() > 0)
                    <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif

            </a>
        </div>
    </div>
@endforeach

            <!----
            <div class="item">
                <div class="Pre-box">
                    <a href="book.php">
                        <img src="images/category2.jpg" alt="" class="" />
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="Pre-box">
                    <a href="book.php">
                        <img src="images/category3.jpg" alt="" class="" />
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="Pre-box">
                    <a href="book.php">
                        <img src="images/category4.jpg" alt="" class="" />
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="Pre-box">
                    <a href="book.php">
                        <img src="images/category5.jpg" alt="" class="" />
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="Pre-box">
                    <a href="book.php">
                        <img src="images/category6.jpg" alt="" class="" />
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="Pre-box">
                    <a href="book.php">
                        <img src="images/category7.jpg" alt="" class="" />
                    </a>
                </div>
            </div>            
            --->
        </div>
        </div> 
    </div>     
</div>
<!-- //  Pre-Order  -->


<!--  New Arrival   -->
<div class="Top-Trending Best-Sellers New-Arrival" style="">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2 style="">{{$second_sliderCategoryName->name}}   <span style="">bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div id="New-Arrival" class="owl-carousel">
                  @foreach($products_slider2 as $data)


            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                      @if($data->images && $data->images->count())
                    <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif

                        <h6> {{$data->discount}}% OFF</h6>
                    </div>
                    <h3>{{$data->title}}</h3>
                    <h4><b>WRITER :</b>{{ $data->authorData?->author }}</h4>
                    <h5><b>₹ </b> {{$data->discounted_price}}/- <del><b>₹ </b> {{$data->price}}</del></h5>
                    <a href="single/book/{{$data->id}}/{{$data->product_id}}">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>   
@endforeach            
         
            <!--
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Trending1.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>TIN TIRRIKE BHOI</h3>
                    <h4><b>WRITER :</b> Trijit Kar </h4>
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
                        <img src="images/Pre-Order1.png" alt="" class="" />
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
                        <img src="images/Trending1.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>TIN TIRRIKE BHOI</h3>
                    <h4><b>WRITER :</b> Trijit Kar </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/Pre-Order2.png" alt="" class="" />
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Kauriburi Temple</h3>
                    <h4><b>WRITER :</b> Avik Sarkar </h4>
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
<!-- //  Best Sellers -->


<!--Choose By Category-->
<div class="ChooseCategory" style="background: #002a29;">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2 style="color: #f1fcff;">Choose By Category  <span style="">bivamart.com</span></h2>
    </div> 
    <div class="ChooseCategory-left">
        <div class="ChooseCategory-left-top">
            <div class="ChooseCategory-left-top-left"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                 <a href="{{$homepage->image1_link}}">
                @if($homepage->category_image1)
                    <img src="{{ asset('uploads/'.$homepage->category_image1) }}" alt="" class="hulf-img">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif        
               <h5>{{ $homecategory1Name->name }}</h5>

                </a>
            </div> 
            <div class="ChooseCategory-left-top-left"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                 <a href="{{ $homepage->image2_link }}">
                  @if($homepage->category_image2)
                    <img src="{{ asset('uploads/'.$homepage->category_image2) }}" alt="" class="hulf-img">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif        
               <h5>{{ $homecategory2Name->name }}</h5> 

                </a>
            </div>            
       </div>
       <div class="ChooseCategory-left-bottom"> 
            <a href="">

                <iframe src="https://www.youtube.com/embed/2_4RbMN6RYI?si=ogM3kNOub8DTWbsW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" class="full-img" allowfullscreen ></iframe>
                  <h5></h5>
            </a>
       </div>       
    </div>
    
    <div class="ChooseCategory-right">
        <div class="ChooseCategory-right-left"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
            <a href="{{ $homepage->image3_link }}">
               @if($homepage->category_image3) 
                <img src="{{ asset('uploads/'.$homepage->category_image3) }}" alt="" class="right-full-img">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="right-full-img">
                @endif    
                <h5>{{ $homecategory3Name->name }}</h5>

            </a>
        </div>
        <div class="ChooseCategory-right-right"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
            <div class="ChooseCategory-right-right-top">
                <a href="{{ $homepage->image4_link }}">
             @if($homepage->category_image4) 
                <img src="{{ asset('uploads/'.$homepage->category_image4) }}" alt="" class="top-hulf-img">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="top-hulf-img">
                @endif    

                <h5>{{ $homecategory4Name->name }}</h5>
                </a>
            </div>
            <div class="ChooseCategory-right-right-bottom"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <a href="{{ $homepage->image5_link }}">

                 @if($homepage->category_image4) 
                <img src="{{ asset('uploads/'.$homepage->category_image5) }}" alt="" class="top-hulf-img">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="top-hulf-img">
                @endif    
     
                <h5>{{ $homecategory5Name->name }}r</h5>
                </a>
            </div>
        </div>        
    </div>    
</div>

<img src="images/book-banner-midel.png" alt="" style="width:100%;"/>

<!--Various Category -->
<div class="Various-Category ">
        <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2 style="text-shadow: 1px 3px 5px rgb(0, 0, 0); color: #f0fffe;">Various Category  <span style="text-shadow:none; color: #f0fffe;">bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 col-xs-6"  data-aos="zoom-in" style="transition:all 1300ms ease-in-out;">
                <h3><b>Sharadindu Banerjee's</b> Unique Fiction</h3>
                <p> <img src="images/Sharadindu.jpg" alt="" class="" style="width: 33%; border-radius: 0px; float: left; padding: 10px; margin: 0;">In addition to writing outstandingly popular detective stories, worthwhile historical narratives and short stories of diverse tastes, Sharadindu Banerjee has written a variety of works. <i>Apart from Byomkesh-Kahinimala, romanticism in Sharadindu's other novels and stories has flown to another world like a distant bird. Especially, while keeping the historical context in mind in historical novels and stories, Sharadindu gave special importance to the role of romance in such fiction. </i>He has skillfully established the diversity that can exist in the classical genre of love stories. In numerous works, he has depicted the history of the endless journey of man. Sharadindu Banerjee's works are timeless in classical literary thought.</p>
            </div>
            <div class="col-md-6 col-sm-5 col-xs-6"  data-aos="fade-down" style="transition:all 1400ms ease-in-out;">
                <div id="Various-demo" class="owl-carousel">
                    <div class="item">
                        <a href="book.php">
                        <img src="images/Sharadindu2.jpg" alt="" class="" />
                        <h3>Aloukik Galpasamagra</h3>
                        <h4> Sharadindu Banerjee </h4>
                        </a>
                    </div> 
                    <div class="item">
                        <a href="book.php">
                        <img src="images/Sharadindu1.jpg" alt="" class="" />
                        <h3>Aloukik Galpasamagra</h3>
                        <h4> Sharadindu Banerjee </h4>
                        </a>
                    </div>                    
                    <div class="item">
                        <a href="book.php">
                        <img src="images/Sharadindu3.jpg" alt="" class="" />
                        <h3>Koutuk Galpasamagra</h3>
                        <h4> Sharadindu Banerjee </h4>
                        </a>
                    </div> 
                    <div class="item">
                        <a href="book.php">
                        <img src="images/Sharadindu4.jpg" alt="" class="" />
                        <h3>Byomkesh Samagra</h3>
                        <h4> Sharadindu Banerjee </h4>
                        </a>
                    </div>                    
                    
                </div> 
            </div>            
        </div>    
    </div>     
</div>


<!--  Chose by Author  -->
<div class="Chose-Author">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2>Chose by Author <span>bivamart.com</span></h2>
    </div> 
    <div class="container">
        <ul data-aos="fade-down" style="transition:all 1500ms ease-in-out;">
            @foreach($authors as $data) 

            <li><a href="book.php"><img src="{{ asset('uploads/'.$data->picture)}}" alt="" class="Author-img"/><span>{{$data->author}}</span></a></li>
            @endforeach
            <!--
            <li><a href="book.php"><img src="images/WRITER1.png" alt="" class="Author-img"/><span>Arpita Sarkar</span></a></li>
            <li><a href="book.php"><img src="images/WRITER2.png" alt="" class="Author-img"/><span>Sayak Aman</span></a></li>
            <li><a href="book.php"><img src="images/WRITER1.png" alt="" class="Author-img"/><span>Arpita Sarkar</span></a></li>            
            <li><a href="book.php"><img src="images/WRITER2.png" alt="" class="Author-img"/><span>Sayak Aman</span></a></li>
            <li><a href="book.php"><img src="images/WRITER1.png" alt="" class="Author-img"/><span>Arpita Sarkar</span></a></li>    
            -->          
        </ul>
    </div>     
</div>
<!-- //  Chose by Author -->


<!--  Most Popular Series  -->
<div class="Popular-Series">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2>Most Popular Series <span>bivamart.com</span></h2>
    </div> 
    <div class="container" data-aos="fade-down" style="transition:all 1500ms ease-in-out;">
        <div id="Most-Popular-Series" class="owl-carousel">
          @foreach($series as $data)    
            <div class="item">
                <div class="Popular-Series-img">
                    <a href="book.php" title="A"><img src="{{ asset('uploads/'.$data->picture)}}" width="100px"></a>
                </div>
            </div>   
            @endforeach
            <!---  
            <div class="item">
                <div class="Popular-Series-img">
                    <a href="book.php" title="B"><img src="images/Popular-Series2.png"></a>
                </div>
            </div>                 
            <div class="item">
                <div class="Popular-Series-img">
                    <a href="book.php" title="c"><img src="images/Popular-Series3.png"></a>
                </div>
            </div>     
            <div class="item">
                <div class="Popular-Series-img">
                    <a href="book.php" title="d"><img src="images/Popular-Series4.png"></a>
                </div>
            </div>  
            <div class="item">
                <div class="Popular-Series-img">
                    <a href="book.php" title="e"><img src="images/Popular-Series5.png"></a>
                </div>
            </div>     
            <div class="item">
                <div class="Popular-Series-img">
                    <a href="book.php" title="f"><img src="images/Popular-Series6.png"></a>
                </div>
            </div>
            -->
        </div>    
    </div>     
</div>
<!-- //  Most Popular Series -->


<!--  Books by Age, Stories for All  -->
<div class="Popular-Series Books-Stories" style="">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2>Books by Age, Stories for All <span>bivamart.com</span></h2>
    </div> 
    <div class="container">
        <ul data-aos="fade-down" style="transition:all 1400ms ease-in-out;">
            <li title="0-2"><a href="book.php"><img src="{{ asset('images/age1.png')}}"></a> </li>
            <li title="3-5"><a href="book.php"><img src="{{ asset('images/age2.png')}}"></a></li>
            <li title="6-8"><a href="book.php"><img src="{{ asset('images/age3.png')}}"></a> </li>
            <li title="9-12"><a href="book.php"><img src="{{ asset('images/age4.png')}}"></a> </li>
            <li title="13-18"><a href="book.php"><img src="{{ asset('images/age5.png')}}"></a> </li>  
            <li title="18+"><a href="book.php"><img src="{{ asset('images/age6.png')}}"></a> </li>             
        </ul>
    </div>     
</div>
<!-- //  Books by Age, Stories for All -->




<!--  Popular Publishers  -->
<div class="Popular-Publishers">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2>Popular Publishers <span>bivamart.com</span></h2>
    </div> 
    <div class="slick marquee">
      @foreach($publishers as $data)        
      <div class="slick-slide">
        <div class="inner">
            <a href="book.php"><img src="{{ asset('uploads/'.$data->picture)}}" alt="Placeholder01" /></a>
        </div>
      </div>
      @endforeach
      <!---
      <div class="slick-slide">
        <div class="inner">
          <a href="book.php"><img src="images/Publishers2.png" alt="Placeholder02" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
           <a href="book.php"><img src="images/Publishers3.png" alt="Placeholder03" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
          <a href="book.php"><img src="images/Publishers4.jpg" alt="Placeholder04" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
          <a href="book.php"><img src="images/Publishers5.jpg" alt="Placeholder05" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
          <a href="book.php"><img src="images/Publishers6.png" alt="Placeholder06" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
           <a href="book.php"><img src="images/Publishers7.jpg" alt="Placeholder07" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
          <a href="book.php"><img src="images/Publishers8.png" alt="Placeholder08" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
            <a href="book.php"><img src="images/Publishers5.jpg" alt="Placeholder09" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
            <a href="book.php"><img src="images/Publishers3.png" alt="Placeholder10" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
          <a href="book.php"><img src="images/Publishers4.jpg" alt="Placeholder04" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
          <a href="book.php"><img src="images/Publishers5.jpg" alt="Placeholder05" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
          <a href="book.php"><img src="images/Publishers6.png" alt="Placeholder06" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
          <a href="book.php"><img src="images/Publishers7.jpg" alt="Placeholder07" /></a>
        </div>
      </div>
      <div class="slick-slide">
        <div class="inner">
          <a href="book.php"><img src="images/Publishers8.png" alt="Placeholder08" /></a>
        </div>
      </div>
      -->
    </div>     
</div>
<!-- //  Chose by Author -->



<!--  The Indian Bookshelf  -->
<div class="Popular-Series Bookshelf" style="">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2>The Indian Bookshelf <span>bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div id="Bookshelf-Language" class="owl-carousel">
            @foreach($languages as $data)       
            <div class="item">
                <div class="Language-block"  data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
                    <a href="book.php" class="a"><img src="{{ asset('uploads/'.$data->picture)}}"></a>
                </div>
            </div>
            @endforeach

     <!---
            <div class="item">
                <div class="Language-block"  data-aos="fade-down" style="transition:all 1150ms ease-in-out;">
                    <a href="book.php" class="b"><img src="images/lenguas2.png"></a>
                </div>
            </div>            
            <div class="item">
                <div class="Language-block"  data-aos="fade-down" style="transition:all 1200ms ease-in-out;">
                    <a href="book.php" class="c"><img src="images/lenguas3.png"></a>
                </div>
            </div>
            <div class="item">
                <div class="Language-block"  data-aos="fade-down" style="transition:all 1250ms ease-in-out;">
                    <a href="book.php" class="d"><img src="images/lenguas4.png"></a>
                </div>
            </div> 
            <div class="item">
                <div class="Language-block"  data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
                    <a href="book.php" class="e"><img src="images/lenguas5.png"></a>
                </div>
            </div>
            <div class="item">
                <div class="Language-block"  data-aos="fade-down" style="transition:all 1150ms ease-in-out;">
                    <a href="book.php" class="f"><img src="images/lenguas6.png"></a>
                </div>
            </div>            
            <div class="item">
                <div class="Language-block"  data-aos="fade-down" style="transition:all 1200ms ease-in-out;">
                    <a href="book.php" class="g"><img src="images/lenguas7.png"></a>
                </div>
            </div>
            --->
        </div>    
    </div>     
</div>
<!-- //  The Indian Bookshelf -->


@endsection