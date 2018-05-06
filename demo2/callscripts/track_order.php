<?php 
if(isset($_GET['track_order']))
{ 
  require_once "../class/order_class.php";
$order_id=trim($_GET['track_order']);
print_r($order_id);
$order=new order_id($order_id);
if(!empty($order->food_status))
{

// loop after the payment is success with the valid amount 
            if($order->food_status=='inprocess')
            {?>
        <p><img src="icon/track.png" class="img-responsive"></p>
        <?php } 
           if($order->food_status=='in_kitchen')
            {?>
        <p><img src="icon/kitchen.png" class="img-responsive"></p>
        <?php } 
        if($order->food_status=='dispatched')
            { ?>
        <p><img src="icon/dispatched.png" class="img-responsive"></p>
        <?php } 
             if($order->food_status=='delivered')
            {?>
        <p><img src="icon/delivered.png" class="img-responsive"></p>
        <?php } ?>
          <?php
         if($order->food_status!='delivered')
            {?>
          <table>
            <tbody>
              <tr><td>&nbsp;&nbsp;&nbsp;</td><td>Order Id</td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $order->id?></td></tr>
              <tr> <td>&nbsp;&nbsp;&nbsp;</td><td>Order Status</td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $order->food_status?></td></tr>
              <tr><td>&nbsp;&nbsp;&nbsp;</td><td>Order Amount</td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $order->bill?></td></tr>
              <tr><td>&nbsp;&nbsp;&nbsp;</td><td>Payment Type</td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo 'Online Paid '?></td></tr>
              <tr><td>&nbsp;&nbsp;&nbsp;</td><td>Delivery Person</td><td>&nbsp;&nbsp;&nbsp;</td><td> <?php echo $order->delivery_boy_name; ?></td></tr>
              <tr><td>&nbsp;&nbsp;&nbsp;</td><td>Delivery Contact</td><td>&nbsp;&nbsp;&nbsp;</td><td> <?php echo $order->delivery_boy_phone; ?></td></tr>

            </tbody>
          </table>
          <?php }else
            echo "<strong style='font-size:24px;color:orange;margin-bottom:100px'>Please pay the bill of &#8377; $order->bill to the delivery person. Happy Eating to you :)</strong>";?>

          </div>



<?php 
}else
echo "<span style='    color: #a53f3f;font-size: 16px;'>  ".'Seems your order id is not found'."</span><BR>";
}
?>