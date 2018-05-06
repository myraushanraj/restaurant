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

<!-- =-==  popoupo ends here ========================================== -->
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Tabels</li>
</ol>
<div class="agile-grids">	
				<!-- tables -->
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Admin data (<?php echo sizeof($all_menu); ?>)</h2>
		 <table class="" id="dataTables-example">
						<thead>
						                <tr><th>USERNAME</th><th>NAME</th><th>DISPLAY PIC</th><th>POSITION</th><th>Last login at </th></tr>    

						</thead>
						<tbody>
						  <tr>
						
<?php
$arr3=all_panel_users();
for($t=0;$t<sizeof($arr3);$t++){
?>
<tr><td><?php echo $arr3[$t]['username'];?></td>
<td><?php echo $arr3[$t]['name'];?></td>
	<td>
	<span class="prfil-img"><img src="profile-pic/<?php echo ($arr3[$t]['profile_pic']);?>" alt=""> </span> 
   </td>
	<td><?php echo $arr3[$t]['position'];?></td><td><?php echo $arr3[$t]['lastlogin'];?> </td></tr>
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