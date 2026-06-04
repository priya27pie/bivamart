@extends('layouts.main')
@section('middle')
<style>
    /*.header-bottom{display: none;}*/
</style>

<!-- terms Start -->
<div class="cart_empty success">
    <br>
    <div class="title-home" data-aos="fade-down" style="transition:all 1300ms ease-in-out;">
        <h2>Success<span>  Payment done</span></h2>
    </div>
    <div class="container">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xm-12" style="text-align: center;">
            <div class="mail">
                <div class="agileinfo_mail_grids" style="border:1px solid #cccccc40; padding:2em;">
                           
                  <img src="{{asset('images/success.png')}}" alt="" class="inner-success-img">
                  <h3>Thank You. Your order status is .</h3>
                  <h5>Your Transaction ID for this transaction is .</h5>
                  <h5>We have received a payment of Rs. . Your order will soon be shipped.Continue Shopping
                  <a href="index.php">Home</a>
                  </h5>


                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection