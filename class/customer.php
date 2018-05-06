<?php 
include_once('db-connection.php');
include('all-class.php');
class customer{
	function add_new_customer($email,$password,$unique_id,$phone,$fullname){
                $obj=new dbconn;
			    $conn=$obj->connect();

                //check this email already register or not
                $cmd="select * from admin_data where username='$email' or email='$email'";
                   $result=$conn->query($cmd);
                $c=$result->rowCount();
                if ($c>0) {
                      login_profiles($email,$password);
                }else{
                   $cmd="select * from admin_data where account_type='$unique_id'";
                   $result=$conn->query($cmd);
                   $n=$result->rowCount();
                      if ($n>0) {
                        return 0;
                      }
                      else{
                            //register new customer
                        $sql="INSERT INTO `admin_data` (`sl`, `account_type`, `name`, `profile_pic`, `position`, `phone`, `email`, `username`, `password`, `lastlogin`) VALUES (NULL, :unique_id, :name, 'pP', 'po', :phone, :email, 'user', :password, '2018-01-17 00:00:00');";

                $query=$conn->prepare($sql);
                $result=$query->execute(array(':email'=>$email,':password'=> $password,':unique_id'=> $unique_id,':phone'=> $phone,':name'=> $fullname));
                $qry = $conn->query($sql);

                //Rest Key insert in web controller
                $sql="INSERT INTO `monkhub_food_order`.`web_controllers` (`sl`, `rest_key`, `hosted_domain`, `add_to_cart_src`, `add_to_wishlist_src`, `added_to_wishlist_src`, `empty_cart_src`, `remove_cart_src`, `cart_link_src`, `sale_offer_src`, `company`, `tag_line`, `about`, `about_small`, `product`, `payment_gateway`, `wallet_gateway`, `sms_gateway`, `has_cod`, `has_online_pay`, `has_sms`, `has_paytm`, `has_payu`, `market_open`, `adminname`, `admincontact`, `adminemail`, `sender_id`, `textlocal_username`, `textlocal_password`, `payu_username`, `payu_password`, `payu_key`, `payu_salt`, `paytm_key`, `paytm_salt`, `favicon`, `meta_title`, `meta_keyword`, `meta_description`, `logo`, `loader`, `support_email`, `support_phone`, `order_email`, `order_phone`, `fb_link`, `gplus_link`, `twitter_link`, `support_address`, `gmap_iframe`, `under_construction`, `product_row_count_var`, `product_arrival_count`, `product_trending_count`, `has_product_search`, `has_home_category`, `has_header_shop_now`, `theme1`, `theme2`, `banner1`, `banner2`, `banner3`, `has_track_order`, `has_support_ticket`, `has_saved_order`, `has_quick_view`, `has_signin_signup`, `terms_page`, `privacy_page`, `faq_page`, `use_privacy_page`, `use_contact_page`, `use_terms_page`, `use_faq_page`, `hosted_ip`) VALUES (NULL, :unique_id, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', NULL, '2', '2', '1', '', '', NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', NULL, NULL, NULL, '0', '0', '0', '0', ''); ";

                $query=$conn->prepare($sql);
                $result=$query->execute(array(':unique_id'=> $unique_id));
                $qry = $conn->query($sql);
// insert in rest_details
                $sql="INSERT INTO `monkhub_food_order`.`rest_details` (`sl`, `rest_key`, `rest_name`, `address`, `deliveryrange`, `minmorder`, `status`, `latitude`, `longitude`, `otime`, `ctime`, `pic`, `delivery_charge`, `gst`) VALUES (NULL, :unique_id, '', '', NULL, 100, '1', NULL, NULL,0000, 2359, '', '0', '0.00');";

                            $query=$conn->prepare($sql);
                $result=$query->execute(array(':unique_id'=> $unique_id));
                $qry = $conn->query($sql);

            
                         login_profiles($email,$password);
                          return 1;  
                      }



			    
 
                             

}
}
}
?>