<?php  include_once "../class/order_class.php";
include_once "../class/cart_class.php";

function get_present_date()
{
      date_default_timezone_set("Asia/Calcutta");
                                  $datenow=date('Y-m-d');
                                  return $datenow;
}
function get_present_time()
{
      date_default_timezone_set("Asia/Calcutta");
                                  $timenow=date('Y-m-d H:i:s');
                                  return $timenow;
}
if(isset($_GET['submit_order']))
{
$d1=new dbconn();
$db=$d1->connect();
$cart=new cart_all();
$bill=$cart->bill;
$customername=$_GET['name1'];
$email=$_GET['email1'];
$city1=$_GET['city1'];
$phone=$_GET['phone1'];
$chef_note=$_GET['chef_note'];
$timings='NA';


// step 1: check whether is already a customer or not
check_or_add_user($customername,$phone,$email);
// ====== fetching the exact orders herer ==========================
$address=$_GET['line1'].' '.$_GET['line2'].' '.$_GET['city1'];
$zipcode=$_GET['zipcode1'];
$timenow=get_present_time();
$center='Ranchi';
// =============== check user payment method and proceed accordingly 
	$pay_method=$_GET['pay_method'];
	if($pay_method=='payu')
	{
// PAYMENT GATEWAY STARTS HERE =========================================================
//getting the values fron user ka form is here 
$_SESSION['unique_number']=rand(1234567,999999999);
$_SESSION['onlineamount']=$bill;
$_SESSION['name']=$_POST['fname'];
$_SESSION['address']=$address;
$_SESSION['phone']=$_POST['phone'];
$_SESSION['surl']='http://www.claymango.com/finalpage2.php?successtrn='.$_SESSION['unique_number'];
$_SESSION['furl']='http://www.claymango.com/failure.php';
$_SESSION['service_provider']='payu_paisa';
?>
<script>
window.location='payform.php';
</script>
<?php 
    exit();
	}elseif($pay_method=='paytm')
{


    // Case 2:  Payment gateway (PAYTM)
    // PAYMENT GATEWAY STARTS HERE =========================================================
$_SESSION['unique_number']=rand(1234567,999999999);
$_SESSION['onlineamount']=$bill;
$_SESSION['name']=$customername;
$_SESSION['address']=$address;
$_SESSION['phone']=$phone;
$_SESSION['service_provider']='paytm';
?>
<script>
window.location='../paytm/TxnTest.php';
</script>
<?php 
    exit();
//=========================PAYMENT GATEWAY ENDS HERE ===============================
}else{
// order placement process to my_orders table 
$obj=new order_process();
$order_status=$obj->add_new_order($bill,$customername,$email,$center,$timings,$phone,$timenow,$address,$chef_note);


if($order_status){ ?>
<script>
window.location='../checkout-user.php?orderplaced=<?php echo $order_status;?>';
</script>
	<?php }else{ ?>
    
<span style='color:maroon'>Sorry User request could not be processed please try again </span>
     <?php } 

     }
 }  ?>
