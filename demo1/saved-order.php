<?php require_once('inc/header.php');
include_once "class/cart_class.php";
require_once "class/product_class.php";
require_once "class/food_category_class.php";
$cart=new cart_all();
$rest_id=REST_KEY;

$minimum_order=new rest_setup($rest_id);
print_r($minimum_order);
echo "minimum order".$minimum_order->min_order;
// view the loop folr any saved order all tlo the menbu wala page 
if(isset($_GET['cartopen']))
{
  $_SESSION['product_chain']=$_GET['cartopen'];
}

 ?>
 <div class="saved_order_wrap">
<div class="container" id="saved_cart_id">
	<div class="col-md-12">
	<h4 class="content_title" style="padding-top: 10px">Order Details</h4>
	</div>
	<hr>
	<?php 
				$master_arr=array();
				if(isset($_SESSION['product_chain']))
                $master_arr=explode('///',$_SESSION['product_chain']);
               if(!sizeof($master_arr))
               {
               		echo '<h3 class="content_title" style="text-align: center;">Cart is empty !</h3>
';
               }else{ ?>


<div class="col-md-6">
	<div class="user_detail">
	
	</div>
</div>
<div class="col-md-6">


	<div class="cart_detail">
		<h3 class="content_title" style="text-align: center;">My cart (<?php echo $cart->item_count;?>)</h3>
		<div class="cart_details">
		<table style="width: 100%">
			<tbody>	
			  <tr>
                 	<a href='javascript:void(0)' style='color:red;float:left' onclick='clear_cart()'>
                 		Empty this cart 
                 	</a>
                 </tr>
			<?php
			 for($r=0;$r<sizeof($master_arr)-1;$r++)
                    {

                      $id=explode('$$$',$master_arr[$r])[0];
                      $qty=explode('$$$',$master_arr[$r])[1];
                      $cart_product=new products($id);                
                      $cart=new cart_all();?>		
                    
				<tr>
					<td><?php echo $cart_product->title?></td>
					<td><a class="incr-btn" data-action="decrease" href="#" onclick="change_qty('<?php echo $r;?>','desc');modify_cart_item('<?php echo $cart_product->productid?>','<?php echo $r;?>')">
					<img src="icon/minus.png">
					</a>
					</td>
					<td ><input type="text" style="width:30px;border:none" value="<?php echo $qty?>" id="current_cart_qty<?php echo $r?>" readonly value="<?php echo $qty?>"></td>
					<td>
					  <a class="incr-btn" data-action="increase" href="#" onclick="change_qty('<?php echo $r;?>','asc');modify_cart_item('<?php echo $cart_product->productid?>','<?php echo $r;?>')">
					<img src="icon/plus.png">
					</a>
					</td>
					<td>Rs <?php echo $cart_product->selling_price ?></td>
					<td><a href="javascript:void(0)"  style="color:red !important;font-weight: bold" onclick="remove_cart('<?php echo $cart_product->productid; ?>')">x</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
		<div class="cart_details2">
		<table style="width: 100%">
			<tbody>
				
				
				<tr>
					<td>Item total</td>
					<td></td>
					<td></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Rs <span id="total_bill"><?php $setup->operational_data();echo $cart->bill;?></span></td>
				</tr>
				<tr>
					<td>GST <?php echo '@'.$setup->gst.' % ';?> </td>
					<td></td>
					<td></td>
					<td></td>
					<td> <?php echo ((($setup->gst)/100)*$cart->bill);?></td>
				</tr>
				<tr>
					<td>Delivery Charges</td>
					<td></td>
					<td></td>
					<td></td>
					<td>Rs <?php echo $setup->delivery_charge?></td>
				</tr>
				
			</tbody>
		</table>
		</div>
			<div class="cart_details">
		<table style="width: 100%">
			<tbody>
				
				
				<tr>
					<td>To Pay</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Rs <?php echo ($cart->bill)+((($setup->gst)/100)*$cart->bill)+($setup->delivery_charge);?></td>
				</tr>


				
				
			</tbody>
		</table>
		</div>
		<div class="cart_details3">
		<table style="width: 100%">
			<tbody>
			<tr>
					<td colspan="5" class="theme1" onclick="check_minimum_order()"><a href="javascript:void(0)" onclick="check_minimum_order()">Checkout</a></td>
					
					<!-- #delivery_form_id -->
				</tr>
				
			</tbody>
		</table>
		</div>
		<div class="cart_details2" style="text-align: center">
		<table style="width: 100%">
			<tbody>
			<tr>
					<td colspan="5" id="error_checkout">OR</td>
				</tr>
				
			</tbody>
		</table>
		</div>
		<div class="cart_details3">
		<table style="width: 100%">
			<tbody>
			<tr>
					<td colspan="5" class="theme1"><a href="menu.php">Add More</a></td>
				</tr>
				
			</tbody>
		</table>
		</div>
	</div>


</div>
<?php } ?>
</div>



<div class="container" id="delivery_form_id">
<div class="col-md-12">
	<br>
	<h4 class="content_title"  style="padding-top: 10px;">Delivery Details</h4>
	 <div class="clearfix "></div>
	<hr>
</div>
 <div class="clearfix "></div>
<div class="col-md-6">
 <form action="callscripts/order_placement.php" method="get" >
    <div class="form-group">
      <input type="text" class="form-control" id="name1" required="true" placeholder="Your Name" name="name1">
    </div>
    <div class="form-group">
    <label>Address</label>
    </div>
   <div class="form-group">
      <input type="text" class="form-control" id="line1" required="true"  value="<?php if(isset($_SESSION['user_address']))echo $_SESSION['user_address'];?>" placeholder="Nearest Destination" name="line1">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="line2" placeholder="Area" name="line2">
    </div> 
    <div class="form-group">
      <input type="text" class="form-control" id="city1" style="display:none" placeholder="city" name="city1">
    </div>
   

 <div class="clearfix "></div>
</div>

<div class="col-md-6">
	<div class="form-group">
      <input type="text" class="form-control" id="phone1" required="true" placeholder="Mobile No" name="phone1">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="email1" required="true" placeholder="Email" name="email1">
    </div>

  <div class="form-group">

       <textarea id="chef_note" class="form-control" placeholder="Enter some chef note e.g i need spicy food" name="chef_note"></textarea>

    </div>
    <h4>OTP has been sent to this device for verification</h4><br/>
    <button type="submit" name='submit_order' id="proceed_btn" style="" class="btn btn-default">Proceed</button>
    <script>
    	document.getElementById("proceed_btn").disabled = true;
    </script>
     
 <div class="clearfix "></div>	
</div>
 <div class="clearfix "></div>
 </div>
 
  </form>
</div>
<script>
	function check_minimum_order() {
	//check minimum order
	var total_bill=document.getElementById("total_bill").innerHTML;
	var minimum_order=<?php echo $minimum_order->min_order ?>;
	var opening_time=<?php echo $minimum_order->opens; ?>;
	var restro_opening_time_in_minute = opening_time.toString().substr(-2);
	var restro_opening_time_in_hours = (opening_time-(opening_time%100))/100; 
	var closing_time=<?php echo $minimum_order->closes; ?>;
	var closing_time_minute=closing_time.toString().substr(-2);
	var restro_closing_time_in_hours = (closing_time-(closing_time%100))/100;
    var error=0;
    //alert("actual opening time"+opening_time);
    //alert("restro_opening_time_in_minute"+restro_opening_time_in_minute);
   //alert("restro_opening_time_in_hours"+restro_opening_time_in_hours);

     //alert("restro_closing_time_in_minute"+closing_time_minute);
    //alert("restro_closing_time_in_hours"+restro_closing_time_in_hours);
 // check opening and closing time
 var d = new Date(); // for
var current_time_in_hours=d.getHours();
var current_time_in_hours_new=d.getHours(); // => 9
var current_time_in_of_minute=d.getMinutes(); // => 9
//alert('current time in hour is'+current_time_in_hours);
////alert('current time in minute is'+current_time_in_of_minute);
//alert('resto open  time is'+opening_time);

  


	//alert(total_bill);
	//alert(minimum_order);
	
	if(total_bill<minimum_order){
	  error="your total bill is below than minimum order("+ minimum_order +")";
	}
	//check closing time 
	else if (current_time_in_hours>restro_closing_time_in_hours) {
		error="our restaurants has been close!!";
	}
	else if (current_time_in_hours==restro_closing_time_in_hours && current_time_in_of_minute>closing_time_minute) {
		//alert(current_time_in_hours);
		//alert(restro_closing_time_in_hours);
		error="our restaurants has been close by minute!!";
	}
	//check opening time
	else if (current_time_in_hours_new < restro_opening_time_in_hours) {
		//alert('current time in hours_new:'+current_time_in_hours_new);
	//alert(restro_opening_time_in_hours);
		error="our restaurant is not open yet it will be open at"+restro_opening_time_in_hours+':'+restro_opening_time_in_minute;
	}
	else if (current_time_in_hours_new==restro_opening_time_in_hours && current_time_in_of_minute<restro_opening_time_in_minute) {
		//alert('current time in hours_new:'+current_time_in_hours_new);
	//alert(restro_opening_time_in_hours);
		error="our restaurant is not open yet by minute it will be open at"+restro_opening_time_in_hours+':'+restro_opening_time_in_minute;
	}
    else if (error==0) {
       document.getElementById("proceed_btn").disabled = false;
       document.getElementById("varified_checkout").click();
    }
    if(error!=0){
   
    document.getElementById("error_checkout").innerHTML=error;
    document.getElementById("error_checkout").style.color = "red";
    }
    
	
	
	}
</script>
<a href="#delivery_form_id" id="varified_checkout"></a>
<?php require_once('inc/footer.php') ?>
