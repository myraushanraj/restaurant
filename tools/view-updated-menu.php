<?php
require_once "class/all-class.php";
$table_name="bawarchi2";

$cmd="SELECT * from $table_name";
$d1=new dbconn();
$db=$d1->connect();$arr=array();
 $result=$db->query($cmd);
  while($row=$result->fetch()){ 
    array_push($arr,$row);
				            }
            
     
?>
<style type="text/css">
  .btn-blue{
        color: white;
    padding: 9px 57px;
    border: none;
    background: #2d2ded;
    border-radius: 15PX;
  }
  .view-now{
        font-size:11px;
    text-transform: capitalize;
    text-decoration: none;
  }
</style>
				<!-- tables -->
				<div class="agile-tables">

        <h3 style="color:Red">Eatanery Food services : <a href="update-menu-list.php" class="btn-blue">back to entry</a></h3>
					<div class="w3l-table-info">
			<form action="#" method="post">
		 <table class="" id="dataTables-example" border="0" style="    line-height: 50px;">
						<thead>
						  <tr>
						  	<th>#</th>
							<th>Item title</th>
							<th>Category</th>
							<th>Price</th>
							<th>Item descroption</th>
							<th>Is Veg</th>
						  </tr>
						</thead>
						<tbody>
   
</tbody>
<?php for ($i=0; $i < sizeof($arr); $i++) { 
  # code...
?>
<tr>
<td style="padding-left: 12px"><?php echo $i;?></td>
<td><input type="text" name="item_name<?php echo $i;?>"     value="<?php 
echo $arr[$i]['item_name']?>"></td>
<td><input type="text" name="cat_name<?php echo $i;?>"    value="<?php 
echo $arr[$i]['cat_name']?>" ></td>
<td><input type="number" name="rate<?php echo $i;?>"    value="<?php 
echo $arr[$i]['rate']?>" ></td>
<td><input type="text" name="description<?php echo $i;?>"    value="<?php 
echo $arr[$i]['description']?>" ></td>
<td><input type="number" name="is_veg<?php echo $i;?>"    value="<?php 
echo $arr[$i]['rate']?>" value="1"></td>
</tr>
<?php }  ?>
      </form>

      <tr><td></td><td></td><td><input type="submit" name="submit_food" class="btn btn-blue"></td></tr>
      			</tbody>
					  </table>



					</div>
			</div>

		