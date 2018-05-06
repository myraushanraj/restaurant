<?php 
include_once "../class/menu-class.php";
include_once "../class/cart_class.php";
?>
    <style type="text/css">

.item-details{
  display: -webkit-inline-box;
      color: red !important;

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
    margin-left:20px;    max-width: 81px;
    /* background: red; */
    width: 45%;  color: red !important;
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
    margin-left: 12px;
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
  margin-left:20px
}
.item-title{
      color: red !important;
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
error_reporting(0);
echo "aaya hai ================";
include_once 'admin-inc/all_class.php';
?>
<?php 
echo "<div class='item' style='    border-bottom: 1px solid grey;padding: 9px;height:80px'>";

echo "<a href='javascript:void(0)' style='color:red;float:left' onclick='clear_cart()'><img src='https://cdn4.iconfinder.com/data/icons/line-shopping/512/shopping_cart-512.png' width='45'></a>";
echo "</div>";

                $master_arr=explode('///',$_SESSION['product_chain']);
                if(sizeof($master_arr)<=1)
                  echo '<br><p style="color: #676962;
    font-size: 16px;">I am Hungry !</p>';
                    for($r=0;$r<sizeof($master_arr)-1;$r++)
                    {

                      $id=explode('$$$',$master_arr[$r])[0];
                      $qty=explode('$$$',$master_arr[$r])[1];
                      $cart_product=new products($id);                
                      $cart=new cart_all();
                      ?>

            <div class="item" style='    border-bottom: 1px solid grey;padding: 9px;color: red'>
            
              <div class="item-details" >
                <h3 class="item-title" style="color:red"><?php echo $cart_product->title?></h3>
                <h4 class="item-price"><?php echo $cart_product->selling_price;?></h4>
               
 <div class="count-input">
                  <a class="incr-btn" data-action="decrease" href="#" onclick="change_qty('<?php echo $r;?>','desc');modify_cart_item('<?php echo $cart_product->productid?>','<?php echo $r;?>')">–</a>
                  <input class="quantity" type="text" value="<?php echo $qty;?>" id='current_cart_qty<?php echo $r;?>'>
                  <a class="incr-btn" data-action="increase" href="#" onclick="change_qty('<?php echo $r;?>','asc');modify_cart_item('<?php echo $cart_product->productid?>','<?php echo $r;?>')">+</a>
       </div>
                
                  <a href='javascript:void(0)' class='cart-remove' onclick="remove_cart('<?php echo $cart_product->productid; ?>')"><img src='icons/remove-cart.png' width='30' ></a>
                </div>
      
            
            </div><!-- .item -->
            <?php } ?>
            <!-- Item -->

            <!-- Subtotal -->
            <div class="cart-subtotal space-bottom" style='margin-top: 20px;'>
              
                <SPAN class="check1">Subtotal: &#8377;<?php echo $cart->bill;?></SPAN>
        
            </div><!-- .subtotal -->
            <!-- Buttons -->
            
                      <?php  } ?>
     
