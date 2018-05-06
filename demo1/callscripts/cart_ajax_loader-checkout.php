<?php 
include_once "../class/product_class.php";
include_once "../class/cart_class.php";
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
    color: #cb202d !important;
    margin-right: 23px;
    font-style: italic;
    font-weight: bold;
    font-size: 22px;

}
.cart-remove{
  margin-left: 30px
}
.item-title{
  
    width: 56%;
    color: #332e2e !important;
    font-size: 15px !important;
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
include_once '../inc/all_class.php';
                $master_arr=explode('///',$_SESSION['product_chain']);
                if(sizeof($master_arr)<=1)
                  echo '<br><p style="color: #676962;
    font-size: 16px;">I am Hungry !</p>';

    ?>
    <img src="https://i.pinimg.com/236x/bd/9f/93/bd9f93754d574068d7521cf88bf66083--hand-logo-food-logos.jpg" width="125"><br>
                   <strong>Please Review your checkout before final checkout !</strong><br>
    <?php
                    for($r=0;$r<sizeof($master_arr)-1;$r++)
                    {

                      $id=explode('$$$',$master_arr[$r])[0];
                      $qty=explode('$$$',$master_arr[$r])[1];
                      $cart_product=new products($id);                
                      $cart=new cart_all();
                      ?>

<ul>
<li class="same-line"><?php echo $qty;?></li>
<li class="same-line"><?php echo $cart_product->title.' - '?></li>
<li class="same-line"><?php echo '&#8377;'.$cart_product->selling_price;?></li>
 </ul>              

 
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
     


 <script>
function refresh_cart(){
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
document.getElementById('cart').innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","callscripts/cart_ajax_loader.php?return_front_end=1",true);
xmlhttp.send();
}

function change_qty(id,type){
var last=document.getElementById('current_cart_qty'+id).value;
if(type=='asc')
{
    document.getElementById('current_cart_qty'+id).value=+last+1;

}else{
            if(last!=0)
          {
          document.getElementById('current_cart_qty'+id).value=+last-1;
          }
}
}



function hide_unhide_cart(){
  
}


  function add_to_cart(code){call_loader();
  //window.location='shop-single.php?cartadded='+code+'&qty='+qty;
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
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
refresh_cart();hide_unhide_cart();call_loader()
    }
  }
xmlhttp.open("GET","callscripts/add_to_cart.php?cartadded="+code,true);
xmlhttp.send();

}



  function remove_cart(code){call_loader();
  //window.location='shop-single.php?cartadded='+code+'&qty='+qty;
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
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
refresh_cart();call_loader()
    }
  }
xmlhttp.open("GET","callscripts/add_to_cart.php?cartremoved="+code,true);
xmlhttp.send();

}
  function clear_cart(){call_loader();
  //window.location='shop-single.php?cartadded='+code+'&qty='+qty;
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
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
refresh_cart();hide_unhide_cart();call_loader()
    }
  }
xmlhttp.open("GET","callscripts/add_to_cart.php?clear_cart=1",true);
xmlhttp.send();

}


function modify_cart_item(id,element){ 
call_loader();
var newqty=document.getElementById('current_cart_qty'+element).value;
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
refresh_cart();call_loader();
    }
  }
xmlhttp.open("GET","callscripts/add_to_cart.php?modify_cart="+id+'&newqty='+newqty,true);
xmlhttp.send();
}


function add_to_wishlist(productid){ 

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
call_loader();
    }
  }
xmlhttp.open("GET","callscripts/add_to_wishlist.php?add_to_wishlist="+productid,true);
xmlhttp.send();
}
function call_loader(){
var r=document.getElementById('loader7').style.display;
if(r=='none')
$('#loader7').show();
else
$('#loader7').hide();
}





    </script>