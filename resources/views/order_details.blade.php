@extends('layouts.main')
@section('middle')


<div class="inner-profile">
  <img src="{{asset('images/profile-banner.png')}}" alt="" class="inner-banner-img">
  <p  data-aos="zoom-in" style="transition:all 1500ms ease-in-out;">Order Details</p>
   <div class="particle-network-animation"></div>
</div>

<!-- Order Details -->
<div class="ads-grid">
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Order Details <span> Check Out </span></h2>
    </div>
    <div class="container">
        <div class="row">
            <!-- product left -->

            <!-- //product left -->
            
                <!-- product right -->
            <div class="agileinfo-ads-display w3l-rightpro col-md-10 offset-md-1">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="profile-banner">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <h4>Order Details</h4>
                            </div>               
                
                            <div class="col-md-5 col-xs-12">
                                <div class="col-md-4 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Order No:</label>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <p class="hikk">#999ASWQ</p>
                                </div>
                            </div>
                
                            <div class="col-md-7 col-xs-12">
                                <div class="col-md-4 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Order Placed:</label>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <p class="hikk">Thursday ,1st January 2026 12:00:00 AM</p>
                                </div>
                            </div>
                
                            <div class="col-md-5 col-xs-12">
                                <div class="col-md-4 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Status:</label>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <p class="hikk">Pending</p>
                                </div>
                            </div>
                
                            <div class="col-md-7 col-xs-12">
                                <div class="col-md-4 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Payment Mode:</label>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <p class="hikk">COD</p>
                                </div>
                            </div>
                
                            <div class="col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Address:</label>
                                </div>
                                <div class="col-md-10 col-xs-12">
                                    <p class="hikk">All Shimulia, North 24 parganas, Media to Nahata Rode. Shimulia bazar, North 24 Parganas, West Bengal</p>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>
                        <hr/>
                
                    <div class="row" style="background: #cecdcd29;">
                        <div class="col-md-2 col-xs-3" style="padding:0;">
                        	<img src="{{asset('images/Trending1.png')}}"  class="order-ing-rj" alt="order" style="">
                        </div>
                        <div class="col-md-10 col-xs-9">
                            <div class="order-bill">
                                <p><strong>Book Name </strong>: Tin tirrike bhol... </p>
                                <p>Total Amount : Rs 999 | Qty : 2</p>
                                <a href="{{url('bill_final')}}" target="_blank" class="button">Print bill</a>
                                <button type="button" class="button_b" data-toggle="modal" data-target="#myModal">Cancel Order</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    </div>
                <!-- //first section -->
                </div>
            </div>
        </div>
        <!-- //product right -->
    </div>
</div>
		
		
		
		
		
		
		
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form method="post">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Reason For Cancellation</h4>
      </div>
      <div class="modal-body" style="text-align: center;">
        <label>Choose Why do you want to cancel?</label>
        <br>
        <select name="reason" required>
            <option value="">Choose</option>
            <option value="Ordered by mistake">Ordered by mistake</option>
            <option value="Book is not required anymore.">Book is not required anymore.</option>
            <option value="Cheaper alternative available for lesser price.">Cheaper alternative available for lesser price.</option>
            <option value="Others">Others</option>
        </select>
        <input type="hidden" name="order_id" value="" >  
        <input type="hidden" name="url" value="" >  
   
      </div>
      <div class="modal-footer" style="text-align: center;">
        <input type="submit" name="sub" value="Cancel" class="button_1">  
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
 </form>
  </div>
</div>
		
<style>
.modal-header { padding: 15px; border-bottom: 1px solid #e5e5e5; }
.modal-header { font-family: 'Oswald', sans-serif; padding: 15px; background: linear-gradient(90deg,rgb(111, 43, 0) 0%, rgb(255, 139, 0) 50%, rgb(113, 44, 0) 100%); border: 5px solid #fe8a001c; }
h4.modal-title { font-family: 'Oswald', sans-serif; font-size: 22px; text-align: center; color: #fff; }
.modal-footer input.button_1:hover { background: #f68b1f; }
.modal-footer input.button_1 { font-size: 14px; color: #fff; background: #f00; text-decoration: none; position: relative; border: none; border-radius: 0; width: 20%; text-transform: uppercase; padding: .5em 0; outline: none; }
</style>		
	
@endsection