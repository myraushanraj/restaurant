<?php 
include_once "../class/product_class.php";
include_once "../class/cart_class.php";
include_once "../class/setup-class.php";
if(isset($_GET['show_new_bill'])){

$setup=new web_controllers();
$c2=new cart_all();
if(!isset($c2->bill))
	$bill1=0;
else
	$bill1=$c2->bill;
?>

<!-- ===  SHOW THE BILL WALA REFERESHED SECTION HERE ==================-->
<a href="saved-order.php" style="padding-top:4px">  <img src="icon/<?php echo $setup->icon_cart_link?>" class="cart_icon" style="width:32px;">&nbsp;&nbsp;&#8377; <?php echo $bill1?></a>

<!--- === BILLED LI CLASS EBDS HERE ========================== -->
<?php }?>
