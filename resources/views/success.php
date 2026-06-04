<?php

include('header.php');

?>

	<!-- top Products -->
	<div class="ads-grid" style="background: #FFF; padding: 40px 0;">
		<div class="container">
			<div class="row">
      <!-- tittle heading -->
            <div class="spec ">
                <h3>Success</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
      <!-- //tittle heading -->
				<!-- product left -->
					<?php include('user_profile.php');?>
				<!-- //product left -->

                <!-- product right -->
                <div class="col-md-9">
                    <div class="mail">
    			        <div class="agileinfo_mail_grids" style="border:1px solid #ccc; padding:2em;">
                           

<?php

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt=$merchant_salt;
If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
            if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		     echo "<h3>Thank You. Your order status is ". $status .".</h3><br>";
          echo "<h5>Your Transaction ID for this transaction is ".$txnid.".</h5>";
          echo "<h5>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.Continue Shopping <a href='index.php'>Home</a></h5>";
           
           $sq="update place_order set txnid='".$txnid."',txn_status='".$status."' where order_id='".$productinfo."'";
           $r=$con->prepare($sq);
	
		 if($r->execute()){
		    
		unset($_SESSION["cart_item"]);
		unset($_SESSION["total"]);  
             
	$email_subject = "Order Details";
    $em='<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	$email_content1="
<html><head>
	<style>
	h2{
	color:#000;
font-size:26px;
	}
	#b{
	width:500px;
	font-size:15px;


	}
	th{
	background-color:#fff;
	}
	body, td, input, textarea, select {
    font-family:'Podkova', serif;
    margin: 0;
}
	</style>
	</head>
	
	<body>



	<table style='border: 40px solid #2bae1c;' width='800px'>

<tr><td style='text-align:justify;'>

	<h3>Welcome to $company_name,</h3></td></tr>

	<tr><td  style='text-align:justify;padding:12px;font-size:18px;'><br>Hi Admin,<br><br>
	You have got a mail from :<br><br>
	Name : ".$_SESSION['login_user']."<br>
	Email : ".$email."<br>
	Phone1 : ".$_POST['phn']."<br>
	Address : ".$address."<br>
		BILL :<a href='http://".$_SERVER['HTTP_HOST']."$dir1/bill_final.php?user=".$user."&order=".$productinfo."'>Print</a>
		<br>
<br><br><br><br>	
Thanks & Regards,<br>


$company_name,<br>
Web : $website/<br>
Email : $email<br>

<br>



<br>


</td></tr>
</tr>

</table>



</body></html>";
$email_content="
<html><head>
	<style>
	h2{
	color:#000;
font-size:26px;
	}
	#b{
	width:500px;
	font-size:15px;


	}
	th{
	background-color:#fff;
	}
	body, td, input, textarea, select {
    font-family:'Podkova', serif;
    margin: 0;
}
	</style>
	</head>
	
	<body>



	<table style='border: 40px solid #2bae1c;' width='800px'>

<tr><td style='text-align:justify;'>

	<h3>Welcome to $company_name </h3></td></tr>

	<tr><td  style='text-align:justify;padding:12px;font-size:18px;'><br>Hi ".$user.",<br><br>
	Your Details of the order purchased :<br><br>
	
		BILL :<a href='http://yadass.com/bill_final.php?user=".$user."&order=".$productinfo."'>Print</a>
		<br>
<br><br><br><br>	
Thanks & Regards,<br>


$company_name,<br>
Web : $website/<br>
Email : $email<br>


<br>



<br>


</td></tr>
</tr>

</table>



</body></html>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	  
	if(@mail($email,$email_subject,$email_content1,$headers) && @mail($user,$email_subject,$email_content,$headers)) {
		echo "<script>alert('Message sent!')</script>";
	//	echo "<script>window.location.href='bill.php'</script>";

		
	} else {
		echo "<script>alert('Message  not sent!')</script>";
	}
	
	
	      
        
        
        
         }   
         }
	   else {
           	   
          echo "<h3>Thank You. Your order status is ". $status .".</h3><br>";
          echo "<h5>Your Transaction ID for this transaction is ".$txnid.".</h5>";
          echo "<h5>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.Continue Shopping <a href='index.php'>Home</a></h5>";
           
          $sq="update place_order set txid='".$txnid."',status='".$status."' where order_id='".$productinfo."'";
           $r=$con->prepare($sq);
	
		 if($r->execute()){
		    
		unset($_SESSION["cart_item"]);
		unset($_SESSION["total"]);  
             
       $my_mail="support@yadass.com";
	$email_subject = "Order Details";
$em='<html><head>';
	$email_content1="
<html><head>
	<style>
	h2{
	color:#000;
font-size:26px;
	}
	#b{
	width:500px;
	font-size:15px;


	}
	th{
	background-color:#fff;
	}
	body, td, input, textarea, select {
    font-family:'Podkova', serif;
    margin: 0;
}
	</style>
	</head>
	
	<body>



	<table style='border: 40px solid #2bae1c;' width='800px'>

<tr><td style='text-align:justify;'>

	<h3>Welcome to Yadass.com,</h3></td></tr>

	<tr><td  style='text-align:justify;padding:12px;font-size:18px;'><br>Hi Admin,<br><br>
	You have got a mail from :<br><br>
	Name : ".$_SESSION['login_user']."<br>
	Email : ".$email."<br>
	Phone1 : ".$_POST['phn']."<br>
	Address : ".$address."<br>
		BILL :<a href='http://yadass.com/bill_final.php?user=".$user."&order=".$productinfo."'>Print</a>
		<br>
<br><br><br><br>	
Thanks & Regards,<br>



Yadass,<br>
Web : https://yadass.com<br>
Email :support@yadass.com<br>
Phone :1234567890

<br>



<br>


</td></tr>
</tr>

</table>



</body></html>";
$email_content="
<html><head>
	<style>
	h2{
	color:#000;
font-size:26px;
	}
	#b{
	width:500px;
	font-size:15px;


	}
	th{
	background-color:#fff;
	}
	body, td, input, textarea, select {
    font-family:'Podkova', serif;
    margin: 0;
}
	</style>
	</head>
	
	<body>



	<table style='border: 40px solid #2bae1c;' width='800px'>

<tr><td style='text-align:justify;'>

	<h3>Welcome to Yadass </h3></td></tr>

	<tr><td  style='text-align:justify;padding:12px;font-size:18px;'><br>Hi ".$user.",<br><br>
	Your Details of the order purchased :<br><br>
	
		BILL :<a href='http://yadass.com/bill_final.php?user=".$user."&order=".$productinfo."'>Print</a>
		<br>
<br><br><br><br>	
Thanks & Regards,<br>



Yadass,<br>
Web : https://yadass.com<br>
Email :support@yadass.com<br>
Phone :1234567890


<br>



<br>


</td></tr>
</tr>

</table>



</body></html>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	  
	if(@mail($my_mail,$email_subject,$email_content1,$headers) && @mail($user,$email_subject,$email_content,$headers)) {
		echo "<script>alert('Message sent!')</script>";
	//	echo "<script>window.location.href='bill.php'</script>";

		
	} else {
		echo "<script>alert('Message  not sent!')</script>";
	}
	
	
	      
        
        
        
        
        
        
         }  
		   }  
		   
?>	



				<div class="clearfix"> </div>
				
				
			</div>
		</div>
</div>
                <!--// product right -->
            </div>
        </div>
    </div>
                
<?php
include('footer.php');

?>
