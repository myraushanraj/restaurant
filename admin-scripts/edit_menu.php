<?php 
require_once "../class/db-connection.php";
require_once "../class/menu-class.php";
include_once "../class/food_category_class.php";
require_once "../class/misc-class.php";
$misc=new misc();
$rest_setup=new rest_setup('Bawarchi');
$cat_arr=$rest_setup->restaurant_food_category();
if(isset($_GET['save_updated']))
{
$menu_title=$_GET['menu_title'];
$menu_code=$_GET['menu_code'];
$menu_rate=$_GET['menu_price'];
$menu_desc=$_GET['menu_desc'];
$menu_cat=$_GET['menu_cat'];
    $d1=new dbconn();$arr1=array();
    $db=$d1->connect();
    date_default_timezone_set("Asia/calcutta");
    $timings1=date('Y-m-d H:i:s');
    // our SQL statements
    $qry=$db->prepare("UPDATE `bawarchi` set item_name=:menu_title,rate='$menu_rate',description=:description,cat_name=:cat,last_updated='$timings1' where sl='$menu_code';UPDATE last_updates set menu='$timings1' where sl='1'");
        if($qry->execute(array(':menu_title'=>$menu_title,':description'=>$menu_desc,":cat"=>$menu_cat)))
    	echo "Menu has been updated successfully !";
        else
    	echo "Warning: cannot update item data .Try again !";
}
if(isset($_GET['load_menu_editor'])){
	$product=new products($_GET['load_menu_editor']);

?>
	 <center>
<form action='#' method='post' >
<label> menu title </label>
<strong style="    font-size: 13px;
    color: red;
    margin-top: -24px;
    float: left;
    margin-left: 106px;"> Last Modified :  <?php echo $misc->return_timespan($product->last_modified)?></strong>
 <input type="hidden" id="menu_code" required name="menu_code"  value="<?php echo $product->id?>">     
<input type="text" id="menu_title" required name="menu_title"  value="<?php echo $product->title?>">
<label>Some description</label>
<textarea id="menu_desc" required name="menu_desc"  ><?php echo $product->description?>
</textarea>

<label>Menu Price (In Rs.)</label>
<input type="number" id="menu_price" required name="menu_price"  value="<?php echo $product->selling_price?>">

<label>Select Menu category</label>
<select id="menu_cat" required name="menu_cat">
<?php 
for($i=1;$i<sizeof($cat_arr);$i++)
{
?>
<option value="<?php echo $cat_arr[$i]['category']?>"><?php echo $cat_arr[$i]['category']?></option>
<?php }
	?>
</select>
<a href="javascript:void(0)" class="btn theme-btn " onclick="update_menu()">Update Now</a>
                  </form>
                  </center>
                  <?php 
}
?>