<?php 
require_once "../class/order_class.php";
require_once "../class/misc-class.php";
$misc=new misc();
$phone=$_GET['phone'];
$arr1=array();				
									$d1=new dbconn();
									$db=$d1->connect();
$cmd="SELECT * FROM my_orders where cust_phone='$phone' AND saved_title IS NOT NULL";
	        						$result=$db->query($cmd);
                                       while($row=$result->fetch()){ 
				                   	                      array_push($arr1,$row);
				                                                   }

// Now display the loist of saved order
				                                                   if(sizeof($arr1)>0)
				                                                   {

?>
<ul type='none' style="    font-size:18px;">
<?php for($k=0;$k<sizeof($arr1);$k++){
	$complete_order=$arr1[$k]['order_code'];?>
	<li>
	<ul type="none" style="text-align: left">

	<li style="color:red;font-weight: bold;font-style: italic;text-transform: capitalize;">
<a href="saved-order.php?cartopen=<?php echo $complete_order?>">
	<?php echo $arr1[$k]['saved_title'];?></a></li>
	<li><?php echo $arr1[$k]['items'];?></li>
	<li><?php echo $misc->return_timespan($arr1[$k]['saved_time']).' @ '.explode(' ',$arr1[$k]['saved_time'])[1];?></li>
	<li><hr></li>
    </ul>
   </li>
   <?php } 
   																	}else
   																	{

   ?>

<strong>Oops .. System could not find any saved orders associated with your number : <?php echo $_GET['phone'] ?></strong>


   <?php } ?>
</ul>

