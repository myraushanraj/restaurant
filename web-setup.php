<?php
include_once 'top-nav.php';
require_once "class/misc-class.php";
include_once "class/setup-class.php";
if(isset($_POST['setup_done']))
{
    $rest_key=REST_KEY;
  $company=$_POST['company'];
  $domain=$_POST['domain'];
  $product=$_POST['product'];
  $meta_title=$_POST['meta_title'];
  $meta_description=$_POST['meta_description'];
  $company=$_POST['company'];
  $company=$_POST['company'];
  $support_address=$_POST['support_address'];
  $support_phone=$_POST['support_phone'];
  $support_email=$_POST['support_email'];
  $gmap_iframe=$_POST['gmap_iframe'];
  $has_cod=$_POST['has_cod'];
  $has_online_pay=$_POST['has_online_pay'];
  $textlocal_username=$_POST['textlocal_username'];
  $textlocal_password=$_POST['textlocal_password'];
      $has_sms=$_POST['has_sms'];
      $payu_key=$_POST['payu_key'];
      $payu_salt=$_POST['payu_salt'];
      $paytm_key=$_POST['paytm_key'];
      $paytm_salt=$_POST['paytm_salt'];
      $order_phone=$_POST['order_phone'];
      $order_email=$_POST['order_email'];


// delivery ralated data starts here =================================

$rest_name=$product;
$delivery_range=$_POST['delivery_range'];
$minm_order=$_POST['minm_order'];
$otime=$_POST['opens'];
$ctime=$_POST['closes'];
$gst=$_POST['gst'];
$delivery_charge=$_POST['delivery_charge'];
$address=$support_address;


// ========================================================================================================= 

                     $d1=new dbconn();
                     $db=$d1->connect();
                     $rest_key=REST_KEY;
$cmd="UPDATE web_controllers set hosted_domain='$domain',company='$company',product='$product',meta_title='$meta_title',meta_description='$meta_description',has_cod='$has_cod',has_online_pay='$has_online_pay',has_sms='$has_sms',textlocal_username='$textlocal_username',textlocal_password='$textlocal_password',payu_salt='$payu_salt',payu_key='$payu_key',support_email='$support_email',support_address='$support_address',support_phone='$support_phone',gmap_iframe='$gmap_iframe',order_email='$order_email',order_phone='$order_phone' where rest_key='$rest_key'";
   $result=$db->query($cmd);


// update the restaurant  delivery settings =====================
  $cmd="UPDATE rest_details set rest_name='$rest_name',address='$address',deliveryrange='$delivery_range',otime='$otime',ctime='$ctime',gst='$gst',delivery_charge='$delivery_charge',minmorder='$minm_order' where rest_key='$rest_key'";
   $result=$db->query($cmd);




// update the social media links ========================================================================
$fb_link=$_POST['fb_link'];
$gplus_link=$_POST['gplus_link'];
$twitter_link=$_POST['twitter_link'];


  $cmd="UPDATE web_controllers set fb_link='$fb_link',twitter_link='$twitter_link',gplus_link='$gplus_link' where rest_key='$rest_key'";
   $result=$db->query($cmd);







}
?>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Tabels</li>
</ol>
<div class="agile-grids"> 
        <!-- tables -->
        <div class="agile-tables">
          <div class="w3l-table-info">
            <h2>Online platform settings </h2>

<!-- ===  form section starts here ======================================================= -->

<?php 
$setup=new web_controllers();
?>
    <!-- =====  form fro web setup ===================================== -->
        <form action='#' method='post' style='margin-left:12%;margin-bottom:200px'>
<hr>

<strong><span class="badge blue" style='    background: #1b93e1;
    margin-right: 22px;'>1</span>Basic settings</strong>
        <label>Your Company name :</label>
        <input type='text' name='company' value='<?php echo $setup->company;?>'>


          <label>Your Product name :</label>
          <input type='text' name='product' value='<?php echo $setup->product;?>'>



        <label>Domain hosted at  :</label>
        <input type='text' name='domain' value='<?php echo $setup->domain;?>'>




          <label>Your Product title (for meta-title) :</label>
          <input type='text' name='meta_title' value='<?php echo $setup->meta_title;?>'>


          <label>Your Product Description (for meta-description) :</label>
          <input type='text' name='meta_description' value='<?php echo $setup->meta_description;?>'>

<hr>
<strong><span class="badge blue" style='    background: #1b93e1;
    margin-right: 22px;'>2</span> Contact settings</strong>
          <label>Your support address :</label>
          <input type='text' name='support_address' value='<?php echo $setup->support_address;?>'>

           <label>Your support phone :</label>
          <input type='text' name='support_phone' value='<?php echo $setup->support_phone;?>'>

           <label>Your support email :</label>
          <input type='text' name='support_email' value='<?php echo $setup->support_email;?>'>

          <label>Your Gmap Iframe :</label>
          <input type='text' name='gmap_iframe' value='<?php echo $setup->gmap_iframe;?>'>

<!-- ====================== ALL THE SMS AND PAYMENT SETTINGS ============================= -->
<hr>

<strong><span class="badge blue" style='    background: #1b93e1;
    margin-right: 22px;'>3</span>Security settings</strong>

          <label>Do you have COD : <br></label>
          <input type='radio' name='has_cod' value='1' <?php if($setup->has_cod)echo 'checked';?>>YES
          <input type='radio' name='has_cod' value='0' <?php if(!$setup->has_cod)echo 'checked';?>>NO

          <label>Integrate payment gateway:</label>
          <input type='radio' name='has_online_pay' onclick="show_this('pay_form')" value='1' <?php if($setup->has_online_pay)echo 'checked';?>>YES
          <input type='radio' name='has_online_pay' onclick="hide_this('pay_form')"  value='0' <?php if(!$setup->has_online_pay)echo 'checked';?>>NO
   
          <div id='pay_form' style="   <?php if(!$setup->has_online_pay)echo 'display:none'; ?>"> 
              <label>Enter Your PAYU KEY <br><img src='../icons/payu.png' width='80' ></label>
              <input type='text' name='payu_key' value='<?php echo $setup->payu_key?>'>
              <label>Enter Your PAYU salt</label>
              <input type='text' name='payu_salt' value='<?php echo $setup->payu_salt?>'>
              <label>Enter Your PAYTM key <br><img src='../icons/paytm.jpeg' width='80' ></label>
              <input type='text' name='paytm_key' value='<?php echo $setup->payu_key?>'>
              <label>Enter Your PAYTM salt</label>
              <input type='text' name='paytm_salt' value='<?php echo $setup->payu_key?>'>
          </div>


    <label>Integrate sms gateway:</label>
   <input type='radio' name='has_sms' onclick="show_this('sms_form')" value='1'  <?php if($setup->has_sms)echo 'checked';?>>YES
   <input type='radio' name='has_sms' onclick="hide_this('sms_form')"  value='0' <?php if(!$setup->has_sms)echo 'checked';?>>NO


         
          <div id='sms_form' style="<?php if(!$setup->has_sms)echo 'display:none'; ?>">
               <label>Enter Your textlocal SENDER ID <br>
              <img src='../icons/textlocal.png' width='80' >
               </label>
              <input type='text' name='senderid'>
              <label>Enter Your textlocal username</label>
              <input type='text' name='textlocal_username'>
              <label>Enter Your textlocal password</label>
              <input type='text' name='textlocal_password'>
          </div>
     
  <!-- ===  all the  order realted data ======================== -->

<hr>
<strong><span class="badge blue" style='    background: #1b93e1;
    margin-right: 22px;'>4</span>Delivery settings</strong>


          <label>Delivery phone : ( sms will be acknowledged after order)</label>
          <input type='text' maxlength='13' name='order_phone' value='<?php echo $setup->order_phone;?>'>

          <label>Delivery email : ( mail will be acknowledged after order)</label>
          <input type='text' name='order_email' value='<?php echo $setup->order_email;?>'>



<!-- -===  delivery setting comes here ===================================== -->

<!-- -===  delivery setting comes here ===================================== -->
       <label>Delivery Range ( in kms. )</label>
          <input type='number' maxlength='2' name='delivery_range' value='<?php echo $setup->gst;?>'>


       <label>GST (in Percantage out of 100 )</label>
          <input type='number' maxlength='2' name='gst' value='<?php echo $setup->gst;?>'>

       <label>Delivery charges : ( in Rs )</label>
          <input type='number' name='delivery_charge' maxlength="4" value='<?php echo $setup->delivery_charge;?>'>


       <label>Opens at : ( 24-hour Format )</label>
          <input type='number' name='opens' maxlength="4" value='<?php echo $setup->opens;?>'>


       <label>closes at : ( 24-hour Format )</label>
          <input type='number' name='closes' maxlength="4" value='<?php echo $setup->closes;?>'>



       <label>Minm order : ( below this order cant be placed )</label>
          <input type='number' name='minm_order' maxlength="4" value='<?php echo $setup->minm_order;?>'>


<!--===  delivery setiings ends here ====================================== -->


<!-- -=== social media setting starts here =================================================== -->


<strong><span class="badge blue" style='    background: #1b93e1;
    margin-right: 22px;'>1</span>Basic settings</strong>



       <label>Facebook Link </label>
          <input type='text' name='fb_link' value='<?php echo $setup->fb_link;?>'>



       <label>Gplus Link </label>
          <input type='text' name='gplus_link' value='<?php echo $setup->gplus_link;?>'>



       <label>Twitter Link </label>
          <input type='text' name='twitter_link' value='<?php echo $setup->twitter_link;?>'>

<!-- -==  social nedia settinbgfs ends here ========================================== -->


          <input type='submit' name='setup_done' class='submit-btn'>
        </form>

<!---=====  form serction ends here ==================================================== -->
          </div>
      </div>
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
      function show_this(a){
                $('#'+a).show(1200);
              }
                function hide_this(a){
                $('#'+a).hide(1200);
              }
              </script>
        <?php
include_once('footer.php');
?>