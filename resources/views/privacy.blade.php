@extends('layouts.main')
@section('middle')

<div class="inner-banner">
    <img src="{{asset('images/iner-banner.png')}}" alt="" class="inner-banner-img" />
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">Privacy Policy</p>
   <div class="particle-network-animation"></div>
</div>






<div class="terms">
  	<div class="container">
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Privacy Policy <span> bivamart.com</span></h2>
    </div>

  		<div class="row">
  			<div class="col-md-12 col-sm-12 col-xm-12">
  			<p>Demo text all : Our biggest hope is that you love whatever you receive from demo, but we know that sometimes things aren't what you expected. We recommend packages be returned via a traceable carrier and insured to the full amount of the merchandise. We are not responsible for missing packages. We have the right to deny a return if the merchandise does not meet our return policy requirements. That said, we offer a 30 day exchange or return policy for items in their original condition. Before returning any item please contact us at support@bivamart.in and let us know what we will be needing to process. Shipping costs are non-refundable and return shipping fees are the responsibility of the customer. We recommend packages be returned via a traceable carrier and insured to the full amount of the merchandise. We are not responsible for missing packages. We have the right to deny a return if the merchandise does not meet our return policy requirements. </p>
  			</div>
  		</div>
  	</div>
</div>


<!-- Shop by Publishers -->
<div class="Publishers-Shop">
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Shop by Publishers<span>bivamart.com</span></h2>
    </div> 
    <div class="container">
        <ul class="Publishers-box"  data-aos="fade-down" style="transition:all 1400ms ease-in-out;" >
            <li><a href="#">Aakar Books <span>Delhi</span></a></li>
            <li><a href="#">ABD Pub. <span>Jaipur</span></a></li> 
            <li><a href="#">Royal Book Company  <span>Lucknow</span></a></li>
            <li><a href="#">Natraj Pub <span>Dehradun</span></a></li>             
            <li><a href="#">Wolters Kluwer <span>India (CCH)</span></a></li>
            <li><a href="#">Ananda Publishers. <span>West Bengal</span></a></li> 
            <li><a href="#">Patra Bharati <span>West Bengal</span></a></li>
            <li><a href="#">Tulsi Prakashani <span>West Bengal</span></a></li> 
        </ul>       
    </div>     
</div>      
<!--//  Shop by Publishers-->


<!-- Accordion -->
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>



<!-- Header include -->
@endsection
<!-- // Header include -->