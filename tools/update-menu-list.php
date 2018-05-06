<?php
$table_name="bawarchi2";
require_once "class/all-class.php";
if(isset($_POST['submit_food']))
{

$d1=new dbconn();
$db=$d1->connect();

for ($i=0; $i <(10) ; $i++) { 
$item_name=$_POST['item_name'.$i];
$cat_name=$_POST['cat_name'.$i];
$description=$_POST['description'.$i];
$rate=$_POST['rate'.$i];
$is_veg=$_POST['is_veg'.$i];
if(!empty($item_name))
{
$cmd="INSERT INTO $table_name (item_name,cat_name,veg,type,description,status,rate) Values ('$item_name','$cat_name','$is_veg','single','$description','1','$rate')";
$result=$db->query($cmd);
}

}


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

        <h3 style="color:Red">Eatanery Food services : <a href="view-updated-menu.php" class="btn-blue">View my updated menu</a></h3>
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
              <th>veg hai</th>
						  </tr>
						</thead>
						<tbody>
   
</tbody>
<?php for ($i=0; $i < 10; $i++) { 
  # code...
?>
<tr>
<td style="padding-left: 12px"><?php echo $i;?></td>
<td><input type="text" name="item_name<?php echo $i;?>" ></td>
<td><input type="text" name="cat_name<?php echo $i;?>" ></td>
<td><input type="number" name="rate<?php echo $i;?>" ></td>
<td><input type="text" name="description<?php echo $i;?>" ></td>
<td><input type="number" name="is_veg<?php echo $i;?>" value="1"></td>
</tr>
<?php }  ?>
      </form>

      <tr><td></td><td></td><td><input type="submit" name="submit_food" class="btn btn-blue"></td></tr>
      			</tbody>
					  </table>



					</div>
			</div>

		