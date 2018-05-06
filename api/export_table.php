<?php  
class dbconn{
function connect(){
try{
$db=new PDO("mysql:host=localhost;dbname=rest_db","rest_user","rest_pass");
return $db;
	}
	catch(Exception $e)
	{
	die('cannot access database ! '.$e->getMessage());
	}
}
}

$table=$_GET['table_name'];
$file1=$_GET['file_name'].'.csv';
   	$d1=new dbconn();$arr1=array();
		$db=$d1->connect();
		$cmd="SELECT * FROM $table";echo $cmd;
$result = $db->query($cmd);
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename='.$file1.'');
                                     while($row=$result->fetch()){ 
                                                                 fputcsv($fp, array_values($row));
                                                                 }
    die;
}

?>