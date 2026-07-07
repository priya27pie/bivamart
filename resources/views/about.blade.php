@extends('layouts.main')
@section('middle')

<div class="inner-banner">
    <img src="{{asset('images/iner-banner.png')}}" alt="" class="inner-banner-img" />
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">About us</p>
   <div class="particle-network-animation"></div>
</div>



<div class="about-inner aos-init aos-animate" data-aos="fade-down" style="transition:all 1500ms ease-in-out;">
    <!-- tittle heading -->
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>About us<span> bivamart.com</span></h2>
    </div> 
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-sx-12">
                <div class="left-text-top aos-init aos-animate" data-aos="fade-down" style="padding:0px 0; transition:all 1400ms ease-in-out;">
                    <h2>At Bivamart, we enjoy curating special events across our stores.</h2>
                    <p>bivamart.com Bookstores was founded in <b>( demo text all )</b> with a simple yet passionate mission – To positively impact the world through the power of reading and learning.<br>Right from our first store in Mumbai to the 120 stores across 40 cities today, we have continued to serve and nurture our community of readers for over 3 decades. As India's leading bookstore retailer, we champion books and nourish a love for the written word through a rich, handpicked collection covering numerous topics. <br>Our stores are thoughtfully designed with interiors that inspire and relax, allowing quiet spaces to help you discover great books.</p>
                    <h2> Mission and Vision </h2>
                    <p>In addition to our diverse selection of books, we have premium stationery and toys, to make your life a little easier, and a lot more colourful!</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-sx-12">
                <div class="about-inner-item aos-init aos-animate" data-aos="zoom-in" style="transition: all 1300ms ease-in-out;">
                    <img src="{{asset('images/about-iner-bg.png')}}" alt="" class="" style="width:100%;border-radius: 0px;">
                </div>
            </div>

        </div>
    </div>
</div>






<!-- Header include -->
@endsection
<!-- // Header include -->