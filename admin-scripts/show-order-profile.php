<?php 
include_once ('../class/order-class.php');

$orderid=$_GET['orderid'];
$order=new order_id($orderid);
$productarr=explode(',',$order->item_list);
?>
  <h4 style="color:black">Transaction ID: <?php echo $orderid;?>       
  </h4>
<?php 
for($t=0;$t<sizeof($productarr)-1;$t++)
{
$itemstring=explode('-',$productarr[$t]);
if(!empty($itemstring[0])){
$itemqty=$itemstring[0];
$sku=$itemstring[1];
			if(($itemstring[0]!='')){
?>
<style type="text/css">
li{
display: inline-block;margin-right: 12px;
}
</style>
				<ul class="cart-header" type='none'>
					
					  <li>	<a href='#' style="text-transform:capitalize;color:red"><?php echo $sku;?></a></li>  
						<li><h5 class="name">Quantity:<strong><?php echo $itemqty;?></strong></h5></li>
	
				
				</ul>
<?php }} } ?>				

<!-- ==== one row for the cart ebds here  ========================================== -->


<!-- ===== space for the total list =============== -->
<ul class="cart-header" type='none' style='margin-top:12px;'>
<li><h5 class="name" style='    padding-top: 20px;
    font-weight: bold;
    font-size: 21px;
    color: maroon;'>TOTAL : </h5></li>
<li><h4 class="price">Rs. <?php echo $order->bill;?></h4></li>
<li>
	
	<img src="icon/home1.png" width="63px"><?php echo $order->address?>
</li>				
</ul>






 
