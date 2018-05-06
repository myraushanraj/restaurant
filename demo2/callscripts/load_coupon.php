<?php
include_once("../inc/coupon-class.php");

if(isset($_GET['couponapplied']))
{

	$coupon=$_GET['couponapplied'];
  $discountedamount=fetch_discounted_amount_from_coupon($coupon);

          //========================================== update the new bill after effective coupons 
                            $_SESSION['amountpay']-=$discountedamount;     
                            $_SESSION['couponapplied']=$coupon;
                                      // ================== bill update the new bill ends here ====================                   
                           echo $discountedamount;
                             
}




// script for removing the applied coupon ===================================================



if(isset($_GET['removeapplied']))
{
  $coupon=$_GET['removeapplied'];
  $discountedamount=fetch_discounted_amount_from_coupon($coupon);
          //========================================== update the new bill after effective coupons 
                           $_SESSION['amountpay']=return_total_bill();     
                           $_SESSION['couponapplied']='none';

           // ================== bill update the new bill ends here ====================                   
echo return_total_bill();



}
?>