<?php 
include_once "db-connection.php";
include_once "setup-class.php";
include_once "pdf_class.php";
include_once "menu-class.php";
// order process ===============================================

class order_process{

function return_timespan($from_time){
date_default_timezone_set("Asia/calcutta");
$from_time = strtotime(date($from_time));
$to_time =strtotime(date('Y-m-d H:i:s'));
//$from_time = strtotime(date("2017-3-20 09:19:00"));
$minutes=round(abs($to_time - $from_time) / 60,2);
$hours=$minutes/60;
$days=$hours/24;
$years=$days/365;
//echo date("H:i:s");
//===================                        
$final_minutes=((($minutes%(60))%24)%365);
$final_hours=(($hours)%24);
$final_days=($days%24);
//============
$return_string='';
if((round($years)>0))
{
     $return_string.=round($years).' years ';
}
if($final_days>0)
$return_string.=$final_days.' days ';
if($final_hours>0 && ($final_days<=1))
$return_string.=$final_hours.' hours ';
if($final_minutes>=0  && ($final_hours<=1))
$return_string.=$final_minutes.' mins ';
$return_string=ltrim($return_string);
$return_string=rtrim($return_string);
if($return_string=='ago')
{
return 'just now ';

}else
{
return $return_string.' ago';
}
}

	function fetch_full_order_details($orderid){


									$arr1=array();				
									$d1=new dbconn();
									$db=$d1->connect();

	        						$cmd="select * from my_orders where order_id='$orderid'";
	        						$result=$db->query($cmd);
                                       while($row=$result->fetch()){ 
				                   	                      array_push($arr1,$row);
				                                               }
				                                               return $arr1;

	}



				function return_ordered_sku($orderid){

							$or=$this->fetch_full_order_details($orderid);
							$sku_id=$or[0]['items'];
							return $sku_id;

				}


								function clear_my_cart(){

										//step 1 : clear the session product chain 

										unset($_SESSION['product_chain']);

								}
	function add_new_order($bill,$customername,$email,$center,$timings,$phone,$timenow,$address){
$order_status=0;
$d1=new dbconn();
$db=$d1->connect();
$mainstring=$this->return_order_string();
$timings=get_present_time();
// STEP 1: UPDATE TO SYAYSTEM DATABASE ORDER DEPARTMENT 
$arr1=array();			
$orderid=$this->new_order_id();
$cmd="INSERT into my_orders(items,bill,customer,customer_email,order_id,center,timings,cust_phone,order_time,address) values ('$mainstring','$bill','$customername','$email','$orderid','$center','$timings','$phone','$timenow','$address')";
$result=$db->query($cmd);
if($result)
$order_status=1;


if($result)
{
// ===========order notifications ============================
//$c1=new web_controllers();

// admin sendmessage ===================
$email_admin="New order at Zomato"." orderid : ".$orderid.", Bill : ".$bill." . Visit service panel for more details.";
//$c1->send_message($msgborn,($c1->admin_contact));
// send same content though the mail also :
$email_admin.='New Order at Zomato :'."\n";
$email_admin.='Order Id :'.$orderid."\n";
$email_admin.='Product List  :'.$mainstring."\n";
$email_admin.='Bill  :'.$bill."\n";
$email_admin.='Customer Name :'.$name."\n";
$email_admin.='Delivery Address :'.$address;
$email_admin.='Delivery Timings :'.$timings;
$subject='New order at Zomato ';
$link="monkhub.com/rest/?trackme=".$orderid;
$link_name="Track order";
$this->memberEmail($email,$subject,$email_admin,$link,$link_name);
// customer message ===================

$msgborn="Congratulations ".$customername." ! Your order has been placed successfully with order Id : ".$orderid." , Bill Amount : ".$bill." .";
//$c1->send_message($msgborn,$phone);


//=========== order notifications ==============================
create_order_invoice($customername,$phone,$email,$address,$bill,$mainstring,$timings,$orderid,$plan_id);

//add to admin notifications ===========================
$notifications="New order at restaurant outlet ID :".$orderid;
$triggeredby=$email;
$link1="show-order-profile.php?orderid=".$orderid;
$cmd="INSERT INTO admin_notifications(notification,triggeredby,link1,timings) VALUES ('$notifications','$triggeredby','$link1','$timings')";
$result=$db->query($cmd);
}
// STEP 2: UPDATE THE STOCK SALES 
//$this->decrease_ordered_stock_and_update_sales();
// STEP 3: CLEAR THE CART NOW 



if($order_status)
return $orderid;
else
return '0';
	}


function memberEmail($to,$subject,$description,$link,$link_name){
$subject = $subject;

$message = "
<html>
<head>
<title>Rmaxx</title>
</head>
<body style='border: 3px dotted #f98c50;
    background: white;
 
    padding: 35px;
    font-size: 14px;
    color: #635f5f;
    font-family: helvetica;'>
<h3 style='text-align:center;'>Online food order</h3>
<table>
<tr><td><td><img src='http://monkhub.com/img/monkhub-logo.png' width='140'></td></tr>

<tr>

<th style='    font-size: 14px;
    font-family: helvetica;
    font-weight: normal;'>".$description."</th>

<th></th>

</tr>

<tr>



<td style='text-align: center;height:109px;'><span><a href='".$link."' target='_blank' style=' 
   background: #f98c50;
    /* padding-left: 40px; */
    padding: 19px;
    color: white;
    /* border-radius: 4px; */
    text-transform: capitalize;
    /* padding-right: 40px; */
    font-size: 17px;
    text-decoration: none;'>".$link_name."</a></span></td>

</tr>
<tr><td>Sent at : ".date('y/m/d h:i')."</td></tr>
</table>

</body>

</html>

";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From:monkhub@monkhub.com' . "\r\n";
$headers .= 'Cc:info@monkhub.com' . "\r\n";
mail($to,$subject,$message,$headers);
 }  

function decrease_ordered_stock_and_update_sales(){

$d1=new dbconn();
$db=$d1->connect();
$master_arr=$this->return_order_string();

		$master_arr=explode(',',$master_arr);
										for($r=0;$r<sizeof($master_arr);$r++)
										{
											$id=explode('-',$master_arr[$r])[1];
											$qty=explode('-',$master_arr[$r])[0];

											// decrease the qty aMOUNT FROM THE PRODUCTS TABLE 
											$cmd="update products set instock=instock-$qty where code='$id'";
											$result=$db->query($cmd);

											// add this same qty to sales 
										    $cmd="update products set total_sales=total_sales+$qty where code='$id'";
											$result=$db->query($cmd);

										}
}
function new_order_id(){


									$arr1=array();				
									$d1=new dbconn();
										$db=$d1->connect();
$cmd="select * from my_orders";
$result=$db->query($cmd);

$c=$result->rowCount();
$c+=1;
return 'OD'.$c;

}
function get_present_date()
{
      date_default_timezone_set("Asia/Calcutta");
                                  $datenow=date('Y-m-d');
                                  return $datenow;
}
function get_present_time()
{
      date_default_timezone_set("Asia/Calcutta");
                                  $timenow=date('y/m/d h:i:s');
                                  return $timenow;
}

// will return the present sku
	function return_order_string(){
						// === initialize with null
							$ret='';
									$master_arr=explode('///',$_SESSION['product_chain']);
										for($r=0;$r<sizeof($master_arr)-1;$r++)
										{
											$id=explode('$$$',$master_arr[$r])[0];
											$qty=explode('$$$',$master_arr[$r])[1];

											// special in case of food ordering 
								$title=return_title_from_sku($id);

												$ret.=$qty.'-'.$title.',';
										}

										return $ret;
                                  }


                                  // create automated invoice =====






}


class order_id{

function __construct($id)
{
	$this->id=$id;
	$this->all_data();
}


function all_data(){
									$arr1=array();				
									$d1=new dbconn();
									$db=$d1->connect();

	$cmd="SELECT * from my_orders where order_id='$this->id'";

	        						$result=$db->query($cmd);
                                       while($row=$result->fetch()){ 
				                   	                      array_push($arr1,$row);
				                                               }
				                 // provide all details 

				                    $this->order_id=$arr1[0]['order_id'];


				                    $this->address=$arr1[0]['address'];


				                    $this->order_at=$arr1[0]['order_time'];

 
				                    $this->email=$arr1[0]['customer_email'];
                                    $this->phone=$arr1[0]['cust_phone'];

                                    $this->bill=$arr1[0]['bill'];

                                    $this->item_list=$arr1[0]['items'];

                                    $this->source=$arr1[0]['source'];
                                    $this->food_status=$arr1[0]['status'];
                                    $this->invoice_link='';
                                    	if($this->source!='user')
{
$this->invoice_link='<a href="admin-scripts/invoices/IN<?php echo $order->id ?>.pdf" target="_blank">
									<img src="https://cdn4.iconfinder.com/data/icons/vectory-finance-2/40/invoice_check-512.png" width="45">
								</a>';

 }else{

$this->invoice_link='<a href="../callscripts/invoices/IN<?php echo $order->id ?>.pdf" target="_blank">
									<img src="https://cdn4.iconfinder.com/data/icons/vectory-finance-2/40/invoice_check-512.png" width="45">
								</a>';
						
}


}





}

?>