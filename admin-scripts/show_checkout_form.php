<?php
include_once "../class/cart_class.php";
$cart1=new cart_all();
?>
<!-- =====  ADDRESS AUTO FILL ================================ -->

<div class="container" style="    padding-top: 60px;
">
<span style="font-style: italic;font-size: 33px">We are just a checkout away ...</span>
<div class="col-md-6">
          <form method="get" class="checkout-form container" action='admin-scripts/order_placement.php'>
         
                <input type="text" id="name1" class="input-checkout" required name="name1" placeholder="First name" required>
                <br><input type="email" class="input-checkout" placeholder='Enter Email Id' id="email1" value="" required   name="email1">
                <br><input type="text" placeholder="Enter 10 digit Mobile" class="input-checkout" id="phone1" required   name="phone1">
                <br><textarea name="address" placeholder="Enter full address" class="input-checkout" id="address"></textarea>
           
             <br>
<!-- ==  coupon code algorithm ================ -->

                   <input name='submit_order' type="submit" value="Place order now " class="theme-btn" style="height: 40px;" value='Submit'>
 
          </form><!-- .checkout-form.container -->
          </div>
          <div class="col-md-6">
          <ul>
            <li>Please collect Rs <?php echo $cart1->bill?> before You place the order </li>
            <li>All values are mandatory.Fill all the values before checkout</li>

            <li>Customer will recieve SMS plus Email acknowledgement to track the order </li>

            <li>Add the denominations below for account maintainance </li>


          </ul>


          </div>
