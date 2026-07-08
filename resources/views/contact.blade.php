@extends('layouts.main')
@section('middle')


<div class="inner-banner">
    <img src="{{asset('images/iner-banner.png')}}" alt="" class="inner-banner-img" />
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">Return</p>
   <div class="particle-network-animation"></div>
</div>

<div class="contact-inner" style="">
    <div class="container">
        <div class="contact-block" style="">
            <div class="left-con">
                <h2>Gate in touch </h2>
                <p>Please contact us for any needs and fill out this form.</p>
                <form action="" method="post">
                    <div class="fill-box">
                        <input id="name" type="text" title="name" name="name" placeholder="Name" required="">
                    </div>
                    <div class="fill-box">
                        <input id="email" type="email" title="email" name="email" placeholder="Email" required="">
                    </div>
                    <div class="fill-box subject">
                        <input id="phone" type="text" title="ph" name="phone" placeholder="Phone No" required="">
                    </div>
                           
                    <div class="fill-box message">
                        <textarea placeholder="Message" name="msg" required=""></textarea>
                    </div>
                    <div class="fill-box captcha">
                        <input type="text" name="captcha" value="369" readonly=""> 
                    </div>
                    <div class="fill-box">
                        <input id="text" type="text" title="captcha" name="put_captcha" placeholder="Captcha Please ">
                    </div>
                    <div class="content-submit">
                        <button type="submit" name="sub">Submit</button>
                    </div>
                </form>
             </div>
            <div class="right-con aos-init" data-aos="zoom-in" style="transition: all 1300ms ease-in-out;">
                <h2>Contact us </h2>
                <ul class="contact-addres">

                    <li><i class="fa fa-map"></i><a href="#"><b>Office : </b>T32 Teghoria main road, Near Teghoria Sporting Club, Kol 700157, WB.</a> </li>                    
                    <li><i class="fa fa-phone"></i><a href="tel:9434343446"><b>Call : </b>+91 9434 343 446</a> </li>
                    <li><i class="fa fa-envelope"></i><a href="mailto:biva.publications@gmail.com"><b>Email : </b>biva.publications@gmail.com</a></li>
                </ul>
                <ul class="contact-social">
                    <li class="aos-init aos-animate"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="aos-init aos-animate"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="aos-init aos-animate"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="aos-init aos-animate"><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>

            </div>
        </div>        
    </div>
</div>

<!-- Header include -->
@endsection
<!-- // Header include -->
