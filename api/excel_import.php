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


function  fetch_all_rows_from_temp(){
   	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select * from excel_data";
				     $result=$db->query($cmd);
                                     while($row=$result->fetch()){ 
				                   	             array_push($arr1,$row);
				                   	          }
                                      

return $arr1;

}

if(isset($_POST['new_structure']))
{

$rate_col=$_POST['rate_col'];
$cat_col=$_POST['cat_col'];
$title_col=$_POST['title_col'];
$description_col=$_POST['description_col'];
   	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();


date_default_timezone_set("Asia/calcutta");
$current_time =strtotime(date('Y-m-d H:i:s'));
	               	$cmd="INSERT INTO bawarchi (`item_name`, `description`,`rate`,`cat_name`)
SELECT $title_col,$description_col,$rate_col,$cat_col
FROM excel_data
";
				     $result=$db->query($cmd);
      echo "<script>window.location='../all-menu.php';</script>";

          

}

if(isset($_POST["submit"]))
{

	$d1=new dbconn();
	$db=$d1->connect();
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $col1 = ($data[0]);  
    $col2 = ($data[1]);
    $col3 = ($data[2]);
    $col4 = ($data[3]);
    $col5 = ($data[4]);
    $col6 = ($data[5]);
    $col7 = ($data[6]);
    $col8 = ($data[7]);
    $col9 = ($data[8]);
    $col10 =($data[9]);

$query = "INSERT into excel_data(col1,col2,col3,col4,col5,col6,col7,col8,col9,col10) values('$col1','$col2','$col3','$col4','$col5','$col6','$col7','$col8','$col9','$col10')";
                $db->query($query);
               
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>excel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
 </head>  
 <body>  
<!-- ===  modal for the enter cols ================================================= -->

<!-- Modal -->
  <div class="modal fade" id="enter_cols" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='background:green;color:white'>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Structure your table now </h4>
        </div>
        <div class="modal-body">
              <center>

                <form action='#' method='post' >
                <label>choose column for "title"</label>
                <select name="title_col">
                <option VALUE="col0">COL0</option>  
                <option VALUE="col1">COL1</option>	
                <option VALUE="col2">COL2</option>
                <option VALUE="col3">COL3</option>
                <option VALUE="col4">COL4</option>
                <option VALUE="col5">COL5</option>
                <option VALUE="col6">COL6</option>
                <option VALUE="col7">COL7</option>
                <option VALUE="col8">COL8</option>
                <option VALUE="col9">COL9</option>
                <option VALUE="col10">COL10</option>
                <option VALUE="col11">COL11</option>
                </select><br>

                 <label>choose column for "description"</label>
                   <select name="description_col">
                
                <option VALUE="col0">COL0</option>	
                <option VALUE="col1">COL1</option> 
                <option VALUE="col2">COL2</option>
                <option VALUE="col3">COL3</option>
                <option VALUE="col4">COL4</option>
                <option VALUE="col5">COL5</option>
                <option VALUE="col6">COL6</option>
                <option VALUE="col7">COL7</option>
                <option VALUE="col8">COL8</option>
                <option VALUE="col9">COL9</option>
                <option VALUE="col10">COL10</option>
                <option VALUE="col11">COL11</option>
                </select><br>


                  <label>choose column for "rate"</label>
                   <select name="rate_col">
                <option VALUE="col0">COL0</option> 
                <option VALUE="col1">COL1</option>	
                <option VALUE="col2">COL2</option>
                <option VALUE="col3">COL3</option>
                <option VALUE="col4">COL4</option>
                <option VALUE="col5">COL5</option>
                <option VALUE="col6">COL6</option>
                <option VALUE="col7">COL7</option>
                <option VALUE="col8">COL8</option>
                <option VALUE="col9">COL9</option>
                <option VALUE="col10">COL10</option>
                <option VALUE="col11">COL11</option>
                </select><br>



         <label>choose column for "category"</label>
                   <select name="cat_col">
                <option VALUE="col0">COL0</option> 
                <option VALUE="col1">COL1</option>  
                <option VALUE="col2">COL2</option>
                <option VALUE="col3">COL3</option>
                <option VALUE="col4">COL4</option>
                <option VALUE="col5">COL5</option>
                <option VALUE="col6">COL6</option>
                <option VALUE="col7">COL7</option>
                <option VALUE="col8">COL8</option>
                <option VALUE="col9">COL9</option>
                <option VALUE="col10">COL10</option>
                <option VALUE="col11">COL11</option>
                </select><br>


                <input type="submit" name="new_structure"  class='modal-submit btn btn-danger'><BR>
                </form>
              </center>
        </div>
      </div>
     </div>
</div>

<!-- ==== MODAL CLASS FOR CHANGING THE ADDRESS ENDS HERE ===================== -->

<!--- ===   modal for the enter cols ================================================= -->


  <h3 align="center">import csv wala code</h3><br />
  <form method="post" enctype="multipart/form-data">
   <div align="center">  
    <label>Select CSV File:</label>
    <input type="file" name="file" />
    <br />
    <input type="submit" name="submit" value="Import" class="btn btn-info" />
   </div>
  </form>

<h3 style="color:black;background: pink">Data stored in temporary backup </h3><br>

<?php
 $arr=fetch_all_rows_from_temp();
echo "<strong style='color:Red'>"."Congrats we got ".sizeof($arr)." Entries </strong><br>";
echo "<span style='color:green;font-weight:bold'>Now just click on the column names to lety us understand your menu </span>";
?>
<br><br>
<a href="javascript:void(0)" data-target="#enter_cols" class="btn btn-danger" data-toggle="modal">Update my menu</a>

<br><Br><BR>
<table border='2'>
	<tr>
    <th>COL0</th>
		<th>COL1</th>
		<th>COL2</th>
		<th>COL3</th>
		<th>COL4</th>
		<th>COL5</th>
		<th>COL6</th>
		<th>COL7</th>
		<th>COL8</th>
		<th>COL9</th>
	


	</tr>

	<?php for ($i=0; $i < sizeof($arr); $i++) { 
	?>



	<tr>
<?php for ($k=0; $k < 10; $k++) { 
		# code...?>
		<td><?php if(!empty($arr[$i]['col'.$k]))
		echo $arr[$i]['col'.$k]?></td>
<?php } ?>
	</tr>
<?php } ?>

</table>



 </body>  
</html>