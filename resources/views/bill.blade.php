
<!DOCTYPE html>
<html xmlns="">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Invoice  [ bivamart ]</title>

<link href='//fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Racing+Sans+One' rel='stylesheet' type='text/css'>


<style type="text/css" media="print">
    @page { size:  auto;   /* auto is the initial value */ margin: 0mm;  /* this affects th e margin in the printer settings */}
    html{ background-color: #FFFFFF;  margin: 0px;  /* this affects the margin on the html before sending to printer */ }
    body { }
</style>
    
    
<style>
    body{font-family: 'Open Sans', sans-serif; font-size: 12px; background: #e6e6e6; padding: 0 0; margin: 0 auto; display: block;}
    .bill-page{width: 100%; padding: 0 0; margin: 0 auto; display: block;}
    .bill-page .main-table{ position: relative; margin: 3% auto; width: 80%; border: 1px solid #ffffff4f; overflow: hidden; padding: 10px 20px; background: #eee; }
    table{ border-collapse:collapse; width:100%;}
    table tr,td,th{ border:1px solid #c8bdb75e; padding:6px; text-align:center;}
    h6{text-align: center; font-size: 15px; padding: 0 10px 0 0px; margin: 20px 0; color: #00b000;}
    aside {margin: 0; transform: rotate(90deg); position: absolute; top: 87%; left: -450px; width: 80%; z-index: 99999;}
    aside h3 { font: bold 50px Sans-Serif; font-size: 60px; letter-spacing: 2px; text-transform: uppercase; background: #f4f4f400; color: #9b9393; padding: 0px 5px; margin: 0 0 10px 0; line-height: 70px; transform-origin: 0 0; width: 100%; font-weight: lighter; font-family: revert; }
    aside h3 span{ color: red;}
    /*table.top*/
    table.top-deteals{ width: 100%; position: relative; background: #ffffffe8; padding: 10px 15px; display: block; border: 0.5px solid #fff; }
    table.top-deteals tr { border: none; }  
    table.top-deteals tr td{ border: 0.5px solid #6b3d258f; }      
    table.top-deteals tr td h4{ text-align: left; font-size: 30px; line-height: 40px; padding: 0 0 5px; margin: 0; color: #d07d0e;width: 65%;float: right;text-transform: uppercase;}
    table.top-deteals tr td p{ padding: 0; margin: 0; text-align: left; font-size: 15px; line-height: 25px; color: #220d01; font-family: revert;width: 65%;float: right;}
    table.top-deteals tr td img{ width: 30%; background: #fff; padding: 0; float: left; height: auto; margin: 60px auto 0; }
    table.top-deteals tr td h5{ padding: 0; margin: 0; text-align: center; font-size: 15px; line-height: 25px; color: #552005de; font-family: revert;width: 50%;float: left;}
    /*Customer-Details*/
    table.Customer-Details{ width: 100%; position: relative; background: #ffffffe8; padding: 10px 15px; display: block; border: 0.5px solid #fff; }
    table.Customer-Details tr { border: none; }  
    table.Customer-Details tr td {   border: 0.5px solid #6b3d258f;width: 30%;}   
    table.Customer-Details tr td h2{ font-weight: bold; text-align: left; font-size: 20px; line-height: 25px; padding: 0 0 5px; margin: 0; color: #481f04; }   
    table.Customer-Details tr td p{ padding: 0; margin: 0; text-align: left; font-size: 16px; line-height: 30px; color: #220d01; font-family: revert;}   
    /*table.instructions-deteals*/    
    table.product-deteals{ width: 100%; background: #FFF; } 
    table.product-deteals tr th{ background: #e6e6e6; color: #481d03; font-size: 14px; line-height: 22px; }  
    table.product-deteals tr td{ color: #000; font-size: 14px; line-height: 22px; padding: 10px 0; margin: 0; text-align: center; }     
    table.product-deteals tr td b{display: block; display: none;  font-weight: normal; color: #646464; font-size: 13px;}
    /*table.heigh*/    
    table.heigh{ border-top:none; text-align:center; background: #fff;}
    table.heigh tr:last-child td{ padding-bottom:1em;}
    table.heigh .left-border{  width: 89%; text-align: right; font-size: 15px; font-weight: bold;color: #481d03;}
    table.heigh tr td{ font-size: 15px; color: #000; }
    /*butom-deteals*/
    table.butom-deteals{ width: 100%; position: relative; background: #ffffffe8; padding: 10px 15px; display: block; border: 0.5px solid #fff; }
    table.butom-deteals tbody{}
    table.butom-deteals tr { border: none; }  
    table.butom-deteals tr td{ border: 0.5px solid #6b3d258f; }      
    table.butom-deteals tr td h4{ text-align: left; font-size: 20px; line-height: 40px; padding: 0 0 5px; margin: 0; color: #d07d0e;text-transform: uppercase;}
    table.butom-deteals tr td p{ padding: 0; margin: 0; text-align: left; font-size: 15px; line-height: 25px; color: #220d01; font-family: revert;}
    table.butom-deteals tr td h5{ padding: 0; margin: 0; text-align: center; font-size: 15px; line-height: 25px; color: #552005de; font-family: revert; }
   table.butom-deteals tr td p b{padding: 0; width: 20%; float: left; margin: 0 5px 0; }


    /*print*/
    .print{padding: 8px 15px; margin: 0 auto; background: #00cf00; Color: #fff; border-radius: 30px; border: none; font-size: 15px; font-weight: bold; box-shadow: 0px 5px 11px 0px rgba(35, 35, 35, 0.36); cursor: pointer; }
    .print:hover{ background: red; }   
    .no-print{ margin:2em 0;}
    @media print
    {    
        .no-print, .no-print *
        {
            display: none !important;
        }
        .main-table table{    margin: 0% auto; width: 99%; border: 1px solid #d0d0d0;  }
        table.Customer-Details tr td p {text-align: left; font-size: 13px; line-height: 25px; }
        aside {margin: 0; transform: rotate(90deg); position: absolute; top: 50%; left: -20px; width: 80%; z-index: 99999;}
        aside h3 { font: bold 50px Sans-Serif; font-size: 50px; letter-spacing: 2px; text-transform: uppercase; background: #f4f4f400; color: #9b9393; padding: 0px 5px; margin: 0 0 10px 0; line-height: 70px; transform-origin: 0 0; width: 100%; font-weight: lighter; font-family: revert; }
        table.instructions-deteals{ padding: 5px 5px;}
        table.top-deteals tr td p {font-size: 12px; line-height: 20px;}
        table.date-deteals{ padding: 5px 5px;}
        table.top-deteals{ padding: 5px 5px;}
        table.top-deteals tr td h4 { text-align: left; font-size: 16px; line-height: 30px;}
        table.top-deteals tr td { border: 0.5px solid #6b3d258f;}
        table.butom-deteals tr td p { padding: 0; margin: 0; text-align: left; font-size: 12px; line-height: 20px;}
        table.butom-deteals tr td p b { padding: 0; width: auto;}
        table.top-deteals tr td h5 { text-align: center; font-size: 12px;}
        table.butom-deteals tr td h4 { text-align: left; font-size: 16px; line-height: 20px;}
        table.Customer-Details tr td h2 { font-weight: bold; text-align: left; font-size: 16px; line-height: 20px;}
        table.butom-deteals tr td h5 { padding: 0; margin: 0; text-align: center; font-size: 10px; line-height: 15px;}
        table.top-deteals tr { border: none; }
        table.butom-deteals tr td { border: none; }
        table.Customer-Details tr td { border: none; }
        table.top-deteals tr td { border: none; }
    }
</style>



</head>
<body>
@php
function amountToWords($num) {

    $ones = array(
        0 => "", 1 => "One", 2 => "Two", 3 => "Three", 4 => "Four",
        5 => "Five", 6 => "Six", 7 => "Seven", 8 => "Eight", 9 => "Nine",
        10 => "Ten", 11 => "Eleven", 12 => "Twelve", 13 => "Thirteen",
        14 => "Fourteen", 15 => "Fifteen", 16 => "Sixteen",
        17 => "Seventeen", 18 => "Eighteen", 19 => "Nineteen"
    );

    $tens = array(
        2 => "Twenty", 3 => "Thirty", 4 => "Forty", 5 => "Fifty",
        6 => "Sixty", 7 => "Seventy", 8 => "Eighty", 9 => "Ninety"
    );

    if ($num < 20) {
        return $ones[$num];
    }

    if ($num < 100) {
        return $tens[floor($num / 10)] . " " . $ones[$num % 10];
    }

    if ($num < 1000) {
        return $ones[floor($num / 100)] . " Hundred " . amountToWords($num % 100)." only";
    }

    if ($num < 100000) {
        return amountToWords(floor($num / 1000)) . " Thousand " . amountToWords($num % 1000);
    }

    if ($num < 10000000) {
        return amountToWords(floor($num / 100000)) . " Lakh " . amountToWords($num % 100000);
    }

    return amountToWords(floor($num / 10000000)) . " Crore " . amountToWords($num % 10000000);
}
@endphp
<div class='bill-page about' style=''>
    <div class="main-table">
        
<!--         <aside>  <h3>Invoice Number : <span>#852RI-P789FW</span></h3> </aside>         -->

            <h4>TAX INVOICE <b>ORIGINAL FOR RECIPIENT</b></h4>
            <table class="top-deteals">
                <tr>  
                    <td width="60%" class="text-left">
                        <img src="{{asset('images/BivaMart-Logo.png')}}" alt="logo" style="">
                        <h4><b>Biva Publication</b></h4>
                        <p>T32, Tegharia Main Road, Kolkata 157, Near
                        Tegharia Sporting Club, North 24 Parganas,
                        West Bengal, 700157</p>
                        <p>Mobile: 9434343446</p>
                        <p>Email: biva.publications@gmail.com</p>
                        <p>Website: wwww.bivamart.in </p>
                    </td>                 
                    <td width="40%" class="text-center">
                        <h5>Invoice No:<br> <b>{{ request('order') }}</b></h5>
                        <h5>Invoice Date:<br> <b>{{ date("d/m/Y h:i:s A",strtotime($order->created_at)) }}</b></h5>
                    </td>
                </tr>                
            </table>

            <table class="Customer-Details">
                <tr>  
                    <td>
                        <h2>BILL TO</h2>
                        <p>{{$order->shipping_name}}</p>
                        <p><b>Mob No :</b> {{$order->shipping_phone}}</p>
                        <p><b>E-Mail :</b>  {{$user->email}}</p>
                        <p><b>Address:</b>  {{$order->shipping_address}}, {{$order->shipping_landmark}}, {{$order->shipping_city}}, {{$order->shipping_state}}, {{$order->shipping_pincode}}</p>
                  </td>                   
                </tr>                
            </table>  
            
            <table class="product-deteals" style="">
                <tr>
                    <th>S.NO. </th>   
                    <th>ITEMS </th>   
                    <th>BATCH NO. </th>   
                    <th>QTY. </th>   
                    <th>MRP </th>   
                    <th>RATE </th>   
                    <th  style="color: #00c10c;">DISC. </th>   
                    <th>AMOUNT</th>                
                </tr>     
             @php $count=1;  $totalDiscount = 0;  @endphp

             @foreach($order_item as $item)  
              
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$item->product_details->title}}</td> 
                    <td>{{$item->product_details->edition}}</td> 
                    <td> {{$item->qty}} </td> 
                    <td>{{$item->product_details->price}} </td> 
                    <td>{{$item->price}}</td> 
                    <td> {{$item->product_details->price-$item->product_details->discounted_price}}<b>({{$item->product_details->discount}}%)</b></td> 
                    <td>{{$item->price}}</td>                
                </tr>  
                    @php ++$count; @endphp

                @endforeach              
            </table>

            <table class="heigh">
                <tr>
                    <td class="left-border">Item Total <b>:</b></td>
                    <td width='12%'><b>₹ </b>{{$order->total_amount}}</td>
                </tr>
                  <tr>
                    <td class="left-border">Shipping <b>:</b></td>
                    <td width='12%'><b>₹ </b>{{$order->shipping_charge}}</td>
                </tr>
                  @if($order->coupon!="") 
                <tr>
                    <td class="left-border">Coupon ({{$order->coupon_code}})<b>:</b></td>
                    <td width='12%'><b>₹ </b>{{$order->coupon_discount}}</td>
                 </tr>
                 @endif
                <tr>
                    <td class="left-border">QTY </td>
                    <td width='12%'>{{$count-1}}</td>
                </tr> 
             <!---
                <tr>
<<<<<<< HEAD
                    <td class="left-border">DISC </td>
                    <td width='12%'><b>₹ </b> {{$order->total_discount}}</td>
                </tr> 
                --->                
=======
                    <td class="left-border" style="color: #00c10c;">DISC </td>
                    <td width='12%' style="color: #00c10c;"><b>-  </b>₹  {{$order->total_discount}}</td>
                </tr>                 
>>>>>>> 420f95961e0c79833b370e9a4133316cc347f4cd
                <tr>
                    <td class="left-border">Total Amount Paid (INR) </td>
                    <td width='12%'><b>₹ </b> {{$order->total_amount+$order->shipping_charge-$order->coupon_discount}}</td>
                </tr>             
            </table>


            <table class="Customer-Details">
                <tr>  
                    <td style="border: none;">
                        <h2>Total Amount (in words)</h2>
                        <p>₹ {{$order->total_amount+$order->shipping_charge-$order->coupon_discount}}<b> {{ amountToWords($order->total_amount+$order->shipping_charge-$order->coupon_discount) }}</b> </p>
                    </td>                   
                </tr>                
            </table> 

            <table class="butom-deteals">
                <tbody>
                    <tr>  
                        <td width="70%" class="text-left">
                            <h4>Bank Details</h4>
                            <p><b>Name: </b>BIVA PUBLICATION</p>
                            <p><b>IFSC Code:</b> SBIN0000165</p>
                            <p><b>Account No:</b> 33793950192</p>
                            <p><b>Bank:</b> State Bank of India ,RAMPURHAT </p>
                        </td>                 
                        <td width="30%" class="text-center">
                            <h5>Authorised Signatory For <b>Biva Publication</b></h5>
                        </td>
                    </tr>   
                </tbody>             
            </table>

            <div>
                <h6>Thank you for your business !</h6>
            </div>
        

            <div class="no-print" align="center">
                <button onclick="myFunction()" class="print">Print this page</button>
                <div>
                
                    <script>
                    function myFunction() {
                        window.print();
                    }
                    </script>
                    
                </div>
            </div>
            

            
    </div>
</div>

</body>
</html>
