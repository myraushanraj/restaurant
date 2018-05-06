<?php
require_once "class/all-class.php";
require_once "class/menu-class.php";
include_once 'top-nav1.php';
require_once "class/misc-class.php";
require_once "class/misc-class.php";
include_once "class/setup-class.php";
// logot and check session
if(!isset($_SESSION['admin_logged'])){
  ?>
<script>

  window.location='user-login.php';
</script>
  <?php
}
if(isset($_GET['logout'])){
unset($_SESSION['admin_logged']);?>
<script>
  window.location="index.php";
</script>
  <?php
}
// logot and check session end
$rest_key=REST_KEY;
if(isset($_POST['update_icon']))
{
      
      $picsel=$_POST['picsel'];
      $iconfor=$_POST['iconfor'];
      date_default_timezone_set("Asia/calcutta");
    $timings1=date('Y-m-d H:i:s');
$d1=new dbconn();
$d1=new dbconn();
$db=$d1->connect();  

       $cmd="UPDATE web_controllers set $iconfor='$picsel' where rest_key='$rest_key';UPDATE last_updates set icon='$timings1' where rest_key='$rest_key'";
       $result=$db->query($cmd);

}

if(isset($_POST['checks_submit']))
{
  
     
      $has_track_order=$_POST['has_track_order'];
      $has_support_ticket=$_POST['has_support_ticket'];
      $has_saved_order=$_POST['has_saved_order'];
   $has_faq=$_POST['has_faq'];
   $has_terms=$_POST['has_terms'];
   $has_privacy=$_POST['has_privacy'];

   $has_contact=$_POST['has_contact'];
$rest_key=REST_KEY;
date_default_timezone_set("Asia/calcutta");
    $timings1=date('Y-m-d H:i:s');
$d1=new dbconn();
$db=$d1->connect();  
 
       $cmd="UPDATE web_controllers set has_support_ticket='$has_support_ticket',has_track_order='$has_track_order',use_privacy_page='$use_privacy_page',use_privacy_page='$has_privacy',use_terms_page='$has_terms',use_faq_page='$has_faq',use_contact_page='$has_contact',has_saved_order='$has_saved_order' where rest_key='$rest_key';UPDATE last_updates set settings='$timings1' where rest_key='$rest_key'";
       $result=$db->query($cmd);


}

if(isset($_POST['pro_1']))
{
$rest_key=REST_KEY;
$product_arrival_count=$_POST['product_arrival_count'];
$product_trending_count=$_POST['product_trending_count'];
$d1=new dbconn();
$db=$d1->connect();  
      $xs=12/$_POST['col_settings_xs'];
      $md=12/$_POST['col_settings_md'];
      $sm=12/$_POST['col_settings_sm'];
      $lg=12/$_POST['col_settings_lg'];
      $col_text='col-xs-'.$xs.' '.'col-sm-'.$sm.' '.'col-md-'.$md.' '.'col-lg-'.$lg;
      $cmd="UPDATE web_controllers set product_row_count_var='$col_text',product_trending_count='$product_trending_count',product_arrival_count='$product_arrival_count' where rest_key='$rest_key'";
      $result=$db->query($cmd);

}

?>

<!-- ===============NOTIFICATION FOR ADMIN ACTION ==================================== -->
<div class="modal fade" id="pic_uploader" role="dialog">
  
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:red;color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Choose a pic</h4>
        </div>
        <div class="modal-body" id='pic_selection_body'>
          <!-- ==  body ==-->
<!-- == windoiw for coverpic selecttion =============== -->


<!-- ===  window for coverpic selection =============== -->

          <!-- == body == -->
        </div>
        <div class="modal-footer" style='border-top:none'>

        </div>
      </div>
      
    </div>
  </div>

  <!-- -=============== update order ka notifications starts here ================================= -->

<!-- =-==  popoupo ends here ========================================== -->
<!--heder end here-->
<div>

<h4 style="text-align: center;">Step <span style="    font-weight: 700;
    color: red;
    font-size: 23px;">2</span> of 2</h4>
  <h5 style="text-align: center;margin-top: 24px;">Please answer the following questions to help us build your website</h5>
 
</div>

<div class="agile-grids"> 
        <!-- tables -->
       <?php $setup=new web_controllers();?>


<!--- ======= MAIN BODY OF THE SETUP CLASS =============================================================================================== -->

 <div class="agile-tables" style="width: 100%">
      <div class="row" id='allwise'>
                <div class="col-md-12" style="padding: 0px">
                    <!-- Advanced Tables -->
                    <div class="">
                  
                        <div class="">
                            <div class="table-responsive">
                                <table class="table_setup2" id="dataTables-example" style='margin:auto;max-width:900px;;font-size:10px'>
                        <thead> 
<tr> 
<td>1</td> 
<td>Current theme</td> 
<td><a href="color-choser/" target="_blank" class="col-md-3 col-sm-4" style="background:url(icon/hs.png);
    color: white;
    height: 85px;
    border-radius: 50%;
    width: 85px;"></a></td> 
<td><a class="col-md-3 col-sm-4" style="background:<?php echo $setup->theme1?>;
    color: white;
    height: 85px;
    border-radius: 50%;
    width: 85px;"></a>
    <input type="hidden" name="" id="theme1" value="<?php echo $setup->theme1?>">
</td> 


</tr> 
</thead> 
<tbody> 

          <tr><td>2</td>
              <td>Company Logo</td>
                   <td>
   <a href="javascript:void(0)" data-toggle='modal' data-target='#pic_uploader' 
 class='btn btn1'  style="    background: #00a63f!important;
    color: white;
    border-radius: 4px;
    text-transform: unset;" onclick="update_icons('logo')">Update new</a>

                  </td>
              <td><img src='../icon/<?php echo $setup->logo;?>'  width='100'>
               <input type="hidden" name="" id="logosrc" value="logo<?php echo $setup->logo?>"> 
          </tr>
          <tr><td>3</td>
              <td>favicon </td>
                   <td>
   <a href="javascript:void(0)" data-toggle='modal' data-target='#pic_uploader' 
 class='btn btn1' style="    background: #00a63f!important;
    color: white;
    border-radius: 4px;
    text-transform: unset;"onclick="update_icons('favicon')">Update new</a>

               </td>
              <td><img src='../icon/<?php echo $setup->favicon;?>'  width='100'> </td>
                         <input type="hidden" name="" id="favicon" value="favicon<?php echo $setup->favicon?>"> 

          </tr>
           
           
            
      
          <tr><td>4</td>
              <td>Loader Image</td>
                <td>
   <a href="javascript:void(0)" data-toggle='modal' onclick="update_icons('loader')" data-target='#pic_uploader' 
 class='btn btn1'  style="    background: #00a63f!important;
    color: white;
    border-radius: 4px;
    text-transform: unset;"">Update new</a>

               </td>
              <td><img src='../icon/<?php echo $setup->loader;?>'  width='100'> </td>
                                        <input type="hidden" name="" id="loader" value="loader<?php echo $setup->loader?>"> 
  
          </tr>
             <tr><td>5</td> 
              <td>Cart image icon (on header)</td>
                <td>
   <a href="javascript:void(0)" data-toggle='modal' onclick="update_icons('cart_link_src')" data-target='#pic_uploader' 
 class='btn btn1' style="    background: #00a63f!important;
    color: white;
    border-radius: 4px;
    text-transform: unset;"">Update new</a>

               </td>
              <td><img src='../icon/<?php echo $setup->icon_cart_link;?>' width='100'> </td>
          <input type="hidden" name=""  id="cart_image" value="cart<?php echo $setup->icon_cart_link?>"> 
  
              </tr>
              <!-- banner -->
              <tr><td>6</td> 
              <td>Banner for home page</td>
               <td>
   <a href="javascript:void(0)" data-toggle='modal' data-target='#pic_uploader' 
 class='btn btn1'  style="    background: #00a63f!important;
    color: white;
    border-radius: 4px;
    text-transform: unset;" onclick="update_icons('banner1')">Update new</a>

                  </td>
              <td><img src='../icon/<?php echo $setup->banner1;?>'  width='100'> </td>
                         <input type="hidden" name=""  id="banner_home" value="banner1<?php echo $setup->banner1?>"> 
  
              </tr>
                  <tr style="display: none">
                    <td></td>
              <td>Empty cart</td>
                <td>
   <a href="javascript:void(0)" data-toggle='modal' onclick="update_icons('empty_cart_src')" data-target='#pic_uploader' 
 class='btn btn1'  style="    background: #00a63f!important;
    color: white;
    border-radius: 4px;
    text-transform: unset;">Update new</a>

               </td>
              <td><img src='../icon/<?php echo $setup->icon_empty_cart;?>' width='100'> </td>
                 
               </tr>
                <tr style="display: none"><td>10</td>
              <td>Remove cart item</td>
                <td>
   <a href="javascript:void(0)" data-toggle='modal' onclick="update_icons('remove_cart_src')" data-target='#pic_uploader' 
 class='btn btn1'  style="    background: #00a63f!important;
    color: white;
    border-radius: 4px;
    text-transform: unset;">Update new</a>

               </td>
              <td><img src='../icon/<?php echo $setup->icon_remove_cart;?>' width='100'> </td>
                 
               </tr>



</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->


<!-- ============= ROW FOR CHECKED VALUES FROM ADMIN ======================================= -->


<div class="row" >

 <form action='#' method='post' class="form_content" style='margin-bottom:20px'>


<p>Do you want to have FAQ PAGE <span class="required_star">*</span></p>
<input type='radio' name='has_faq' required <?php if(($setup->has_faq))echo "checked='checked'"; ?> value='1'>yes
<input type='radio' name='has_faq' required <?php if(!($setup->has_faq))echo "checked='checked'"; ?> value='0' >No

<p>Do you want to have Privacy Policy PAGE <span class="required_star">*</span></p>
<input type='radio' name='has_privacy'  required <?php if(($setup->has_privacy))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_privacy' required <?php if(!($setup->has_privacy))echo "checked='checked'"; ?> value='0' >No

<p>Do you want to have terms & condition PAGE <span class="required_star">*</span></p>
<input type='radio' name='has_terms' required <?php if(($setup->has_terms))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_terms' required <?php if(!($setup->has_terms))echo "checked='checked'"; ?> value='0' >No

<p>Do you want to have contact PAGE <span class="required_star">*</span></p>
<input type='radio' name='has_contact' required <?php if(($setup->has_contact))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_contact' required <?php if(!($setup->has_contact))echo "checked='checked'"; ?> value='0'>No





<p>Do you want to have track order at footer <span class="required_star">*</span> </p>
<input type='radio' name='has_track_order' required <?php if(($setup->has_track_order))echo "checked='checked'"; ?> <?php if(($setup->has_faq))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_track_order' required <?php if(!($setup->has_track_order))echo "checked='checked'"; ?> value='0' >No


<p>Do you want to allow saved order for users <span class="required_star">*</span> </p>
<input type='radio' name='has_saved_order' required <?php if(($setup->has_saved_order))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_saved_order' required <?php if(!($setup->has_saved_order))echo "checked='checked'"; ?> value='0' >No

<p>Do you want to have support_ticket at footer <span class="required_star">*</span> </p>
<input type='radio' name='has_support_ticket' required <?php if(($setup->has_support_ticket))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_support_ticket' required <?php if(!($setup->has_support_ticket))echo "checked='checked'"; ?>  value='0' >No
<br>
<div style="text-align: center">
<p>Check the pages you want to have in your website :</p>

<a href="update-faq.php" target="_blank" class="btn btn-success" style="    background: #00a63f!important;
    color: white;
    border-radius: 4px;
    text-transform: unset;">FAQ Update / View</a>
<a href="update-privacy.php" target="_blank" class="btn btn-success" style="    background: #00a63f!important;
    color: white;
    border-radius: 4px;
    text-transform: unset;">Privacy Update / View</a>


</div>
<br><br>
<input type='submit' name='checks_submit' class='submit_btn'>
</form>
</div>
<div style="text-align: center">
<p></p>
<a href="setup-1.php" class="btn btn-success" style="width: 144px;background: green"><img src="icon/back.png" width="20%"> Back</a>&nbsp;
<a href="javascript:void(0)" class="btn btn-success" style="width: 144px;background: green" onclick="check_all_input();">Preview <img src="icon/preview.png" width="20%" ></a>



</div>

<!--========== MAIN BODY OF THE SETUP CLASS ============================================================================================== -->




<script>
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
function update_menu(){
  var menu_price=$('#menu_price').val();
  var menu_desc=$('#menu_desc').val();
    var menu_cat=$('#menu_cat').val();
  var menu_title=$('#menu_title').val();
  var menu_code=$('#menu_code').val();

xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    
document.getElementById('edit_menu_body').innerHTML=xmlhttp.responseText;
    }
  }
   xmlhttp.open("GET", "admin-scripts/edit_menu.php?menu_price="+menu_price+"&menu_desc="+menu_desc+"&menu_cat="+menu_cat+"&menu_code="+menu_code+"&menu_title="+menu_title+"&save_updated=1", true);
        xmlhttp.send();
}

function load_menu_editor(a){
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById('edit_menu_body').innerHTML=xmlhttp.responseText;
    }
  }
   xmlhttp.open("GET", "admin-scripts/edit_menu.php?load_menu_editor="+a, true);
   xmlhttp.send();
}


  function update_icons(elementname){
             
           
              call_pic_selection_ajax(elementname);
                  }

function call_pic_selection_ajax(elementname){
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

   document.getElementById('pic_selection_body').innerHTML=xmlhttp.responseText;
   document.getElementById('link_new').href='image-uploader/?imagefor='+elementname;
   document.getElementById('iconfor').value=elementname;
    }
  }
xmlhttp.open("GET","admin-scripts/pic-selection-body.php?image_for="+elementname,true);
xmlhttp.send();
}

function check_all_input(){
 
  var link="http://localhost/food/final/rest3/?restid=<?php echo $rest_key; ?>";
  var logosrc = document.getElementById("logosrc").value;
  var favicon= document.getElementById("favicon").value;
 
  var cart_image= document.getElementById("cart_image").value;
 
  var loader= document.getElementById("loader").value;
 
  var banner_home= document.getElementById("banner_home").value;
 
  var theme1= document.getElementById("theme1").value;
  

  
  var error=0;

 
 
  if (logosrc=='logo'){ 
    error="upload your logo"; 
  }
   else if (favicon=='favicon') {
        error="upload your favicon";
  }
    else  if (cart_image=='cart') {
        error="upload your cart image";
  }
    else  if (loader=='loader') {
         error="upload your loader";
  }
   else  if (banner_home=='banner1') {
         error="upload your banner";
  }
    else  if (theme1=='NULL') {
         error="choose theme1";
  }
   
  if(error==0){
   
   window.open('http://eatnary.com/demo1/?restid=<?php echo $rest_key; ?>','_blank');
  
  }else{
      alert(error);
  }
 
      
}
</script>
  
</div>
<?php
include_once('footer1.php');
?>


