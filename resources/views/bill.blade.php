<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bill</title>
<style type="text/css" media="print">
    @page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 0px;  /* this affects the margin on the html before sending to printer */
        
    }

    body
    {
       
    }
    </style>
<style>
body{font-family: "Kanit", sans-serif; font-size:14px;}
table{ border-collapse:collapse; width:100%;}
table tr,td,th{ border:1px solid #270061; padding:6px;}
div.table{margin: 60px auto;
  width: 75%;}
.left-border{
    border-left: 1px solid #270061;}
table.top tr:nth-child(1) p { margin-top: 0px !important;
margin-bottom: 0px !important; text-align:left;}
table.top tr:nth-child(2){ border-bottom:none;}
table.top tr:nth-child(3){border-top:none; border-bottom:none;}
table.top tr:nth-child(4){border-top:none;}
table.top tr:nth-child(2) td{text-align:left;}
table.top tr:nth-child(3) td{text-align:left;}
table.top tr:nth-child(4) td{text-align:left;}
label{
    font-weight:bold;}
.no{border:none;}
table.no tr th{
    border:none;}
.heigh{
    border-top:none;
    text-align:center;
    }
    table.heigh tr:last-child td{ padding-bottom:1em;}
    table.heigh tr,td{}
    table.top{border:1px solid #270061;}
    table.top tr,td{ border:none;}
    table.bottom td{ text-align:left; border:none;}
    table.bottom tr:nth-child(1){ border-bottom:none;}
    table.bottom tr:nth-child(2){ border-bottom:none; border-top:none;}
    table.bottom tr:nth-child(3){ border-top:none;}
    table.bottom tr:nth-child(4) td{ padding-top:5em; padding-bottom:2em;}
    .text-center{ text-align:center !important;}
    .text-right{ text-align:right !important;}
.print{padding: 7px 15px;
  margin: 0 auto;
  Color: #fff;
  background: #480057;
  Color: #fff;
  border: none;
  box-shadow: 2px 2px 5px #320a537a; }
.no-print{ margin:2em 0;}
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
<!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

</head>
<body>

<div class='privacy about' style='padding:0 5em 5em 2em;'> 
    <a href="/order_details" class="btn btn-primary">My Orders</a></td>
<div class="table">
<table class="top">

<tr>

<td colspan="4" class="text-center" style="border-bottom: 1px solid #270061;
  background: #270061;
  color: #fff;
  font-size: 16px;;"><label>Thank you for shopping with us !!</label></td>
</tr>
<tr>
<td width="20%">
<p><b><h2 style="font-size: 30px;
  color: #270061;">Bivamart</h2></b></p>
<h4>Address</h4>
<p>T32 Teghoria Main Road, Near Teghoria Sporting Club,</p>
<p>Kolkata,700157, WB</p>
<p>Email : biva.publications@gmail.com</p>
<p>Phone : +91-9434343446</p>
</td>

<!-- <td width="40%"><h2 class="text-center">FashionTradet</h2></td> -->
<td width="30%" class="text-right"><img src="{{asset('images/BivaMart-Logo.png')}}" width="45%" /></td></tr>
</table>
<style>
table.new-table{
    border:1px solid #270061;}
table.new-table tr th{
    border:1px solid #270061;}
    table.new-table tr{
    border:none;}
    table.new-table tr td.no-left{
        border-right:1px solid #270061;
        }
</style>
<table width="100%" class="new-table">

<tr>
    <th colspan="2" class="text-center">Billed To</th>
    <th colspan="2" class="text-center">Ship To</th>
    <th colspan="2" class="text-right">Bivamart</th>
    </tr>
    <tr>
        <td colspan="2" rowspan="2" class="no-left">
        <p><label>Name</label>: ABC</p>
        <p><label>Address</label>: Teghoria, Rc-1/2</p>
        <p><label>State</label>: West Bengal</p>
        <p><label>Pincode</label>: 700059</p>
        <p><label>Contact</label>: 9874615676</p>
        </td>
        <td colspan="2" rowspan="2" class="no-left">
           <p><label>Name</label>: ABC</p>
        <p><label>Address</label>: Teghoria, Rc-1/2</p>
        <p><label>State</label>: West Bengal</p>
        <p><label>Pincode</label>: 700059</p>
        <p><label>Contact</label>: 9874615676</p>
        </td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2" class="text-right">
        <p></p>
<p>Rs  {{$order->total_amount+$order->shipping_charge}}</p>
        <p>Invoice ID {{$order->order_id}}</p>
        <p>Invoice Date {{ $order->created_at->format('d-m-Y g.ia') }}</p>
        <p>Amount Due(INR) Rs {{$order->total_amount+$order->shipping_charge}}</p>
        </td>
    </tr>
    <tr>
        <td colspan="6" style="border:1px solid #270061;">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="6" style="border:1px solid #270061;"><h2 class="text-center">Order Id: {{$order->order_id}}</h2></td>
    </tr>
</table>
<table class="no">
    <tr><th width="14%">SL No</th>
<th width="30%">Item</th>
<th width="14%">Quantity</th>

<th width="14%">Unit Cost</th>
<th width="14%">Line Total</th>
</tr>
</table>
<table class="heigh">
    
    
<tr>
<td style="width:14%;">1</td>
<td style="width:30%;">Kaligunin</td>
<td style="width:14%;">1</td>
<td style="width:14%;">230</td>
<td style="width:14%;">230</td></tr>


<tr>
<td width="40%" colspan="2" rowspan="5"><p></p>
  <p></p></td>
<td width="10%" class="left-border"> </td>
<td width="10%">&nbsp;</td>
<td width="10%">&nbsp;</td>

<td width="1%"></td>
</tr>
<tr>
  
  <td>&nbsp;</td>
  <td width="10%">&nbsp;</td>
  <td></td>
</tr>
<tr>
  <td class="left-border">Total</td>
  <td>&nbsp;</td>
  <td width="10%">&nbsp;</td>
  <td>400</td>
</tr>
<tr>
  <td class="left-border">
    <label>ORDER TOTAL(INR)</label>
  </td>
  <td>&nbsp;</td>
  <td width="10%">&nbsp;</td>
  <td>400</td>
</tr>
<tr>
    <td colspan="6">Happy to assist you 24*7 - 00000 00000</td>
</tr>
<tr>
    <td colspan="6">To provide feedback please write to <b>aaaa</b></td>
</tr>

</table>
<!--<table class="bottom">
<tr><td>Total Amount in Dollar $</td><td width="15%" class="text-center">aaaaaa</td></tr>

<tr><td>Point Balance Discount</td><td width="15%" class="text-center">aaaaaaa</td></tr>
<tr><td><hr />Total Payable(In Words) :  aaaaaa</td><td width="15%" class="text-center"><hr />aaaaaaa</td></tr>

<tr><td><hr />Total Payable(In Words) : aaaaa</td><td width="15%" class="text-center"><hr />aaaaaaaa</td></tr>
<tr><td></td><td class="text-center"><hr />Royal-kart.com</td></tr>
</table>-->
<div class="no-print" align="center">
<button onclick="myFunction()" class="print">Print this page</button>
<div>
<script>
function myFunction() {
    window.print();
}
</script>
</div>
</body>
</html>
