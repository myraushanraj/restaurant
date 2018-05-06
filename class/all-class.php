<?php 
include_once 'db-connection.php';
include_once 'misc-class.php';

			function show_all_customer(){
					
	               	$d1=new dbconn();
	               	$db=$d1->connect();$arr1=array();
        			 $cmd="SELECT * from customer";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	                      array_push($arr1,$row);
				                                                }

				                 return $arr1;
				             }
				             function all_panel_users(){$d1=new dbconn();

$db=$d1->connect();

             				$arr1=array();
             			$cmd="select * from admin_data";
             				$result=$db->query($cmd);
$c=$result->rowCount();
					while ($row=$result->fetch()) 
{
				array_push($arr1,$row);
}
			return $arr1;

             }	
function show_all_order(){
			
	               	$d1=new dbconn();
	               	$db=$d1->connect();$arr1=array();
        			 $cmd="SELECT * from my_orders ORDER BY sl desc";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	                      array_push($arr1,$row);
				                                               }

				                 return $arr1;
				             }

				            function restaurant_food_category(){
            	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select * from all_category where status='1' and rest_name='bawarchi'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	       array_push($arr1,$row);
				                                               }

				                                         return $arr1;

}




// ========================= admin login wala page 



					                              function login_profiles($username,$password){
$d1=new dbconn();
$db=$d1->connect();
$cmd="select * from admin_data where username='$username' or email='$username' and password='$password'";
$result=$db->query($cmd);
$c=$result->rowCount();
					while ($row=$result->fetch()) 
{
	$user=$row['name'];
	$account_type=$row['account_type'];
	$pic=$row['profile_pic'];
}


             if($c>0){
         	    $_SESSION['admin_logged']=$account_type;
             	$time2=get_present_time();
             	$cmd="update admin_data set lastlogin='$time2' where username='$username'";
             	$result=$db->query($cmd);
             	$_SESSION['adminlogged']=$user;
             	$_SESSION['adminname']=$user;
             	$_SESSION['adminpic']=$pic;
             	?>
             	<script type="text/javascript">

window.location='setup-1.php';


              </script>

<?php


 }else{
 	return 0;
 }

             }


function total_customer(){


									$arr1=array();				
									$d1=new dbconn();
									$db=$d1->connect();
	        						$cmd="select * from customer";
	        						$result=$db->query($cmd);
                                       while($row=$result->fetch()){ 
				                   	          array_push($arr1,$row);
				                                               }
				                                               return sizeof($arr1);
				                                      
}

function total_product(){


									$arr1=array();				
									$d1=new dbconn();
									$db=$d1->connect();
	        						$cmd="select * from bawarchi";
	        						$result=$db->query($cmd);
                                       while($row=$result->fetch()){ 
				                   	          array_push($arr1,$row);
				                                               }
				                                               return sizeof($arr1);
				                                      
}

function total_order(){


									$arr1=array();				
									$d1=new dbconn();
									$db=$d1->connect();
	        						$cmd="select * from my_orders";
	        						$result=$db->query($cmd);
                                       while($row=$result->fetch()){ 
				                   	          array_push($arr1,$row);
				                                               }
				                                               return sizeof($arr1);
				                                      
}