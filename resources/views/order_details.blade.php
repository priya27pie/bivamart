@extends('layouts.main')
@section('middle')

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Sorry Not found',
    text: "{{ session('error') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
@if(session('success'))
<script>
Swal.fire({
    icon: 'Success',
    title: 'Your order has been cancelled.',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif 
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
                
                            <div class="col-md-5 col-xs-12">
                                <div class="col-md-4 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Address:</label>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <p class="hikk">{{$order->shipping_address}}, {{$order->shipping_landmark}}, {{$order->shipping_city}}, {{$order->shipping_state}}, {{$order->shipping_pincode}}</p>
                                </div>
                            </div>
                            <div class="col-md-7 col-xs-12">
                                <div class="col-md-4 col-xs-12" style="padding: 0;">
                                    <label class="hikk">Order Status:</label>
                                </div>
                                <div class="col-md-8 col-xs-12">
                                    <p class="hikk">{{$order->status}}</p>
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
                         
                    <div class="row">
                        <div class="col-md-12 order-bill">
                            <p>Total Bill: <b>₹ </b> {{$order->total_amount}}</p>
                            <p>Shipping Charge: <b>₹ </b> {{$order->shipping_charge}}</p>
                            @if($order->coupon!="") 
                            <p>Coupon ({{$order->coupon_code}}) : <b>₹ </b> {{$order->coupon_discount}}</p>
                            @endif
                            <p>Total Amt: <b>₹ </b> {{$order->total_amount+$order->shipping_charge-$order->coupon_discount}}</p>
                            @if($order->status != 'Cancelled')
                            <a href="{{ url('bill/'.$order->order_id)}}" target="_blank" class="button">Print bill</a>
                            @endif
                            @if(in_array($order->status, ['Pending','Confirmed','Packed']))
                            <button type="button" class="button_b" data-toggle="modal" data-target="#myModal">
                            Cancel Order
                            </button>
                            @endif
                            @if($order->status == 'Cancelled')
                            <div class="col-md-12">
                            <label>Cancellation Reason:</label>
                            <p>{{ $order->cancel_reason }}</p>

                            <label>Cancelled On:</label>
                            <p>{{ date('d M Y h:i A', strtotime($order->cancelled_at)) }}</p>
                            </div>
                            @endif
                        </div>
                    </div>   

                    </div>
                <!-- //first section -->
                </div>
            </div>
        </div>
        <!-- //product right -->
    </div>
</div>
		
		
@endsection		
		
		
 	
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form method="post" action="{{route('submit.CancelOrder')}}">
                 {{csrf_field()}}

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
            <option value="Product is not required anymore">Product is not required anymore.</option>
            <option value="Cheaper alternative available for lesser price">Cheaper alternative available for lesser price.</option>
            <option value="Others">Others</option>
        </select>
        <input type="text" name="order_id" value="{{$order->order_id}}" >  
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
/*.fade:not(.show) {
  opacity: 1;
}*/
.modal-footer input.button_1 { font-size: 14px; color: #fff; background: #f00; text-decoration: none; position: relative; border: none; border-radius: 0; width: 20%; text-transform: uppercase; padding: .5em 0; outline: none; }
</style>		
	
