<?php 
if(isset($_GET['track_order']))
{ 
  
$orderid=trim($_GET['track_order']);
$od=new order_process();
$arr=$od->fetch_full_order_details($orderid);
$order=new order_id($order_id);
if(sizeof($arr))
{
// loop after the payment is success with the valid amount 
            if($order->food_status=='inprocess')
            {?>
        <p><img src="icon/track.png" class="img-responsive"></p>
        <?php } 
           if($order->food_status=='in_kitchen')
            {?>
        <p><img src="icon/track.png" class="img-responsive"></p>
        <?php } 
        if($order->food_status=='dipatched')
            { echo "deliverededdddddd";?>
        <p><img src="icon/disptached.png" class="img-responsive"></p>
        <?php } 
             if($order->food_status=='delivered')
            {?>
        <p><img src="icon/delivered.png" class="img-responsive"></p>
        <?php } ?>
          <div class="cart_details2">
          <table>
            <tbody>
              <tr><td>Order Id</td><td><?php echo $order->id?></td></tr>
              <tr><td>Order Status</td><td><?php echo $order->status?></td></tr>
              <tr><td>Order Amount</td><td><?php echo $order->bill?></td></tr>
              <tr><td>Payment Type</td><td><?php echo 'Online Paid '?></td></tr>
              <tr><td>Delivery Persons</td><td> Arvind Kejriwall</td></tr>
            </tbody>
          </table>
          </div>

<?php

}else
echo "<span style='    color: #a53f3f;font-size: 16px;'> Sulabh Griha status ".'Seems your order id is not found'."</span><BR>";

}
?>
 <!-- Modal -->

<!-- track now  -->
 <!-- Modal -->
  <div class="modal fade" id="myModal_track" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <div class="modal-body text-center">

<!-- === ================= Track wala form ========================= -->
<form action='#' method='post' >

  <h4 class="modal-title">Track My Order</h4>
<div id='ajaxtrack'></div>
<label>Enter the 10 Digit Booking Id :</label><br>
<input type='text' class="modal-input" id="bookingidtrack" name='bookingidtrack' placeholder='Enter the booking Id ' id='trackid' >
</form>

<!-- ===  track wala form ============================================ -->
  
        </div>
      <div class="modal-footer" style="text-align: center">
<a style="color:#ffffff" href='javascript:void(0)' id="bookingidtrackbtn" class='modal-btn'  onclick='track_my_booking()' name='update_booking'>Track</a>
        </div>
      </div>
    </div>
  </div>
<!-- //track now -->





 
 <!-- Modal -->
  <div class="modal fade" id="trackorder" role="dialog" style='    font-size: 13px;
    font-family: calibri;'>
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Track My Booking </h4>
        </div>
        <div class="modal-body text-center">

<form action='#' method='post' >
<div id='ajaxtrack'></div>
<label>Enter the 10 Digit Booking Id :</label><br>
<input type='text' class="modal-input" id="bookingidtrack" name='bookingidtrack' placeholder='Enter the booking Id ' id='trackid' ><br><br>

<a href='javascript:void(0)' style="text-align: center" id="bookingidtrackbtn" class='modal-btn'  onclick='track_my_booking()' name='update_booking'>Track</a><br>
</form>




        </div>
      </div>
   </div>
</div>
 <!-- Modal -->
 <!-- Modal -->




 <script>
function track_my_booking(){

  var trackid=$('#bookingidtrack').val();
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

       document.getElementById('ajaxtrack').innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","callscripts/track_order.php?track_order="+trackid,true);
xmlhttp.send();


}


</script>