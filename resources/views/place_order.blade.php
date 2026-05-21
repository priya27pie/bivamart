@extends('layouts.main')
@section('middle')



<div class="inner-profile">
  <img src="{{asset('images/profile-banner.png')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">Place Your Order</p>
   <div class="particle-network-animation"></div>
</div>

	<!-- top Products -->
	<div class="ads-grid">
      <!-- tittle heading -->
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Your Order<span>  Check Out</span></h2>
    </div>
      <!-- //tittle heading -->
		<div class="container">
			<div class="row">
				
					<div class="agileinfo-ads-display w3l-rightpro">
                        <div class="col-md-8 col-sm-8 col-xs-12">
						<div class="wrapper-profile">
							<!-- first section -->
							<div class="profile-banner">
								<h4><strong>Place Your Order</strong></h4>
								<hr>
                                <form  method="post">
                                   <div id="show">
                                    <div class="agileinfo_mail_grid_left">
                                        <ul class="big">
                                            <li><i class="fa fa-user" aria-hidden="true"></i></li>
                                            <li>Name</li>
                                        </ul>
                                        <input type="text" class="" name="text" value="Priyanka Das" readonly />
                                    </div>
                                   
                                    <div class="agileinfo_mail_grid_left">
                                        <ul class="big">
                                            <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
                                            <li>Email</li>
                                        </ul>
                                        <input type="email" class="" name="email" value="info@gmail.com" readonly />
                                    </div>

                                    <div class="agileinfo_mail_grid_left">
                                        <ul class="big">
                                            <li><i class="fa fa-phone" aria-hidden="true"></i></li>
                                            <li>Phone</li>
                                        </ul>
                                        <input type="text" class="" name="phon" value="+91 00000 00000" readonly />
                                    </div>
                            
                                    <div class="agileinfo_mail_grid_left">
                                        <ul class="big">
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i></li>
                                            <li>City,State</li>
                                        </ul>
                                         <input type="text" class="" name="city_state" value="Kol,743262, WB" readonly />
                                    </div>
        
 
                                    <div class="agileinfo_mail_grid_left">
                    					<ul class="big">
                    						<li><i class="fa fa-home" aria-hidden="true"></i></li>
                    						<li>Address</li>
                    					</ul>
                                        <textarea placeholder="" name="address" class="" value=""  readonly>Shimulia, North 24 parganas, Media to Nahata Rode. Shimulia bazar, North 24 Parganas, West Bengal</textarea>
                                    </div>

                                    <div class="agileinfo_mail_grid_left">
                    					<ul class="big">
                    						<li><i class="fa fa-check" aria-hidden="true"></i></li>
                    						<li>Payment mode</li>
                    					</ul>
                                        <label><input type="radio" name="pay_status" value="COD" /> COD</label>
                                        <label><input type="radio"  name="pay_status" value="Online" checked /> Online</label>
                    				</div>
                    	
                                    <div class="clearfix"></div>
                                    <input type="hidden"  name="other" value="0" />
                                 
                                    <div id="showother"></div>
                                    
                                    <div class="clearfix"></div>

                                    <div class="col-md-offset-9">
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <input type="submit" class="button-Place-Order" value="Place Order" name="sub" id="submit_pay">
                                        </div>

                                    </div>
                                </form> 
                                <a href="{{ url('orders') }}">NEXT</a>                               
						    </div>
							<!-- //first section -->
						</div>
					</div>
                    </div>
				<!-- //product right -->

                  <div class="col-md-4 col-sm-4 col-xs-12">
                      <div class="flipkart-box-right">
                        <h3>Price Details </h3>
                          <div class="container-fluid" style="background-color: #ffffff;">
                            <h4 style="font-size:16px;font-weight:600;">Coupons &amp; Offers (if any)</h4>
                           
                              <div class="row" style="">
                                <div class="col-md-9" style="padding:0px;background-color: white;">
                                  <input type="text" class="form-control" placeholder="Enter Coupon Code" id="couponcode" name="code">
                                </div>
                                <div class="col-md-3" style="padding:0px">
                                  <button class="form-control" style="background-color: black;color: white;width:100%" onclick="checkcouponcode()">APPLY</button>
                                </div>
                              </div>
                        </div>
                        <hr>

                          <p>Price (5 items)<span> ₹7,246</span></p>

                            <p>Total MRP (Inclusive of all taxes)  ₹<span id="grand-mrp"> 5,929</span></p>
                            <p>Discount -₹<span style="color: #ff0000;" id="grand-discount">929</span></p>
                            <h2>Total  ₹<span id="grand-total">2,929</span></h2>
                            <p>Coupon ₹<span id="coupon">0</span></p>
                            <h2>Cart Total ₹<span id="grand-cart">2,929</span></h2>
                            <p>Shipping <span>₹48</span></p>
                            <h2>Total Payable ₹<span id="shipping_total">2,929</span></h2>
                            <img src="{{asset('images/cart-bg-right.jpg')}}" alt="" style="width:100%;">
                      </div>                      
                  </div>


			</div>
		</div>
	</div>
	<!-- //top products -->





<script>
$(document).ready(function(){
$("#submit").click(function() {
//alert('ss');    
$.ajax({
type: "POST",
url: "ajax_ship.php",
data:$('#form').serialize(),
success: function(html){
   // alert('ok');
$("#showother").html(html).show();
$("#show").hide();
$('#myModal2').modal('hide');
}
});

});
});
</script>


<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(90deg,rgb(111, 43, 0) 0%, rgb(255, 139, 0) 50%, rgb(113, 44, 0) 100%); border: 5px solid #fe8a001c;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Your Shipping Address</h4>
        </div>
        
        <div class="modal-body">
        <form class="form-horizontal" id="form" role="form" method="post">
        <div class="form-group">
            <div class="col-md-10 col-xs-offset-1">
                <label>Name *</label>
                <input type="text" class="name" name="name" placeholder="Name" style="">    
                
                <label>Phone NO *</label>
                <input type="text"  placeholder="phone No" name="phone" >              
                
                <label>Address 1 *</label>   
                <textarea class="form-control" rows="1" name="add1" placeholder="Address Line 1"></textarea>
                
                <label>Address 2 *</label>
                <textarea class="form-control" rows="1" name="add2" placeholder="Address Line 2"></textarea> 
                
                <label>Pincode *</label>
                <input type="text" class="pin" name="pin" placeholder="Pincode" pattern="[0-9]{6}" title="Please give Correct pincode">
                
                <label>City *</label>
                <input type="text" class="city" name="city" placeholder="City" style="">
                
                <label>State *</label>
                <select class="size" name="state" id="size">
                    <option value="">Select</option>
    		     </select>
            </div>
            </div>
            <div class="col-xs-offset-6">
                <div class="snipcart-details top_brand_home_details">
                    <input type="button" class="button_1" value="Update" id="submit" name="change"/> 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>  
            </div>
        </form>
         </div>
      
    </div>

  </div>
</div>



@endsection