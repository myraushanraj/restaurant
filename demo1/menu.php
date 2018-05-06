<?php 
error_reporting(0);
require_once('inc/header.php');
require_once "class/food_category_class.php";
require_once "class/menu_class.php";
$rest_setup=new rest_setup('bawarchi');
$cat_arr=$rest_setup->restaurant_food_category();
?>
<!-- banner -->
<div class="banner_menu" id="home">
<div class="menu_button">
    <div class="col-sm-4 ">
    	<div class="menu_head_outer_top">
                           >
        </div>
    </div>
    <div class="col-sm-4 ">
    	<div class="menu_head_outer_top">
                            <a href="#" class="menu_head">All Dishes</a>
       </div>
    </div>
    <div class="col-sm-4 ">
       <div class="menu_head_outer_top">
                            
       </div>
   </div>
    </div>
</div>
<!-- //banner -->
<!-- menu item -->
    <div class="col-md-4 second_row">
    	<div class="left_menu_bar">
        <?php for ($i=0; $i < sizeof($cat_arr) ; $i++) { 
                            ?>  
            <h4 class="menu_item"><a href="#cat_<?php echo $i?>" ><?php echo $cat_arr[$i]['category']?></a></h4>
                        <?php } ?>
        </div>  
    </div>
    <div class="col-md-8 second_row">
    <!-- ====  one full category div ================================================================== -->
            <?php for ($i=0; $i < sizeof($cat_arr) ; $i++) { 
                            ?>  
    	<div id="cat_loader" >
    	       <div class="col-md-12 col-xs-12">
    	             <h3 style="margin:28px 0px -10px 0px;"><span><?php echo $cat_arr[$i]['category'];?></span></h3>
               </div>  
    	<!-- ==  ONE PIC ITEM =================================== -->
<?php  $pic_arr=restaurant_menu_picced($cat_arr[$i]['category']);for($k=0;$k<sizeof($pic_arr);$k++)
{  $product=new products($pic_arr[$k]['sl']);?>
              <div class="col-md-6 col-xs-6 ">
              	<div class="menu_head_outer">
    	              <a class="p-btn" href="javascript:void(0)" style="font-weight: bold;text-transform: capitalize;" onclick="add_to_cart('<?php echo $product->productid;?>')"> <img src="img-recipe/<?php echo $product->title_pic?>" class="img-responsive">
                      </a>
    	               <div class="menu_detail">
    	                  <p><?php echo $product->title_pic?></p>
    	                  <p><?php echo $product->selling_price_formatted?> <span style="float: right;">+ 1 - </span></p>
    	               </div>
                </div> 
              </div>      
     <?php } ?>
     <!-- =====  ONE PIC OTEM ================================== -->
               <div class="clearfix "></div>
   <div class="menu_bottom_deail" id="cat_<?php echo $i;?>">
       <?php  
       $cart_arr=explode('///',$_SESSION['product_chain']);
       $pic_arr=restaurant_menu_unpicced($cat_arr[$i]['category']);?>
               
             <table class="table-responsive menu_table">
                       <tbody>
        <?php 

        for($k=0;$k<sizeof($pic_arr);$k++)
        {        
      $product=new products($pic_arr[$k]['sl']);
// find this product id 

    $cart_value=0;
for ($l=0; $l < sizeof($cart_arr); $l++) { 
    # code...

    if(explode('$$$',$cart_arr[$l])[0]==($product->productid))
    {
                $cart_value=explode('$$$',$cart_arr[$l])[1];
     }
}
    ?>
                                  <tr>

                                         <td>
                                         <?php if($product->is_veg){ ?>
                                          <div class="veg-circle"></div>
                                          <?php }else{?>
                                          <div class="non-veg-circle"></div>
                                          <?php } ?>
                                         <a class="p-btn" href="javascript:void(0)" style="font-weight: bold;text-transform: capitalize;" onclick="add_to_cart('<?php echo $product->productid;?>')"><?php echo $product->title?>
                                         </a></td>
                                         <td><a href="javascript:void(0)" onclick="qty_counter_update('desc','<?php echo $product->productid?>')"><img src="icon/minus.png"></a></td>
                                         <td><input type="text"  readonly style="outline: none;border:none;width:25px;background: none" value="<?php echo $cart_value?>" id="pr<?php echo $product->productid?>"></td>
                                         <td><a href="javascript:void(0)" onclick="qty_counter_update('asc','<?php echo $product->productid?>')"><img src="icon/plus.png"></a></td>
                                         <td class="menu_price"><?php echo $product->selling_price_formatted ?>&nbsp;&nbsp;</td>
                                   </tr>
                                     <tr class="border">
                                     <td style="color:red;font-style: italic;"><?php echo $product->description?></td></tr>

      <?php } ?>  
                         </tbody>
            </table>
               </div>
      </div>    
      <?php } ?>               
    
    <!-- ====  one full category div ================================================================== -->


    </div>
    <div class="clearfix "></div>
    <!-- //menu item -->
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


<?php require_once('inc/footer.php') ?>