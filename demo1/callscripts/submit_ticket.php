<?php
include_once "../inc/all_class.php";
function get_support_ticket_number(){
  $d1=new dbconn();$db=$d1->connect();
          $cmd="select * from supporttoken";
          $result=$db->query($cmd);
          $rd=$result->fetchColumn();
              $rd=$rd+1;
          date_default_timezone_set("Asia/Calcutta");
                          $yeardetails=date('y');
                          $prevyear=$yeardetails;
                          $nextyear=$prevyear+1;
          $orderid=$prevyear.$nextyear.$rd;
          return 'TC'.$orderid;
}
if(isset($_GET['submittoken']))
{
// submitting all tghe va;lues 
 $d1=new dbconn();$db=$d1->connect();
      $name=($_GET['nameissue']);
        $email=($_GET['emailissue']);
        $mobile=($_GET['mobileissue']);
        $issue=($_GET['issueissue']);
        $message=($_GET['messageissue']);
        $registeredat=get_present_time();

        $ticketnumber=get_support_ticket_number();
      $cmd="insert into supporttoken(Ticketnumber,name,mobile,email,issue,registeredat,message) values ('$ticketnumber','$name','$mobile','$email','$issue','$registeredat','$message')";
          $result=$db->query($cmd);


echo 'Congratulations ! '.$name.' Your service ticket : '.$ticketnumber.' has been raised. Use this service ticket for future reference.';

}
?>