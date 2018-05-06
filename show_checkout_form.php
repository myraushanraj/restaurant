
<!-- =====  ADDRESS AUTO FILL ================================ -->

          <form method="get" class="checkout-form container" action='callscripts/order_placement.php'>
            <div class="cart-subtotal space-bottom">
              <div class="column">
                <h3 class="toolbar-title">Checkout</h3>
              </div>
              <div class="column">
                <h3 class="amount"><small class="hidden-xs">3 items&nbsp;&nbsp;&nbsp;</small>&#8377;23246</h3>
              </div>
            </div><!-- .subtotal -->
            <div class="row">
              <div class="col-sm-6">
                <input type="text" id="name1"  required name="name1" placeholder="First name" required>
                <input type="email"  placeholder='Enter Email Id' id="email1" value="" required   name="email1">
                <input type="text"  id="phone1" required   name="phone1">
              </div>
              <div class="col-sm-6">
            
                <input type="text" id="line1"  required name="line1" placeholder="address line 1">
                <input type="text" id="line2"  required name="line2" placeholder="address line 2">
                         <input type="text"  id="city1"  required name="city1" placeholder="Town or city" required>
           
              </div>
            </div><!-- .row -->
            <div class="row">
              <div class="col-sm-12">
 
                 <ul type='none'>
<li style="display:inline-block;margin-right:23px;">
                <input type="radio" name="pay_method" value="COD" required style="color:maroon"> Cash on delivery
              </label></li>
              </ul>
                <div class='row' style='    color: black;
    border: 2px dotted #b6b6b6;
    padding: 14px;
    max-width: 800px;
    margin-left: 12%;'>
<strong>Apply coupon and offers</strong>
<!-- ==  coupon code algorithm ================= -->
<ul type='none' class='pull-left cold-sm-12 col-md-6' style='     float: right;text-align:right;
    font-size: 16px;font-size:13px;font-weight:bold;font-family:calibri;
    margin-right: 8%;'> <li style="" id='realamount'>Total Amount: &#8377;<strong  id='realamount1'>23246</strong>

<li style='color:red;display:none' id='couponapplied'>(-)Discount : &#8377; <strong  id='couponamount'></strong> </li>
<li style=''>Payable Amount : &#8377;<strong id='payamount'>23246</strong> </li>
  </ul>
<br>

<!-- ==  coupon code algorithm ================ -->

     
<ul type='none' class='pull-right cold-sm-12 col-md-6'  id='coupon-ul' style='float:left'>
          <li>  <input type="text" placeholder='Enter Your coupon code ' style='    width: 115px !important;
    display: inline-block;
    min-width: 189px' name='couponentry' class='coupon-entry'  id="couponentry"> 
            <a href='javascript:void(0)' class="add-to-cart" onclick="apply_coupon()" style='background: #cb202d;
    color: white !important;
    padding: 6px;
    display: inline-block;
    font-style: italic;
    padding-left: 23px;
    padding-right: 24px;'>CHECK</a></li>
     
</ul>
<!-- ==  coupoin code input ====== -->
<br><strong style='color: #134a89;
    position: absolute;
    /* margin-top: 73px; */
    margin-left: -33%;' id='couponstatus'></strong><BR>
<a href='javascript:void(0)' onclick="remove_coupon()" id='remove_coupon' style='display:none'>REMOVE</a>

</div>




                   <input name='submit_order' type="submit" value="I agree to proceed" class="theme-btn" style="height: 40px;" value='Submit'>
              </div>
             
            </div><!-- .row -->
        
 
          </form><!-- .checkout-form.container -->
