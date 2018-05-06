<?php 
require_once "../class/db-connection.php";
require_once "../class/order-class.php";
require_once "../class/misc-class.php";

if(isset($_GET['save_updated']))
{
$menu_title=$_GET['menu_title'];
$menu_code=$_GET['menu_code'];
$menu_rate=$_GET['menu_price'];
$menu_desc=$_GET['menu_desc'];
$menu_cat=$_GET['menu_cat'];
$d1=new dbconn();$arr1=array();
$db=$d1->connect();
  $time=get_present_time();

    // our SQL statements
    $qry=$db->prepare("UPDATE `bawarchi` set last_updated='$time',item_name=:menu_title,rate='$menu_rate',description=:description,cat_name=:cat where sl='$menu_code'");
        if($qry->execute(array(':menu_title'=>$menu_title,':description'=>$menu_desc,":cat"=>$menu_cat)))
    	echo "Menu has been updated successfully !";
      else
    	echo "Warning: cannot update item data .Try again !";
}
if(isset($_GET['load_order_editor'])){
	$order=new order_id($_GET['load_order_editor']);

?>
	 <center>
<form action='#' method='post' >
<label> Order Id  </label>
 <input type="text" readonly style="font-weight: bold;border:none;outline:none;font-weight: bold;
    color: green;" id="menu_code" name="order_id"  value="<?php echo $order->id?>">     

<?php 
$arr1=explode(',',$order->item_list);
for ($i=0; $i < sizeof($arr1)+3; $i++) { 

  if(!empty($arr1[$i])){
        $this_string=$arr1[$i];

echo "<input type'text' value='$this_string' name='order_string$i'>";
                          }
}
echo "<input type'text' placeholder='Add any new order' name='extra1'>";

echo "<input type'text' placeholder='Add any new order' name='extra2'>";

?>

  <input type="text" id="bill" name="bill"  value="<?php echo $order->bill?>">     

 <textarea id="address" name="address" >
 <?php echo $order->address?> 
 </textarea>    

<input type="submit" class="theme-btn" name="update_order">

                  </form>
                  </center>
                  <?php 
}
//show all delivery man

if(isset($_GET['order_id_for_forward'])){
  $current_order_id=$_GET['order_id_for_forward'];
 $forward=new order_process(); 
$all_delivery_boy=$forward->retrive_all_delivery_man();

  ?>
   <center>
<form action='#' method='post' >
<label> Order Id: <?php echo $current_order_id; ?> </label>
 <input type="hidden" readonly style="font-weight: bold;border:none;outline:none;font-weight: bold;
    color: green;"  name="current_order_id"  value="<?php echo $current_order_id; ?>">
    <select name="delivery_boy_user_id" required>
      <option value="">==SELECT DELIVERY BOY==</option>
      <?php for ($i=0; $i< sizeof($all_delivery_boy); $i++) { ?>
        <option value="<?php echo $all_delivery_boy[$i]['username']; ?>"><?php echo $all_delivery_boy[$i]['name']; ?></option>
     <?php } ?>
     
    </select>
    <input type="submit" class="theme-btn" name="forward_delivery_boy" value="Forward">     
  </form>
</center>
<?php }
?>