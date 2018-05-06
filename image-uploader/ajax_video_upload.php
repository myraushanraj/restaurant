<?php 
include('../db.php');


$title=$_SESSION['videotitle'];
$company=$_SESSION['videocompany'];
$link=$_SESSION['videolink'];
date_default_timezone_set("Asia/Calcutta");
$time2=date('y/m/d h:i:s');


$cmd="insert into tod_portifolio(title,pic,company,uploadedon,category) values ('$title','$filename','$company','$time2','animations')";
$result=mysql_query($cmd);
  file_put_contents("../images/".$filename,$str);
  // In demo version i delete uplaoded file immideately, Please remove it later
  //unlink("uploads/".$filename);
?>