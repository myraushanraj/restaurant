<?php 
 include_once "../inc/all_class.php";

$d1=new dbconn();
$db=$d1->connect();

$timenow=get_present_time();

$cart=new cart_all();
$bill=$cart->bill;
// STEP 1: UPDATE TO SYAYSTEM DATABASE ORDER DEPARTMENT 

$od=new order_process();
$arr1=array();			
$cart_left=$od->return_order_string();
$email=$_SESSION['ecemail'];
$temp_id=rand(123453434,34567409999);
$cmd="INSERT into empty_cart_data(cart_left,timings,email,status,temp_id,bill) values ('$cart_left','$timenow','$email','$status','$temp_id','$bill')";
$result=$db->query($cmd);


// step ===================== send notification to admin panel 
$web1=new web_stats();
$notification='Left cart Marketing  ';
$link1='show-order-profile.php?orderid='.$temp_id;
$triggeredby=$email;
$timings=$timings;
$alert_message='Confirm this order with payment and delivery systemn soon ';
$web1->add_new_stats($notification,$link1,$triggeredby,$timings,$alert_message);

// now also notify the admin 

?>