<?php
require_once "class/all-class.php";
require_once "class/menu-class.php";
include_once 'top-nav.php';
require_once "class/misc-class.php";
require_once "class/misc-class.php";
include_once "class/setup-class.php";
if(isset($_POST['update_icon']))
{
      $rest_key=REST_KEY;
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
echo $cmd;

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
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Tabels</li>
</ol>

<div class="agile-grids"> 
        <!-- tables -->
       <?php $setup=new web_controllers();?>


<!--- ======= MAIN BODY OF THE SETUP CLASS =============================================================================================== -->
<div class="row">
<div class="col-md-3 col-sm-4">
      

      <strong><i>Current theme : </i></strong>
    </div>
<div class="col-md-3 col-sm-4" style="background:<?php echo $setup->theme1?>;
    color: white;
    height: 85px;
    border-radius: 50%;
    width: 85px;"></div>
<a href="color-choser/" class="col-md-3 col-sm-4" style="background:url(icon/hs.png);
    color: white;
    height: 85px;
    border-radius: 50%;
    width: 85px;"></a>

</div>

   <div class="agile-tables">
      <div class="row" id='allwise'>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default trans">
                  
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style='max-width:900px;width:100%;font-size:10px'>
                        <thead> 
<tr> 
<th>#</th> 
<th>Item</th> 
<th>&nbsp;</th> 
<th>Warehouse pic</th> 


</tr> 
</thead> 
<tbody> 

          <tr><td>1</td>
              <td>Company Logo</td>
                   <td>
   <a href="javascript:void(0)" data-toggle='modal' data-target='#pic_uploader' 
 class='btn btn1' style='background:maroon;color:white' onclick="update_icons('logo')">Update new</a>

                  </td>
              <td><img src='../icon/<?php echo $setup->logo;?>' width='100'> </td>
          </tr>
          <tr><td>2</td>
              <td>favicon </td>
                   <td>
   <a href="javascript:void(0)" data-toggle='modal' data-target='#pic_uploader' 
 class='btn btn1' style='background:maroon;color:white' onclick="update_icons('favicon')">Update new</a>

               </td>
              <td><img src='../icon/<?php echo $setup->favicon;?>' width='100'> </td>
          </tr>
           
           
            
      
          <tr><td>7</td>
              <td>Loader Image</td>
                <td>
   <a href="javascript:void(0)" data-toggle='modal' onclick="update_icons('loader')" data-target='#pic_uploader' 
 class='btn btn1' style='background:maroon;color:white'>Update new</a>

               </td>
              <td><img src='../icon/<?php echo $setup->loader;?>' width='100'> </td>
                 
          </tr>
             <tr><td>8</td> 
              <td>Cart link icon (on header)</td>
                <td>
   <a href="javascript:void(0)" data-toggle='modal' onclick="update_icons('cart_link_src')" data-target='#pic_uploader' 
 class='btn btn1' style='background:maroon;color:white'>Update new</a>

               </td>
              <td><img src='../icon/<?php echo $setup->icon_cart_link;?>' width='100'> </td>
                 
              </tr>
                  <tr>
                    <td>9</td>
              <td>Empty cart</td>
                <td>
   <a href="javascript:void(0)" data-toggle='modal' onclick="update_icons('empty_cart_src')" data-target='#pic_uploader' 
 class='btn btn1' style='background:maroon;color:white'>Update new</a>

               </td>
              <td><img src='../icon/<?php echo $setup->icon_empty_cart;?>' width='100'> </td>
                 
               </tr>
                <tr><td>10</td>
              <td>Remove cart item</td>
                <td>
   <a href="javascript:void(0)" data-toggle='modal' onclick="update_icons('remove_cart_src')" data-target='#pic_uploader' 
 class='btn btn1' style='background:maroon;color:white'>Update new</a>

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

<form action="#" method='post'>

<label>Do you want to have FAQ PAGE</label>
<input type='radio' name='has_faq' <?php if(($setup->has_faq))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_faq' <?php if(!($setup->has_faq))echo "checked='checked'"; ?> value='0' >No

<label>Do you want to have Privacy Policy PAGE</label>
<input type='radio' name='has_privacy' <?php if(($setup->has_privacy))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_privacy' <?php if(!($setup->has_privacy))echo "checked='checked'"; ?> value='0' >No

<label>Do you want to have terms & condition PAGE</label>
<input type='radio' name='has_terms' <?php if(($setup->has_terms))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_terms' <?php if(!($setup->has_terms))echo "checked='checked'"; ?> value='0' >No

<label>Do you want to have contact PAGE</label>
<input type='radio' name='has_contact' <?php if(($setup->has_contact))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_contact' <?php if(!($setup->has_contact))echo "checked='checked'"; ?> value='0' >No



<label>Do you want to have track order at footer</label>
<input type='radio' name='has_track_order' <?php if(($setup->has_track_order))echo "checked='checked'"; ?> <?php if(($setup->has_faq))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_track_order' <?php if(!($setup->has_track_order))echo "checked='checked'"; ?> value='0' >No


<label>Do you want to allow saved order for users</label>
<input type='radio' name='has_saved_order' <?php if(($setup->has_saved_order))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_saved_order' <?php if(!($setup->has_saved_order))echo "checked='checked'"; ?> value='0' >No

<label>Do you want to have support_ticket at footer</label>
<input type='radio' name='has_support_ticket' <?php if(($setup->has_support_ticket))echo "checked='checked'"; ?> value='1' >yes
<input type='radio' name='has_support_ticket' <?php if(!($setup->has_support_ticket))echo "checked='checked'"; ?>  value='0' >No
<br><BR>





<input type='submit' name='checks_submit' class='btn btn-warning'>
</form>


</div>
<!-- === row for page entries  ==================== -->

<div class="row" >

<form action="#" method='post'>

<label>Check the pages you want to have in your website :</label>
<ul type="none" class="pages-ul">
<li><a href="update-faq.php" class="btn btn-success">FAQ Update/View</a></li> 
<li> <a href="update-privacy.php" class="btn btn-success">Privacy Update/View</a></li>
<li><a href="update-faq.php" class="btn btn-success">Terms Update/View</a></li>
</ul>
<input type='submit' name='pro_1' class='btn btn-warning'>
</form>


</div>

              <!-- ====== row for page entries  ========== -->


              <table class="table table-striped table-bordered table-hover" id="dataTables-example" style='max-width:900px;width:100%;font-size:10px'>
                        <thead> 
<tr> 
<th>#</th> 
<th>Item</th> 
<th>&nbsp;</th> 
<th>Warehouse pic</th> 


</tr> 
</thead> 
<tbody> 

          <tr><td>1</td>
              <td>Banner - 1</td>
                   <td>
   <a href="javascript:void(0)" data-toggle='modal' data-target='#pic_uploader' 
 class='btn btn1' style='background:maroon;color:white' onclick="update_icons('banner1')">Update new</a>

                  </td>
              <td><img src='../icon/<?php echo $setup->banner1;?>' width='100'> </td>
          </tr>

</tbody>

        </table>

<!-- ===-  riow for trhe color theme selection for the cliebnt ======================= -->

<div class='row' style='margin-top:120px' >
<strong >Change theme fro my platform </strong>



<a href="color-choser" target="_blank">Go for it</a>
</div>



<!-- ===  theme selection ends here =============================================== -->




<!--inner block end here-->

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

</script>
        <?php
include_once('footer.php');
?>