<?php 
include_once '../functionstats.php';
$username=$_GET['user'];
$c1=new customer($username);
echo "<img src=../profile-pics/".$c1->profile_pic." style='border-radius:50px;width:100px' width='120'>"."<br>";
echo 'Name : '.$c1->name."<br>";
echo 'Email Id :'.$c1->email."<br>";
echo 'Registration Time :'.$c1->registration_time."<br>";
echo 'Any Order :'.$c1->order_count."<br>";
        

        echo "<strong style='color:red'>".$_GET['alertmsg']."</strong>";
?>