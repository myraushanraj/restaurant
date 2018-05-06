<?php require_once('inc/header1.php');
require_once "class/food_category_class.php";
require_once "class/menu_class.php";
$rest_setup=new rest_setup('bawarchi');
$cat_arr=$rest_setup->restaurant_food_category();
?>
<div class="head_banner" style="background-image:url(http://eatnary.com/icon/<?php echo $setup->banner1;?>);">
  <div class="head_banner" style="background: #0000004f;"></div>

</div>
<div class="tag_line col-md-12">
	<div class="col-md-6"><h3 style="text-align: center"><?php echo $setup->tag_line?></h3>

 <div style="    text-align: center;
    margin-top: 53px;"><a href="#make_order"><button class="make_order_btn">Make an order</button></a><button class="learn_more_btn">Learn more</button></div>

  </div>
 
</div>
<div class="row">
<div class="col-md-6" style="height: 500px;
    background-image: url(https://static1.squarespace.com/static/58d863bfdb29d62600f738f8/t/598207f359cc68ce1875eae2/1501693940409/coffeemugsolo.png);"></div>
<div class="col-md-6">
  <div style="    padding: 54px 0 0 0;">
  <h3 style="text-align:center">About</h3>
  <p style="font-size:15px;text-align: center"><?php echo $setup->about?></p>
  </div>
</div>
</div>
  <!-- how it works -->
    <div class="servies" id="services" style=" background-image: url(http://localhost/food/temp/web/img/secondimage.png);">
    <div class="container">
      <h3 class="trending">How It Works</h3>
    
      <div class="skill_info_wthree_agile">
        <div class="col-md-3 works">
          <img src="img/menu.png">
        <div class="col-xs-12 banner_bottom_grid_right">
                <p>You choose menu and place order</p>
              </div>  
        </div>
        <div class="col-md-3 works">
        <img src="img/location.png">
        <div class="col-xs-12 banner_bottom_grid_right">
                <p>You receive track link</p>
              </div>  
        </div>
        <div class="col-md-3 works">
          <img src="img/wallet.png">
          <div class="col-xs-12 banner_bottom_grid_right">
                <p>Delivery boy picks delivery, you pay for your order</p>
              </div>  
        </div>
          <div class="col-md-3 works">
          <img src="img/like.png">
          <div class="col-xs-12 banner_bottom_grid_right">
                <p>Happy customers put a review</p>
              </div>  
        </div>

        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <!-- //how it works -->




<div class="container-fluid" style="background: url(banner-back.png)">
    <div class="row" id="menu" style="    background: url(icon/banner-back.png);
    background-size: 51%;
    background-position: 45% 191px;
    background-repeat: no-repeat;"><br>
        <div class="col-md-12" style="">
          <h3 class="text-center" id="make_order" style="">Menu</h3>
      

            </div>
        <!-- =======  food ordering wala main part starts ====================== -->
        <?php for ($i=0; $i < sizeof($cat_arr) ; $i++) { 
                   if(!isset($_SESSION['product_chain']))  
                   {
                      $_SESSION['product_chain']='';
                   }
       $cart_arr=explode('///',$_SESSION['product_chain']);
       $pic_arr=restaurant_menu_unpicced($cat_arr[$i]['category']);?>

<div class="menu-body col-md-6" style="PADDING-LEFT: 8%;">
   <!-- Section starts: Appetizers -->
   <div class="menu-section">
      <h2 class="menu-section-title"><?php echo $cat_arr[$i]['category']?></h2>

     <?php 

        for($k=0;$k<sizeof($pic_arr);$k++)
        {        
            $product=new products($pic_arr[$k]['sl']);
           // find this product id 
            $cart_value=0;
            for ($l=0; $l < sizeof($cart_arr); $l++) { 
             if(explode('$$$',$cart_arr[$l])[0]==($product->productid))
              {
                 $cart_value=explode('$$$',$cart_arr[$l])[1];
              }
                                                }
                ?>


      <!-- Item starts -->
      <div class="menu-item">
         <div class="menu-item-name">
            <?php echo $product->title?>
         </div>
         <div class="menu-item-price">
            <?php echo $product->selling_price_formatted?>
         </div>
         <div class="menu-item-description">
            <?php echo $product->description?>
         </div>
         <div class="cart-add-menu">
           <!-- === cart ==============-->
<a href="javascript:void(0)" onclick="qty_counter_update('desc','<?php echo $product->productid?>')"><img src="icon/minus.png">
</a>
     <input type="text"  readonly style="outline: none;border:none;width:45px;background: none" value="<?php echo $cart_value?>" id="pr<?php echo $product->productid?>">
 <a href="javascript:void(0)" onclick="qty_counter_update('asc','<?php echo $product->productid?>')"><img src="icon/plus.png"></a>
           <!-- === cart =============== -->
         </div>
      </div>
      <!-- Item starts -->
<?php } ?>
   </div>
</div>
<?php } ?>
        </div><!-- col-md-6-->
       
</div>

<!-- trending food image -->
        <div class="row" style="">
            <!--row!-->
           <div class="col-xs-4" style="padding: 0;margin:0">
              <a href="#"><img src="images/g3.jpg" style="width: 100%"></a>
            </div> <div class="col-xs-4" style="padding: 0;margin:0">
              <a href="#"><img src="images/g5.jpg" style="width: 100%"></a>
            </div> <div class="col-xs-4" style="padding: 0;margin:0">
              <a href="#"><img src="images/g6.jpg" style="width: 100%"></a>
            </div>
           
       </div>
       
     
<!-- //trending food image -->
<!-- contact  -->
<div class="container">
 <div class="row">
        <div class="col-md-6">

          <form action="/action_page.php" style="">
                    <div class="form-group">
      <label for="email">Name</label>
      <input type="email" name="name" class="form-control" id="email" placeholder="Enter Name">
    </div>

      <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>

                <label for="country">Phone</label>
                <input type="text" id="lname" name="lastname" placeholder="Your Phone..">

                <label for="subject">Message</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
              <button type="button" class="btn btn-danger" style="background: red;color: white;border-radius: 12px;width:120px;    padding: 6px 23px;">Submit</button> 
          </form>
        </div>

      <div class="col-md-6" style="padding-top:30px">

<!-- ==  gooogle map iframe embed here ================= -->
<div class="map">
<?php echo $setup->gmap_iframe;?>
<!-- =-==  google map ka ifrane ends here ============= -->
</div>
   <br><br>
   <b>
    <h3>Address:</h3>
   <p><?php echo $setup->support_address?></p>
   
</div>
     </div>
</div>
<!-- //contact -->
<!-- loader script -->
<script>
$(document).ready(function() {
//Preloader
$(window).load(function() {
var preloaderFadeOutTime = 500;
function hidePreloader() {
var preloader = $('.spinner-wrapper');
preloader.fadeOut(preloaderFadeOutTime);
}
hidePreloader();
});
}); 
</script>
<script>
function qty_counter_update(type,id){
if(type=="asc")
{
document.getElementById('pr'+id).value=((+document.getElementById('pr'+id).value)+1);
var newqty=document.getElementById('pr'+id).value;
}else
{

if(document.getElementById('pr'+id).value!=0)
 document.getElementById('pr'+id).value=((+document.getElementById('pr'+id).value)-1);

var newqty=document.getElementById('pr'+id).value;
}
update_my_cart(id,newqty);
}
// function for ,m odifying the c art updat by the user  
function update_my_cart(productid,newqty){ 

call_loader();

var xmlhttp;    
if(window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
  
refresh_cart();refresh_header();call_loader();
    }
  }
xmlhttp.open("GET","callscripts/add_to_cart.php?modify_cart="+productid+'&newqty='+newqty,true);
xmlhttp.send();
}
</script>


<!-- ==  footer =-========================== -->
<?php 
require_once "inc/footer.php";
?>

<!-- ==  footer ends here ===================== -->



<script src="lightbox2/src/js/lightbox.js"></script>
</body>
</html>


