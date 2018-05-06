<?php
require_once "db-connection.php";
class admin_notifications{
function __construct()
{
		$this->adminstrator=$_SESSION['admin_logged'];
		// allot the products value 
		//$this->all_data();		
}
	               function all_data(){
	               	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select * from admin_notifications where status='0'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch())
                                   { 
				                   	    array_push($arr1,$row);
				                    }
					                   $this->unread=sizeof($arr1);
					                	return $arr1;
	                                    }
	                               function notifications_cleared(){
	                               }   

}


?>