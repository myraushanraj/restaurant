<?php
require_once "class/all-class.php";
require_once "class/menu-class.php";
include_once 'top-nav.php';
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

  <div class="modal fade" id="add_category" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='background:green;color:white'>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Food category  </h4>
        </div>
        <div class="modal-body" id="add_category_body">
              <center>
                 <form action='#' method='post' >
<label> category title </label>
<input type="text" id="cat_title" name="cat_title" >

  
<select id='cat_enabled'>
	<input type="radio" name="cat_enabled" value="0" selected>Let it be disabled </option>
	<input type="radio" name="cat_enabled" value="1">Enable Now</option>
</select>


<a href="javascript:void(0)" class="btn btn-danger " onclick="new_category()">Add to menu</a>


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
<form class="form-inline">
 <div class="form-group">
<input type="email" class="form-control" id="email">
</div>
<button type="submit" class="btn search-btn"> <i class="fa fa-search"></i>Search</button>
<a class="btn new-btn" href="javascript:void(0)" data-toggle="modal" data-target="#add_category "	> <i class="glyphicon glyphicon-plus" style="color: white;"></i>New Item</a>
</form>	
</div>
<div class="agile-grids">	
				<!-- tables -->
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Customers On board (<?php echo sizeof($cat_arr); ?>)</h2>
		 <table class="" id="dataTables-example">
						<thead>
						  <tr>
						  	<th>#</th>
				
							<th>Category title</th>
							<th>Action</th>							
						  </tr>
						</thead>
						<tbody>
   
   <?php 					for ($i=0; $i < sizeof($cat_arr); $i++) { 
    $cat=$cat_arr[$i]['category'];
						# code...
					     ?>		

						  <tr>
						  	<td><input type="radio" name="gender" value="female"></td>
							<td><?php echo $i+1;?></td>
							<td><strong><?php echo $cat_arr[$i]['category']?></strong>

							</td>
			
							<td>
<!-- ==== check if already blocked or not ===============================-->
<?php if($cat_arr[$i]['status'])
{ ?>
    <a href="javascript:void(0)" data-toggle='modal' data-target='#confirmation_pop' onclick="document.getElementById('changing_link').href='?block_menu=<?php echo $cat;?>';document.getElementById('changin_text').innerHTML='Are you sure to disable this item from menu. It will no longer appear for the ordering sysytem ?'" style="    color: white;
    background: black;
    padding: 1px 7px 1px 7px;">Block</a>
<?php }else{ ?>

    <a href="javascript:void(0)" data-toggle='modal' data-target='#confirmation_pop' onclick="document.getElementById('changing_link').href='?enable_menu=<?php echo $product->id?>';document.getElementById('changin_text').innerHTML='Are you sure to enable this item from menu. It will  appear for the ordering sysytem ?'" style="    color: white;
    background: black;
    padding: 1px 7px 1px 7px;">Enable It</a>
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

function new_category(){
  var cat_title=$('#cat_title').val();
  var cat_enabled=$('#cat_enabled').val();
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById('edit_menu_body').innerHTML=xmlhttp.responseText;
    }
  }
   xmlhttp.open("GET", "admin-scripts/food_category_process.php?cat_title="+cat_title+"&cat_enabled="+cat_enabled, true);
   xmlhttp.send();
}
</script>
				<?php
include_once('footer.php');
?>