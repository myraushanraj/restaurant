<?php
include_once('../inc/all_class.php');

if(isset($_GET['request_a_callback'])){

$namer=$_GET['namer'];
$phoner=$_GET['phoner'];

$c1=new nursery_controllers();

// admin sendmessage ===================
$msgborn="New callback request from ".$namer." and contact ".$phoner." .";
$c1->send_message($msgborn,($c1->admin_contact));



// customer message ===================

$msgborn="Congratulations customer your request has been processed. You will be soon contacted by MyBabyPant Executive.";
$c1->send_message($msgborn,$phoner);

echo 'congratulation '.$namer.' you will be soon contacted by our executive ';
}


?>