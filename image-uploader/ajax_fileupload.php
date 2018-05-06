<?php 
include_once('../class/db-connection.php');
$group_id=$_SESSION['groupset'];
  $str = file_get_contents('php://input');
  echo $filename = md5(time().uniqid()).".jpg";
  $d1=new dbconn();$arr1=array();
                   $db=$d1->connect();
    // set the PDO error mode to exception

  date_default_timezone_set("Asia/calcutta");
  $timings=date('Y-m-d H:i:s');
  // begin the transaction
   $image_for=$_SESSION['groupset'];
   $attachment=$filename;
    // our SQL statements
   $uploadedby=REST_KEY;
    $qry=$db->prepare("INSERT INTO `image_uploads` (`image_for`, `uploadedby`,`file_name`, `timings`) VALUES ('$image_for', '$uploadedby', '$filename','$timings');");
    $qry->execute(array(':content'=>$content));

  file_put_contents("../icon/".$filename,$str);
 ?>
 <script>
 window.location='setup-2.php';
 </script>
 <?php
  // In demo version i delete uplaoded file immideately, Please remove it later
  //unlink("uploads/".$filename);

?>


 