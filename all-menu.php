<?php
require_once "class/all-class.php";
require_once "class/menu-class.php";
include_once 'top-nav.php';
require_once "class/misc-class.php";

include_once "class/food_category_class.php";
if(isset($_GET['block_menu']))
{
	$d1=new dbconn();$arr1=array();
    $db=$d1->connect();
	$sl=$_GET['block_menu'];
$cmd="UPDATE bawarchi set status='0' where sl='$sl'";
$result=$db->query($cmd);
}
if(isset($_GET['enable_menu']))
{
	$d1=new dbconn();$arr1=array();
    $db=$d1->connect();
$sl=$_GET['enable_menu'];
$cmd="UPDATE bawarchi set status='1' where sl='$sl'";
$result=$db->query($cmd);
}
if(isset($_POST['new_menu']))
{
			$menu_title=$_POST['menu_title'];
			$menu_desc=$_POST['menu_desc'];
			$menu_price=$_POST['menu_price'];
			$is_enabled=$_POST['enabled'];
			$desc=$_POST['menu_desc'];
			$cat_name=$_POST['cat_name'];
			$is_veg=$_POST['is_veg'];
	$d1=new dbconn();
    $db=$d1->connect();
$cmd="INSERT INTO bawarchi (item_name,cat_name,veg,type,description,status,rate) Values ('$menu_title','$cat_name','$veg','$type','$desc','$is_enabled','$menu_price')";
$result=$db->query($cmd);

}

// fetch all distinct customers ======================
$all_menu=restaurant_menu();
$rest_setup=new rest_setup('Bawarchi');
$cat_arr=$rest_setup->restaurant_food_category();
?>
<!-- =====  define the popups used for this page ober here ================ -->
<!-- ====== modal for updating the work status =========================== -->
<div class="modal fade" id="edit_menu" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='background:green;color:white'>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">EDIT THIS ITEM  </h4>
        </div>
        <div class="modal-body" id="edit_menu_body">
             
        </div>
     </div>
</div>
</div>
<!-- === modal for updating the work status ============================== -->

<!-- ====== modal for updating the work status =========================== -->

  <div class="modal fade" id="add_menu" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='background:green;color:white'>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Item   </h4>
        </div>
        <div class="modal-body" id="add_menu_body">
              <center>
                 <form action='#' method='post' >
<label> Item title </label>
<input type="text" id="menu_title" name="menu_title" >

<label>Some description</label>
<textarea id="menu_desc" name="menu_desc" ></textarea>

<label>Select Category</label>

<SELECT name="cat_name" id="cat_name">
<?php 
$cat_arr=restaurant_food_category();print_r($cat_arr);
for ($i=0; $i < sizeof($cat_arr); $i++) { ?>
	<option><?php echo $cat_arr[$i]['category']?></option>
<?php } ?>
</SELECT>
<label>Item Price (In Rs.)</label>
<input type="text" id="menu_price" name="menu_price" >

<label>Visiblity</label>
	<input type="radio" name="enabled" id="enabled" value="0" selected checked>Let it be disabled </option>
	<input type="radio" name="enabled" id="enabled" value="1">Enable Now</option>


<label>Check the food type</label>
<input type="radio" value="1" name="is_veg" selected checked><div class='veg same-line'></div>
<input type="radio" value="0" name="is_veg"><div class='non-veg same-line'></div>
<br><Br>
<input type="submit" name="new_menu" value="Add to menu" class="theme-btn btn">


                  </form>
                  </center>
        </div>
     </div>
</div>
</div>


<!-- === modal for updating the work status ============================== -->

<!-- =-==  popoupo ends here ========================================== -->
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Tabels</li>
</ol>
<div class="col-md-12">
<a class="btn new-btn" href="javascript:void(0)" data-toggle="modal" data-target="#add_menu"	onclick="add_"> <i class="glyphicon glyphicon-plus" style="color: white;"></i>New Item</a>
    <button style="    margin-top: 0px;
    height: 38px;" href="javascript:void(0)" data-toggle='modal' data-target='#confirmation_pop' onclick="document.getElementById('changing_link').href='api/excel_import.php';document.getElementById('changin_text').innerHTML='Are you sure to upload entire menu afresh.Doing this will erase the past items.click proceed to continue'" class="pull-right">Upload Excel</button>
</div>
<div class="agile-grids">	
				<!-- tables -->
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Restaurant Menu Page (<?php echo sizeof($all_menu); ?>)</h2>
		 <table class="" id="dataTables-example">
						<thead>
						  <tr>
						  	<th>#</th>
							<th>Product Id</th>
							<th>Item title</th>
							<th>Category</th>
							<th>Price</th>
							<th>Item descroption</th>
							<th>Action</th>							
						  </tr>
						</thead>
						<tbody>
   
   <?php 					for ($i=0; $i < sizeof($all_menu); $i++) { 
						# code...
						 $product=new products($all_menu[$i]['sl']);
					     ?>		

						  <tr>
						  	<td><input type="radio" name="gender" value="female"></td>
							<td><?php echo $i+1;?></td>
							<td><strong><?php echo $product->title?></strong>
<?php if($product->food_type=='veg')
echo "<div class='veg'></div>";
else
	echo "<div class='non-veg'></div>";
?>
							</td>
							<td><strong><?php echo $product->category?></strong></td>
							<td><?php echo $product->selling_price_formatted?></td>
							<td><?php echo $product->description?></td>
			
							<td><button href="javascript:void(0)" data-target="#edit_menu" data-toggle="modal" 
							onclick="load_menu_editor('<?php echo $product->id;?>')" style="    color: white;
    background: red;
    padding: 2px;">Update</button><br/>
    
<!-- ==== check if already blocked or not ===============================-->
<?php if($product->enabled)
{ ?>
    <button href="javascript:void(0)" data-toggle='modal' data-target='#confirmation_pop' onclick="document.getElementById('changing_link').href='?block_menu=<?php echo $product->id?>';document.getElementById('changin_text').innerHTML='Are you sure to disable this item from menu. It will no longer appear for the ordering sysytem ?'" >Block</button>
<?php }else{ ?>

    <button href="javascript:void(0)" data-toggle='modal' data-target='#confirmation_pop' onclick="document.getElementById('changing_link').href='?enable_menu=<?php echo $product->id?>';document.getElementById('changin_text').innerHTML='Are you sure to enable this item from menu. It will  appear for the ordering sysytem ?'">Enable It</button>
<?php } ?>
<!-- =-==== check if already blocked or not ============================ -->
    </td>
						  </tr>
						  <?php } ?>
						</tbody>
					  </table>
					</div>
			</div>
<script>
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
function update_menu(){
	var menu_price=$('#menu_price').val();
	var menu_desc=$('#menu_desc').val();
    var menu_cat=$('#menu_cat').val();
	var menu_title=$('#menu_title').val();
	var menu_code=$('#menu_code').val();

xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    
document.getElementById('edit_menu_body').innerHTML=xmlhttp.responseText;
    }
  }
   xmlhttp.open("GET", "admin-scripts/edit_menu.php?menu_price="+menu_price+"&menu_desc="+menu_desc+"&menu_cat="+menu_cat+"&menu_code="+menu_code+"&menu_title="+menu_title+"&save_updated=1", true);
        xmlhttp.send();
}

function load_menu_editor(a){
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById('edit_menu_body').innerHTML=xmlhttp.responseText;
    }
  }
   xmlhttp.open("GET", "admin-scripts/edit_menu.php?load_menu_editor="+a, true);
   xmlhttp.send();
}
</script>
				<?php
include_once('footer.php');
?>