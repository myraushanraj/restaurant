<?php
include_once 'top-nav1.php';
 $rest_key=REST_KEY;
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
$tag_line=$_POST['tag_line'];
$address=$support_address;


// ========================================================================================================= 

                     $d1=new dbconn();
                     $db=$d1->connect();
                    
$cmd="UPDATE web_controllers set hosted_domain='$domain',company='$company',tag_line='$tag_line',product='$product',meta_title='$meta_title',meta_description='$meta_description',has_cod='$has_cod',has_online_pay='$has_online_pay',has_sms='$has_sms',textlocal_username='$textlocal_username',textlocal_password='$textlocal_password',payu_salt='$payu_salt',payu_key='$payu_key',support_email='$support_email',support_address='$support_address',support_phone='$support_phone',gmap_iframe='$gmap_iframe',order_email='$order_email',order_phone='$order_phone' where rest_key='$rest_key'";
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

?>
<script>
window.location='setup-2.php';

</script>
<?php





}
?>

<!--heder end here-->
<div>

  <h4 style="text-align: center;">Step <span style="    font-weight: 700;
    color: red;
    font-size: 23px;">1</span> of 2</h4>
  <h5 style="text-align: center;margin-top: 24px;">Please answer the following questions to help us build your website</h5>
 
</div>

<div class="agile-grids"> 
        <!-- tables -->
        <div class="agile-tables" style="width: 100%">
          <div class="">
       

<!-- ===  form section starts here ======================================================= -->

<?php 
$setup=new web_controllers();
?>
    <!-- =====  form fro web setup ===================================== -->
        <form action='#' method='post' class="form_content" style='margin-bottom:200px'>


<h4 style="text-align: center"><span class="badge blue" style='    background: #1b93e1;
    margin-right: 22px;margin-bottom: 20px'>A</span>Basic settings</h4>
        <label>1. Your Company name <span class="required_star">*</span></label>
        <input type='text' name='company' required value='<?php echo $setup->company;?>' >


          <label>2. Your Product name <span class="required_star">*</span></label>
          <input type='text' name='product' required value='<?php echo $setup->product;?>'>



        <label>3. Domain hosted at  :</label>
        <input type='text' name='domain' value='<?php echo $setup->domain;?>'>




          <label>4. Your product title (for meta-title) :</label>
          <input type='text' name='meta_title' value='<?php echo $setup->meta_title;?>'>


          <label>5. Your product description (for meta-description) :</label>
          <input type='text' name='meta_description' value='<?php echo $setup->meta_description;?>'>

          <label>6. Your website tag line :</label>
          <input type='text' name='tag_line' value='<?php echo $setup->tag_line;?>'>

<hr>
<h4 style="text-align: center;margin-bottom: 20px;    margin-top: 30px;"><span class="badge blue" style='    background: #1b93e1;
    margin-right: 22px;'>B</span> Contact settings</h4>
          <label>1. Your support address <span class="required_star">*</span></label>
          <input type='text' name='support_address' required value='<?php echo $setup->support_address;?>'>

           <label>2. Your support phone <span class="required_star">*</span></label>
          <input type='text' name='support_phone' required value='<?php echo $setup->support_phone;?>'>

           <label>3. Your support email <span class="required_star">*</span></label>
          <input type='email' name='support_email' required value='<?php echo $setup->support_email;?>'>

          <label>4. Your google map location <span class="required_star">* </span>( <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal_map">How to add google map iframe</a> )</label>
          <input type='text' name='gmap_iframe' required value='<?php echo $setup->gmap_iframe;?>'>
          
<!-- ====================== ALL THE SMS AND PAYMENT SETTINGS ============================= -->

<div style="display: none;">
<strong><span class="badge blue" style='    background: #1b93e1;
    margin-right: 22px;'>3</span>Security settings</strong>

          <label>Do you wish to have Cash On Delivery : <br></label>
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
    </div> 
  <!-- ===  all the  order realted data ======================== -->
<hr>
<h4 style="text-align: center;margin-bottom: 20px;    margin-top: 30px;"><span class="badge blue" style='    background: #1b93e1;
    margin-right: 22px;'>C</span>Delivery settings</h4>


          <label>1. Delivery phone  ( sms will be acknowledged after order)<span class="required_star">*</span></label>
          <input type='text' maxlength='13'  name='order_phone' value='<?php echo $setup->order_phone;?>' required>

          <label>2. Delivery email : ( mail will be acknowledged after order) <span class="required_star">*</span></label>
          <input type='email' name='order_email'  value='<?php echo $setup->order_email;?>' required>



<!-- -===  delivery setting comes here ===================================== -->

<!-- -===  delivery setting comes here ===================================== -->
       <label>3. Delivery Range ( in kms. )</label>
          <input type='number' maxlength='2' name='delivery_range' value='<?php echo $setup->gst;?>'>


       <label>4. GST (in Percantage out of 100 )</label>
          <input type='number' maxlength='2' step="0.01" name='gst' value='<?php echo $setup->gst;?>'>

       <label>5. Delivery charges : ( in Rs )</label>
          <input type='number' name='delivery_charge' maxlength="4" value='<?php echo $setup->delivery_charge;?>'>


       <label>6. Opens at : ( 24-hour Format )</label>
          <input type='number' name='opens' maxlength="4" value='<?php echo $setup->opens;?>'>


       <label>7. Closes at : ( 24-hour Format )</label>
          <input type='number' name='closes' maxlength="4" value='<?php echo $setup->closes;?>'>



       <label>8. Minimum order amount : </label>
          <input type='number' name='minm_order' maxlength="4" value='<?php echo $setup->minm_order;?>'>


<!--===  delivery setiings ends here ====================================== -->


<!-- -=== social media setting starts here =================================================== -->
<hr>

<h4 style="text-align: center;margin-bottom: 20px;margin-top: 30px;"><span class="badge blue" style='    background: #1b93e1;
    margin-right: 22px;'>D</span>Social media settings</h4>



       <label>1. Facebook Link </label>
          <input type='url' name='fb_link' value='<?php echo $setup->fb_link;?>'>



       <label>2. Google plus Link </label>
          <input type='url' name='gplus_link' value='<?php echo $setup->gplus_link;?>'>



       <label>3 .Twitter Link </label>
          <input type='url' name='twitter_link' value='<?php echo $setup->twitter_link;?>'>

<!-- -==  social nedia settinbgfs ends here ========================================== -->
         
          <input type='submit' name='setup_done' class='submit_btn' value="Continue">
        </form>
    <div>


</div>
<!---=====  form serction ends here ==================================================== -->
          </div>
      </div>
      <!-- model class for map tutorial -->
      <!-- Modal -->
  <div class="modal fade" id="myModal_map" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;color: #fff">How to add google map iframe</h4>
        </div>
        <div class="modal-body">
        <p>1. Open <a href="https://www.google.co.in/maps" target="_blank">https://www.google.co.in/maps</a></p>
        <p>2. Enter your address in in search google maps</p>
        <p>3. Click on share</p>
        <p>4. Click on Embed map</p>
        <p>5. Copy the iframe code </p>
        <p>6. Paste it on your input box </p>
         
        </div>
        <div class="modal-footer">
        
        </div>
      </div>
      
    </div>
  </div>
  
      <?php
      include_once('footer1.php');
      ?>