<?php 
require_once "../class/db-connection.php";

//======

if(isset($_GET['save_page']))
{
$content=$_GET['content'];
$page=$_GET['page'].'_page';
	date_default_timezone_set("Asia/calcutta");
    $timings1=date('Y-m-d H:i:s');
$rest_key=REST_KEY;
$d1=new dbconn();
$db=$d1->connect();  
 
       $cmd="UPDATE web_controllers set $page=:content where rest_key='$rest_key';UPDATE last_updates set $page='$timings1' where rest_key='$rest_key'";
       $qry=$db->prepare($cmd);
       $result=$qry->execute(array(":content"=>$content));
if($result)
echo "Congratulations ! Admin Page has been updated. Cross check from your restaurants platform.";
else
echo "Sorry ! operation could not be performed ";


}
?>