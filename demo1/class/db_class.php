<?php if(!isset($_SESSION))session_start();

//define("REST_KEY","m012");
define("OPERATOR",'chandan jha');
if (isset($_SESSION['rest_ka_key']) && (!isset($_GET['restid']))) {
	define("REST_KEY",$_SESSION['rest_ka_key']);
}

if (isset($_GET['restid'])) {

$_SESSION['rest_ka_key']=$_GET['restid'];
$_SESSION['rest_ka_key']."session";
	define("REST_KEY",$_SESSION['rest_ka_key']);
 }


class dbconn{
	
function connect(){
try{
$db=new PDO("mysql:host=localhost;dbname=monkhub_food_order","monkrulestheword","Raushan@8797");
return $db;

	}
	catch(Exception $e)
	{
		die('cannot access database ! '.$e->getMessage());
	}
  }
}

?>