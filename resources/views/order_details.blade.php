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
                                    <p class="hikk">{{$order->order_id}}</p>
                                </div>
                            </div>
                
                            <div class="col-md-7 col-xs-12">
                                <div class="col-md-4 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Order Placed:</label>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <p class="hikk">{{ date("l, jS F Y h:i:s A",strtotime($order->created_at)) }}</p>
                                </div>
                            </div>
                
                            <div class="col-md-5 col-xs-12">
                                <div class="col-md-4 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Pay Status:</label>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <p class="hikk">{{$order->payment_status}}</p>
                                </div>
                            </div>
                
                            <div class="col-md-7 col-xs-12">
                                <div class="col-md-4 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Payment Mode:</label>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <p class="hikk">{{$order->payment_method}}</p>
                                </div>
                            </div>
                
                            <div class="col-md-12 col-xs-12">
                                <div class="col-md-2 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Address:</label>
                                </div>
                                <div class="col-md-10 col-xs-12">
                                    <p class="hikk">{{$order->address}}</p>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>
                        <hr/>
                    @foreach($order_item as $item)            
                    <div class="row" style="background: #cecdcd29;">
                        <div class="col-md-2 col-xs-3" style="padding:0;">
                       @if($item->image)
                                <img src="{{ asset('uploads/'.$item->image) }}"
                                     class="order-ing-rj"
                                     alt="{{ $item->product_name }}">
                            @else
                                <img src="{{ asset('uploads/no-image.png') }}"
                                     class="order-ing-rj"
                                     alt="No Image">
                            @endif

                        </div>
                        <div class="col-md-10 col-xs-9">
                            <div class="order-bill">
                                <p>{{$item->product_name}}</p>
                                <p>Total Amount : <b>₹ </b>  {{$item->total}} | Qty : {{$item->qty}}</p>
                              
                               
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                            
                            Total Bill: <b>₹ </b> {{$order->total_amount}}<br>
                            Shipping Charge: <b>₹ </b> {{$order->shipping_charge}}<br>
                         @if($order->coupon!="") 
                            Coupon ({{$order->coupon_code}}) : <b>₹ </b> {{$order->coupon_discount}}<br>
                            @endif
                            Total Amt: <b>₹ </b> {{$order->total_amount+$order->shipping_charge-$order->coupon_discount}}
                            <a href="{{url('bill_final')}}" target="_blank" class="button">Print bill</a>
                                <button type="button" class="button_b" data-toggle="modal" data-target="#myModal">Cancel Order</button>
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