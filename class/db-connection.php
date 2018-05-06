<?php if(!isset($_SESSION))session_start();
if (!isset($_SESSION['admin_logged'])) {
	define("REST_KEY","");
	
}
else{
define("REST_KEY",$_SESSION['admin_logged']);

}

define("OPERATOR",'chandan jha ');
class dbconn{
	
function connect(){
try{
$db=new PDO("mysql:host=localhost;dbname=monkhub_food_order","root","");
return $db;

	}
	catch(Exception $e)
	{
		die('cannot access database ! '.$e->getMessage());
	}
  }
}

?>