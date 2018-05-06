<?php 
require_once "../class/order_class.php";
require_once "../class/misc-class.php";
$misc=new misc();
$time1=get_present_time();
if(isset($_GET['save_submit']))
$title=$_GET['title_save'];
$order_id=$_GET['order_id'];
									$d1=new dbconn();
									$db=$d1->connect();
$cmd="UPDATE my_orders set saved_time='$time1',saved_title='$title' where order_id='$order_id'";
	        						$result=$db->query($cmd);

echo "Congratulations ! User your order ID : ".$order_id.' has been saved under the menu titled "'.$title.'"'."For fasr checkout use the saved order tab at the support section." ;


?>



