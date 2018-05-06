<?php 
require_once "setup-class.php";
function view_all_items(){$d1=new dbconn();
$db=$d1->connect();

  $arr1=array();

      $cmd="select * from products  where isdelete='0' ORDER BY sl desc";
          $result=$db->query($cmd);

                  while($row=$result->fetch())
                  {
                array_push($arr1,$row);
                  }
                  return $arr1;
}


/* ======= class for controliing the ecommerce  platform (contact-details,market)================================================ */
class web_controllers{
  var $admin_contact;
  var $admin_email;
  var $market_open;
function __construct(){ 
$arr1=$this->controller_data();
$this->admin_contact=$arr1[0]['admincontact'];
$this->admin_email=$arr1[0]['adminemail'];
$this->admin_name=$arr1[0]['adminname'];
$this->textlocal_username=$arr1[0]['textlocal_username'];
$this->textlocal_password=$arr1[0]['textlocal_password'];
$this->payu_user=$arr1[0]['payu_username'];
$this->payu_password=$arr1[0]['payu_password'];
$this->sender_id=$arr1[0]['sender_id'];
$this->payu_salt=$arr1[0]['payu_salt'];
$this->payu_key=$arr1[0]['payu_key'];

$this->paytm_salt=$arr1[0]['paytm_salt'];
$this->paytm_key=$arr1[0]['paytm_key'];
$this->company=$arr1[0]['company'];
$this->product=$arr1[0]['product'];

$this->meta_title=$arr1[0]['meta_title'];
$this->meta_description=$arr1[0]['meta_description'];
$this->support_phone=$arr1[0]['support_phone'];
$this->support_address=$arr1[0]['support_address'];
$this->support_email=$arr1[0]['support_email'];
$this->gmap_iframe=$arr1[0]['gmap_iframe'];
$this->support_email=$arr1[0]['support_email'];
$this->fb_link=$arr1[0]['fb_link'];
$this->gmap_iframe=$arr1[0]['gmap_iframe'];
$this->gplus_link=$arr1[0]['gplus_link'];
$this->twitter_link=$arr1[0]['twitter_link'];
$this->has_cod=$arr1[0]['has_cod'];
$this->has_online_pay=$arr1[0]['has_online_pay'];
$this->has_payu=$arr1[0]['has_payu'];
$this->has_paytm=$arr1[0]['has_paytm'];
$this->has_sms=$arr1[0]['has_sms'];
$this->order_email=$arr1[0]['order_email'];
$this->order_phone=$arr1[0]['order_phone'];
$this->favicon=$arr1[0]['favicon'];
$this->logo=$arr1[0]['logo'];
$this->loader=$arr1[0]['loader'];
$this->icon_add_to_cart=$arr1[0]['add_to_cart_src'];
$this->icon_add_to_wishlist=$arr1[0]['add_to_wishlist_src'];
$this->icon_added_to_wishlist=$arr1[0]['added_to_wishlist_src'];
$this->icon_cart_link=$arr1[0]['cart_link_src'];
$this->icon_empty_cart=$arr1[0]['empty_cart_src'];
$this->icon_remove_cart=$arr1[0]['remove_cart_src'];
$this->icon_sale_offer=$arr1[0]['sale_offer_src'];
$this->under_construction=$arr1[0]['under_construction'];
$this->product_row_count=$arr1[0]['product_row_count_var'];
$this->product_arrival_count=$arr1[0]['product_arrival_count'];
$this->product_trending_count=$arr1[0]['product_trending_count'];
$this->theme1=$arr1[0]['theme1'];
$this->theme2=$arr1[0]['theme2'];
$this->banner1=$arr1[0]['banner1'];
$this->banner2=$arr1[0]['banner2'];
$this->banner3=$arr1[0]['banner3'];

}

/* === sl=1 will be used at present to allot each of the controls at farmco */
			function controller_data(){ 
			
									$arr1=array();				
									$d1=new dbconn();
										$db=$d1->connect();
                     $cmd="select * from web_controllers where sl='1'";echo $cmd;
				     $result=$db->query($cmd);
				      while($row = $result->fetch(PDO::FETCH_ASSOC))
				                        {
				                   	array_push($arr1,$row);
				                        }
				                        return $arr1; 
									}


											function temp_mail($to,$subject,$mail){
								
												mail($to,$subject,$mail);

											}


									function send_message($msgborn,$phoneborn){


	// Authorisation details.
	$username =$this->textlocal_username;
	$hash =$this->textlocal_password;
	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";
	// Data for text message. This is the text message data.
	$sender =$this->sender_id; // This is who the message appears to be from.
	$numbers =$phoneborn; // A single number or a comma-seperated list of numbers
	$message =$msgborn;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);

	//echo $result;

									}


			
				                  







				}

