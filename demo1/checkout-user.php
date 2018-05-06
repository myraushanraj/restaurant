<?php require_once('inc/header.php');require_once "class/order_class.php";?>
<style type="text/css">
			#scooter{
           animation: eye_k_a 6s infinite ; 
           
		}
		  @media only screen and (max-width:800px){
		#scooter{
           animation: none ; 
           
		}
		}
		@keyframes eye_k_a {
  from {
      margin-left: 0%;
   
  }
  to {
        margin-left: 72%;
     }
}
</style>
<?php 
if(isset($_GET['orderplaced']))
{ $order=new order_id($_GET['orderplaced']);
?>
<div class="col-md-12">
	<div class="congra theme2">
		<h3>Congratulations!! Your Order has been processed with order id <?php echo $_GET['orderplaced'];?></h3> <br>
		<div class="cogra2">
		<p>SMS Acknowledgement has been send to your mobile : <?php echo $order->phone?> </p>
		<p>Invoice for this order with track link has been attached to your mail Id: <?php echo $order->email?></p>
	</div>
	</div>

<div class="clearfix"></div>
	<!-- ===  save my order =============== -->
<form id="order_save_menu" action="callscripts/user_save_menu.php" class="text-center" style="    color: #af8f17;
    font-style: italic;
    font-size: 19px;
    margin-top: 45px;">
  <label style="    font-size: 12px;
    color: grey;
    margin-top: 35px;
    font-style: italic;">To checkout fast you can save this order </label><br>
  <input type="hidden" name="order_id" id="order_id"  value="<?php echo $_GET['orderplaced']?>">
  <input type="text" name="title_save" id="title_save"  placeholder="e.g chinese combo dinner"  style="    max-width: 300px;
    border: grey 1px dotted;
    height: 35px;
    width: 60%;">
  <input type="button" onclick="save_my_order()" name="save_submit" value="save now" class="theme1" style="background: orange;
    color: white;
    border: none;
    width: 123px;
    height:35px;
    text-transform: uppercase;
    font-family: 'Raleway', sans-serif;
    font-style: normal;">
</form>


	<!--- ==  save my order ============= -->
</div>
<?php 
} ?>
<div class="col-md-12">
	<img src="icon/scooter.png" class="img-responsive" id="scooter"> 
</div>
 <div class="clearfix "></div>
<!--- ==  script for auytomtaed call back for the treackj delivery for user =============== -->
<script>
$(document).ready(function(){

setInterval(track_delivery_auto_call,12000);


});
function track_delivery_auto_call(){

// activation after few seconds

  var this_order_id="<?php echo $_GET['orderplaced']; ?>";
  if(this_order_id!='')
    {
       document.getElementById('track_popup_link').click();
      document.getElementById('bookingidtrack').value=this_order_id;
      document.getElementById('bookingidtrackbtn').click();
      track_my_booking();
   }
}
</script>





<!-- ==  automated call baclk ka function ends here ====================================== -->





<?php require_once('inc/footer.php');
?>