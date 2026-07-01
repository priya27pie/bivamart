@extends('layouts.main')
@section('middle')

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
       
    </div>
</div>

<!--  Top Trending -->
<div class="Top-Trending">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2>{{$first_sliderCategoryName->name}}<span>bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div id="trending-slider" class="owl-carousel">

@foreach($products_slider as $data)


            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                    @if($data->images && $data->images->count())
                    <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
                    @else
                        <img src="{{ asset('uploads/no-image.png') }}" alt="">
                    @endif
                   @if($data->special_tag!='')          
                        <div class="ps-product__badge" style="background-color: {{$data->tagcolor}} !important">{{$data->special_tag}}</div>     
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

        </div>
    </div>     
</div>
<!-- //  Top Trending -->




<!--  Pre-Order  -->
<div class="Pre-Order">
    <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-12"  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
            <h5>{{$homepage->latest_title}}</h5>
            <h4>{{$homepage->latest_bigtitle}}</h4>
            <!--<h6>Loren lipsum consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</h6>-->
            <video controls="" muted="" loop="" id="myVideo">
                <source src="{{ asset('uploads/'.$homepage->video) }}" type="video/mp4">          
            </video>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12"  data-aos="fade-down" style="transition:all 1500ms ease-in-out;">
        <div id="Pre-Order" class="owl-carousel">
           
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
           <!---
            <div class="item">
                <div class="Pre-box">
                    <a href="all_book.php">
                        <img src="{{asset('images/Pre-Order2.png')}}" alt="" class="" />
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="Pre-box">
                    <a href="all_book.php">
                        <img src="{{asset('images/Pre-Order3.png')}}" alt="" class="" />
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="Pre-box">
                    <a href="all_book.php">
                        <img src="{{asset('images/Trending1.png')}}" alt="" class="">
                    </a>
                </div>
            </div>
--->
        </div>
        </div> 
    </div>     
</div>
<!-- //  Pre-Order  -->

<!--  Best Sellers  -->
<div class="Top-Trending Best-Sellers">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2 style="">{{$second_sliderCategoryName->name}}  <span style="">bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div id="Best-Sellers" class="owl-carousel">
        @foreach($products_slider2 as $data)


            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                      @if($data->images && $data->images->count())
                    <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif
 @if($data->special_tag!='')          
                        <div class="ps-product__badge" style="background-color: {{$data->tagcolor}} !important">{{$data->special_tag}}</div>     
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
<!--- 
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="{{asset('images/Pre-Order1.png')}}" alt="" class="">
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
                        <img src="{{asset('images/Trending1.png')}}" alt="" class="" />
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
                        <img src="{{asset('images/Trending3.png')}}" alt="" class="" />
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
                        <img src="{{asset('images/Pre-Order1.png')}}" alt="" class="" />
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
                        <img src="{{asset('images/Trending1.png')}}" alt="" class="" />
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
                        <img src="{{asset('images/Pre-Order2.png')}}" alt="" class="" />
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
                        <img src="{{asset('images/Trending4.png')}}" alt="" class="" />
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
--->
        </div>
    </div>     
</div>
<!-- //  Best Sellers -->


<!--Choose By Category-->
<div class="ChooseCategory">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2 style="">Choose By Category  <span style="">bivamart.com</span></h2>
    </div> 
    <div class="ChooseCategory-left">
        <div class="ChooseCategory-left-top">
            <div class="ChooseCategory-left-top-left">
                 <a href="{{ $homepage->image1_link }}">
                     @if($homepage->category_image1)
                    <img src="{{ asset('uploads/'.$homepage->category_image1) }}" alt="" class="hulf-img">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif
                    <h5>{{ $homecategory1Name->name }}</h5>
                </a>
            </div> 
            <div class="ChooseCategory-left-top-left">
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
                <h5>Designer Merchandise</h5>
            </a>
       </div>       
    </div>
    
    <div class="ChooseCategory-right">
        <div class="ChooseCategory-right-left">
            <a href="{{ $homepage->image3_link }}">
             @if($homepage->category_image3)
                    <img src="{{ asset('uploads/'.$homepage->category_image3) }}" alt="" class="right-full-img">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif

                <h5>{{ $homecategory3Name->name }}</h5>
            </a>
        </div>
        <div class="ChooseCategory-right-right">
            <div class="ChooseCategory-right-right-top">
                <a href="{{ $homepage->image4_link }}">
   @if($homepage->category_image4)
                    <img src="{{ asset('uploads/'.$homepage->category_image4) }}" alt="" class="top-hulf-img">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif

                <h5>{{ $homecategory4Name->name }}</h5>
                </a>
            </div>
            <div class="ChooseCategory-right-right-bottom">
                <a href="{{ $homepage->image5_link }}">
                @if($homepage->category_image5)
                    <img src="{{ asset('uploads/'.$homepage->category_image5) }}" alt="" class="top-hulf-img">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif     
                <h5>{{ $homecategory5Name->name }}</h5>
                </a>
            </div>
        </div>        
    </div>    
</div>

<!--  Designer Merchandise  -->
<div class="Top-Trending Best-Sellers MerchandiseDecor" style="background: linear-gradient(900deg, rgba(253, 253, 253, 0.44) 50%, rgb(185, 229, 255) 50%);">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2 style="">{{$third_sliderCategoryName->name}}   <span style="">bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div id="merchandise-Sellers" class="owl-carousel">
          
            @foreach($products_slider3 as $data)


            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                @if($data->images && $data->images->count())
                        <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
                @else
                    <img src="{{ asset('uploads/no-image.png') }}" alt="">
                @endif
 @if($data->special_tag!='')          
                        <div class="ps-product__badge" style="background-color: {{$data->tagcolor}} !important">{{$data->special_tag}}</div>     
                    @endif
                        <h6> {{$data->discount}}% OFF</h6>
                    </div>
                    <h3>{{$data->title}}</h3>
                     <h4>Get Biva Points  </h4>
                    <h5><b>₹ </b> {{$data->discounted_price}}/- <del><b>₹ </b> {{$data->price}}</del></h5>
                    <a href="single/other/{{$data->id}}/{{$data->product_id}}">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>   
@endforeach
<!---
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="{{asset('images/images/pro2.jpg')}}" alt="" class="">
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Kaligunin Printed</h3>
                    <h4>Get Biva Points  </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>  
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/pro2.jpg" alt="" class="">
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Kaligunin Printed</h3>
                    <h4>Get Biva Points  </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div> 
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/pro2.jpg" alt="" class="">
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Kaligunin Printed</h3>
                    <h4>Get Biva Points  </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>             
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/pro2.jpg" alt="" class="">
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Kaligunin Printed</h3>
                    <h4>Get Biva Points  </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>  
            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                        <img src="images/pro2.jpg" alt="" class="">
                        <h6>₹ 15% OFF</h6>
                    </div>
                    <h3>Kaligunin Printed</h3>
                    <h4>Get Biva Points  </h4>
                    <h5><b>₹ </b> 499/- <del>599</del></h5>
                    <a href="single.php">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>             
            --->
        </div>
    </div>     
</div>
<!-- //  Designer Merchandise  -->

<!--  Home Decor  -->
<div class="Top-Trending Best-Sellers MerchandiseDecor" style="background: linear-gradient(900deg, rgba(253, 253, 253, 0.44) 50%, rgb(247, 234, 218) 50%);">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2 style="">{{$fourth_sliderCategoryName->name}}   <span style="">bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div id="HomeDecor-Sellers" class="owl-carousel">
             @foreach($products_slider4 as $data)


            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                   @if($data->images && $data->images->count())
    <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
@else
    <img src="{{ asset('uploads/no-image.png') }}" alt="">
@endif
 @if($data->special_tag!='')          
                        <div class="ps-product__badge" style="background-color: {{$data->tagcolor}} !important">{{$data->special_tag}}</div>     
                    @endif

                        <h6> {{$data->discount}}% OFF</h6>
                    </div>
                    <h3>{{$data->title}}</h3>
                     <h4>Get Biva Points  </h4>
                    <h5><b>₹ </b> {{$data->discounted_price}}/- <del><b>₹ </b> {{$data->price}}</del></h5>
                    <a href="single/other/{{$data->id}}/{{$data->product_id}}">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>   
@endforeach
          
         
        </div>
    </div>     
</div>
<!-- //  Home Decor -->


<!-- video-block -->
<div class="video-bg">
    <a href="#">
        <img src="{{asset('images/login.png')}}">
    </a>
    <div class="video-block" data-aos="zoom-in" style="transition:all 1300ms ease-in-out;">
        <video controls="">
            <source src="{{asset('video/book-library.mp4')}}" type="video/mp4">
        </video>
    </div>
</div> 
<!--/video-block-->

<!--  Scientific Products  -->
<div class="Top-Trending Best-Sellers MerchandiseDecor" style="background: linear-gradient(900deg, rgba(253, 253, 253, 0.44) 50%, rgb(195, 227, 247) 50%);">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2 style="">{{$fifth_sliderCategoryName->name}}    <span style="">bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div id="Scientific-Sellers" class="owl-carousel">

           @foreach($products_slider5 as $data)


            <div class="item">
                <div class="trending-box">
                    <div class="trending-img">
                   @if($data->images && $data->images->count())
    <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
@else
    <img src="{{ asset('uploads/no-image.png') }}" alt="">
@endif
 @if($data->special_tag!='')          
                        <div class="ps-product__badge" style="background-color: {{$data->tagcolor}} !important">{{$data->special_tag}}</div>     
                    @endif
                        <h6> {{$data->discount}}% OFF</h6>
                    </div>
                    <h3>{{$data->title}}</h3>
                     <h4>Get Biva Points  </h4>
                    <h5><b>₹ </b> {{$data->discounted_price}}/- <del><b>₹ </b> {{$data->price}}</del></h5>
                    <a href="single/other/{{$data->id}}/{{$data->product_id}}">
                        <i class="fa fa-bag-shopping"></i> Add to Bag
                    </a>
                </div> 
            </div>   
@endforeach
          
         
            
        </div>
    </div>     
</div>
<!-- //  Scientific Products -->

<!-- Toys, Games & Endiess Fun ! -->
<div class="Endiess-Fun">
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Toys, Games & Endless Fun! <span>bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div id="Endiess-slider" class="owl-carousel">
            <div class="item">
                <img src="{{asset('images/Games1.png')}}">
                <h3>Early Learning Toys</h3>
                <a href="all_product.php">Shop now >></a>
            </div> 
            <div class="item">
                <img src="{{asset('images/Games2.png')}}">
                <h3>Creative Building Toys</h3>
                <a href="all_product.php">Shop now >></a>
            </div>
            <div class="item">
                <img src="{{asset('images/Games3.png')}}">
                <h3>Cars, Vehicles & RC Toys</h3>
                <a href="all_product.php">Shop now >></a>
            </div> 
            <div class="item">
                <img src="{{asset('images/Games4.png')}}">
                <h3>Dolls & Play Toys</h3>
                <a href="all_product.php">Shop now >></a>
            </div>                
        </div>       
    </div>     
</div>      
<!--// Toys, Games & Endiess Fun ! -->



<!-- back to school -->
<div class="midel-patishan" data-aos="fade-down" style="transition:all 1500ms ease-in-out;">
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="">
                <div class="patishan-left">
                    <img src="{{asset('images/patishan-left-img.png')}}" alt="" class="patishan-left-img" />
                    <h6>#BackToSchool</h6>
                    <div id="back-to-school" class="owl-carousel">
                     
           @foreach($products_backtoschool as $data)

                        <div class="item">
                            <div class="school-box">
                                <div class="school-img">
     @if($data->images && $data->images->count())
    <img src="{{ asset('uploads/'.$data->images->first()->images) }}" alt="">
@else
    <img src="{{ asset('uploads/no-image.png') }}" alt="">
@endif
 @if($data->special_tag!='')          
                        <div class="ps-product__badge" style="background-color: {{$data->tagcolor}} !important">{{$data->special_tag}}</div>     
                    @endif
                                    <h6> {{$data->discount}}% OFF</h6>
                                </div>
                                <h3>{{$data->title}}</h3>
                                <h5><b>₹ </b>  {{$data->discounted_price}}/- <del><b>₹ </b>   {{$data->price}}/-</del></h5>
                                <a href="single/other/{{$data->id}}/{{$data->product_id}}">
                                    <i class="fa fa-bag-shopping"></i> Add to Bag
                                </a>
                            </div> 
                        </div>
@endforeach

                        <!---
                                    
                        <div class="item">
                            <div class="school-box">
                                <div class="school-img">
                                    <img src="{{asset('images/school4.png')}}" alt="" class="" />
                                    <h6>₹ 15% OFF</h6>
                                </div>
                                <h3>Legami Lovely Friends Gel Pen Llama.</h3>
                                <h4>Legami</h4>
                                <h5><b>₹ </b> 189/- <del>299</del></h5>
                                <a href="single.php">
                                    <i class="fa fa-bag-shopping"></i> Add to Bag
                                </a>
                            </div> 
                        </div>
                        --->
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">
                <div class="patishan-right">
                    <a href="#"><img src="{{asset('images/patishan-right-top-l.png')}}" alt="" class="patishan-right-top-L" /></a>
                    <a href="#"><img src="{{asset('images/patishan-right-top-R.png')}}" alt="" class="patishan-right-top-R" /></a>
                    <a href="#"><img src="{{asset('images/patishan-right-bottom.png')}}" alt="" class="patishan-right-bottom" /></a>                                     
                </div>
            </div>            
        </div>
    </div>
</div>
<!-- //back to school -->


<!--  category   -->
<div class="Customer-Feedback ">
    <div class="container">
        <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
            <h2>Customer Feedback  <span>bivamart.com</span></h2>
        </div> 
        <div class="category-right" data-aos="zoom-in" style="transition:all 1300ms ease-in-out;">
           <div id="all-category" class="owl-carousel">
                 @foreach($feedbacks as $data)

                <div class="item"> 
                    <div class="item-img">
                        <img src="{{asset('images/3.png')}}">
                        <h3>{{$data->name}}</h3>
                        <h6>Posted on <span>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</span></h6>
                       {!! $data->content !!}
                    </div>
                </div>   
                @endforeach
              <!---
                <div class="item"> 
                    <div class="item-img">
                        <img src="images/3.png">
                        <h3>Mr: Raaz Majumdar</h3>
                        <h6>Publick Posted <span>[ 31.03.26 ]</span></h6>
                        <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development. Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.</p>
                    </div>
                </div>  
                <div class="item"> 
                    <div class="item-img">
                        <img src="images/3.png">
                        <h3>Mr: Raaz Majumdar</h3>
                        <h6>Publick Posted <span>[ 31.03.26 ]</span></h6>
                        <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development. Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.</p>
                    </div>
                </div>   
                <div class="item"> 
                    <div class="item-img">
                        <img src="images/3.png">
                        <h3>Mr: Raaz Majumdar</h3>
                        <h6>Publick Posted <span>[ 31.03.26 ]</span></h6>
                        <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development. Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.</p>
                    </div>
                </div> 
                <div class="item"> 
                    <div class="item-img">
                        <img src="images/3.png">
                        <h3>Mr: Raaz Majumdar</h3>
                        <h6>Publick Posted <span>[ 31.03.26 ]</span></h6>
                        <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development. Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.</p>
                    </div>
                </div>   
                <div class="item"> 
                    <div class="item-img">
                        <img src="images/3.png">
                        <h3>Mr: Raaz Majumdar</h3>
                        <h6>Publick Posted <span>[ 31.03.26 ]</span></h6>
                        <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development. Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.</p>
                    </div>
                </div> 
                <div class="item"> 
                    <div class="item-img">
                        <img src="images/3.png">
                        <h3>Mr: Raaz Majumdar</h3>
                        <h6>Publick Posted <span>[ 31.03.26 ]</span></h6>
                        <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development. Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.</p>
                    </div>
                </div>        

                --->                                             
            </div>  
        </div>        
    </div>     
</div>
<!-- //  category -->





<a href="#"><img src="{{asset('images/mid-banner.png')}}" style="width:100%;"></a>





<!-- Shop by Publishers -->
<div class="Popular-Publishers">
    <div class="title-home" data-aos="fade-down" style="transition:all 1100ms ease-in-out;">
        <h2>Shop by Brand <span>bivamart.com</span></h2>
    </div> 
    <div class="slick marquee">
   @foreach($brands as $data)

      <div class="slick-slide">
        <div class="inner">
            <a href="book.php">
 @if($data->picture)
    <img src="{{ asset('uploads/'.$data->picture) }}" alt="Placeholder01">
@else
    <img src="{{ asset('uploads/no-image.png') }}" alt="Placeholder01">
@endif
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
      --->
    </div>     
</div>

 
<!--//  Shop by Publishers-->


@endsection

