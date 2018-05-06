<?php 
if(isset($_GET['track_order']))
{ 
  
$orderid=trim($_GET['track_order']);
$od=new order_process();
$arr=$od->fetch_full_order_details($orderid);
if(sizeof($arr))
{
// loop after the payment is success with the valid amount 
echo "<span style='    color: #a53f3f;font-size: 16px;'> Kalaakritti status : ".$arr[0]['status']."</span><BR>";
echo "<span style='    color: #a53f3f;font-size: 16px;'> order to be delivered at : ".$arr[0]['address']."</span><BR>";
}else
echo "<span style='    color: #a53f3f;font-size: 16px;'> Sulabh Griha status ".'Seems your order id is not found'."</span><BR>";

}
?>
 <!-- Modal -->
 
 <!-- Modal -->
  <div class="modal fade" id="saved_food_track" role="dialog" style='    font-size: 13px;
    font-family: calibri;'>
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
     
        <div class="modal-body text-center">

<div id='saved_form'>
<label>Enter Mobile to continue :</label><br>
<input type='number' class="modal-input" id="saved_phone" name='saved_phone' placeholder='10 Digits only ' id='trackid' ><br><br>


</div>



        </div>
         <a href='javascript:void(0)' id="track_saved" class='modal-btn'  onclick='track_my_saved_menu()' name='update_booking'> <div class="modal-footer">
View all
        </div></a>
      </div>
   </div>
</div>
 <!-- Modal -->
 <!-- Modal -->




 <script>
function track_my_saved_menu(){
  var trackid=$('#saved_phone').val();

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

      $("#track_saved").hide();
       document.getElementById('saved_form').innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","callscripts/user_saved_menu.php?phone="+trackid,true);
xmlhttp.send();
}


</script>