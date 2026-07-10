@extends('layouts.main')
@section('middle')



<div class="reviews-container">
        <!-- tittle heading -->
    <div class="inner-title">
        <h2>Given Reviews</h2>
        <h3>Reviews</h3>
    </div>
        <div class="container">  
            <div class="w3_login_module1">
                <div class="module form-module" style="max-width:100% !important; margin-top:0;">
                    <div class="form">
                        <form method="post">
                            <span class="RatingGive">Rating - </span>
                            <div class="rate">
                                <input type="radio" id="star5" name="rating" value="5" required="">
                                <label for="star5" title="text">5 stars</label>
                                
                                <input type="radio" id="star4" name="rating" value="4" required="">
                                <label for="star4" title="text">4 stars</label>
                                
                                <input type="radio" id="star3" name="rating" value="3" required="">
                                <label for="star3" title="text">3 stars</label>
                                
                                <input type="radio" id="star2" name="rating" value="2" required="">
                                <label for="star2" title="text">2 stars</label>
                                
                                <input type="radio" id="star1" name="rating" value="1" required="">
                                <label for="star1" title="text">1 star</label>
                              </div>
                            <input type="text" name="name" readonly="" value="Raaj Majumdar" placeholder="Name *">
                            <input type="text" name="phone" readonly="" value="8640877364" placeholder="Phone *"> 
                            <input type="text" name="email" readonly="" value="babulmajumdar02@gmail.com" placeholder="Email *"> 
                            <input type="hidden" name="uid" value="USR331"> 
                            <input type="hidden" name="product_id" value="PID371">  
                            <textarea name="review" required="" placeholder="Share your experience with us *"></textarea>
                            <input type="submit" name="rev" value="Post your Review" class="btn btn-success">
                        </form> 
                        
                        
                    </div>
                </div>
            </div>
        </div>

</div>


<style>
.w3_login_module1 { position: relative; width: 35%; overflow: hidden; background: #4b6e74; border-radius: 20px; text-align: center; -webkit-box-shadow: 1px 0px 50px 3px rgba(0, 0, 0, 0.07); margin: 20px auto 100px; }
.w3_login_module1 form { padding: 25px 14px; border-radius: 10px; display: inline-block; margin: 0; }
.w3_login_module1 form .btn-success{box-shadow: 0px 20px 20px -15px rgba(0, 0, 0, 0.5); display: inline-block; transition: all 500ms ease-in-out; vertical-align: middle; padding: 12px 0; border: 0px solid #ffffff; border-radius: 100px; background: linear-gradient(to top, #4b6e7466, #fff); color: #000; text-transform: uppercase; margin: 15px 0 5px 0; font-size: 13px; width: 50%; text-align: center; font-weight: bold; letter-spacing: 1px;}
.w3_login_module1 form .btn-success:hover{background: #72959b;
  color: #fff;}
.w3_login_module1 form textarea, .w3_login_module1 form input[type="email"], .w3_login_module1 form input[type="text"]{border: none; border-bottom: 5px solid #203639; width: 90%; margin: 5px; padding: 10px 20px; border-radius: 6px; color: #2a4d53; font-size: 15px; background: #ffffffe8;}
.w3_login_module1 form input[type="text"]:hover {  border-bottom: 5px solid #203639;  background: #fff;}
.w3_login_module1 form input[type="Email"]:hover {  border-bottom: 5px solid #203639;  background: #fff;}
.w3_login_module1 form textarea:hover {  border-bottom: 5px solid #203639;  background: #fff;}
.rate span{width: 50%; float: left; text-align: left; font-family: 'Croissant One', cursive; font-size: 16px; line-height: 45px; padding: 0 0 0 20px; color: #5b0507e3;}
span.RatingGive{text-align: left; font-size: 20px; line-height: 45px; padding: 0; color: #fff; position: absolute; left: 35px; top: 30px; font-family: "Abel-Regular";}
.rate{display: inline-block; position: relative; width: 90%; padding: 0 0; margin: 0;}
.rate:not(:checked) > input { position:absolute; top:-9999px; }
/*.rate:not(:checked) > label {*/
/*    float: right;*/
/*    width:1em;*/
/*    overflow:hidden;*/
/*    white-space:nowrap;*/
/*    cursor:pointer;*/
/*    font-size:30px;*/
/*    color:#ccc;*/
/*}*/
.rate:not(:checked) > label { float: right;
  width: 40px;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 20px;
  color: #eff2f2;
  margin: 10px 10px 0 0px; }
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
.rate input {
    display: none;
}

.rate label {
    float: right;
    cursor: pointer;
}
</style>




<!-- Fotter Inculide -->
@endsection
<!-- // Fotter Inculide -->