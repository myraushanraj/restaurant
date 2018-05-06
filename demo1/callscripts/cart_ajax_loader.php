<?php 
include_once "../class/product_class.php";
include_once "../class/cart_class.php";
include_once "../class/setup-class.php";
$setup=new web_controllers();
?>
    <style type="text/css">

.item-details{
  display: -webkit-inline-box;
}
.shopping-cart{
    background: #2a9ecc !important;
    padding-left: 10%;color: white;
    padding-top: 23px;
    margin-bottom: 200px;
    box-shadow: 0px 1px 10px 0px #211313;
        overflow-y: scroll;
    height: 36vw;min-height: 380px
}
.item-title{
    font-size: 12px;
    margin-left: 9%;    max-width: 81px;
    /* background: red; */
    width: 45%;  color: #f8f7f9 !important;
}
.item-price{
      font-size: 16px;
    margin-left:12px;

}
.count-input {
    position: relative;
    width: 100px;    margin-right: 11px;
    margin: 10px 0;
}
.count-input .incr-btn {
    display: block;
    position: absolute;
    width: 36px;

    font-size: 18px;
    color: #606060;
    font-weight: 300;
    text-align: center;

    text-decoration: none;
    top: 0;
    right: 0;
}
.count-input input {
    width: 100%;

    border: 2px solid #ededed;
    border-radius: 4px;
    background: none;
    text-align: center;
    -webkit-appearance: none;
    -moz-appearance: none;
    -o-appearance: none;
    appearance: none;
}
.count-input{
    font-size: 15px;
    margin-left: 14%;
    /* background: red; */
    margin-top: -2px;}.count-input .incr-btn:first-child {
    right: auto;
    left: 0;
}
.check1{
    color: #d2c6c6 !important;
    margin-right: 23px;
    font-style: italic;
    font-weight: bold;

}
.cart-remove{
  margin-left: 30px
}
.item-title{
  
    width: 56%;
    color: white !important;
    font-size: 12px !important;
    text-transform: capitalize;
    max-width: 155px;

}
.add_cart{    background: #9da8ad !important;
    color: white !important;
    border: 2px solid #FFFFFF;
    max-width: 258px;
    padding: 6px;
    font-size: 15px;
}
    </style>
            <!-- Item -->
            <?php 
if(isset($_GET['return_front_end']))
{
?>


  <div class="col-md-12">
  <h4 class="content_title" style="padding-top: 10px">Order Details</h4>
  </div>
  <hr>
  <?php $cart=new cart_all();
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
          <td colspan="5" class="theme1" onclick="check_minimum_order()"><a href="javascript:void(0)">Checkout</a></td>
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

<?php } ?>
 