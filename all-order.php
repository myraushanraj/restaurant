<style>
@media screen and (max-width: 700px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}

body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}


}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>
<div class="col-md-12" style="text-align: center"><span style="font-size:35px;cursor:pointer;float: left" onclick="openNav()">&#9776; 
</span> <span><img src="icon/eatnarylogo.png" style="width: 100px"></span></div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<?php
require_once "class/all-class.php"; 	
require_once "class/order-class.php";
require_once "class/misc-class.php";
require_once "class/menu-class.php";
include_once 'top-nav1.php';
if(isset($_GET['new_status']))
{
$d1=new dbconn();$arr1=array();
$db=$d1->connect();
	$new_status=$_GET['new_status'];
	$time=get_present_time();
	$order_id=$_GET['order_id'];
    $cmd="UPDATE `my_orders` set status='$new_status',last_status_time='$time' where order_id='$order_id'";
    $qry=$db->query($cmd);

}

if(isset($_POST['forward_delivery_boy']))
{  
 

     $current_order_id=$_POST['current_order_id'];
     $user_id_delivery_boy=$_POST['delivery_boy_user_id'];
     $d1=new dbconn();
     $arr1=array();
     $db=$d1->connect();
	 $cmd="UPDATE `my_orders` SET `delivery_user`='$user_id_delivery_boy' WHERE `order_id`='$current_order_id'";
    $qry=$db->query($cmd);

}

if(isset($_GET['cancel']))
{

$order_id=$_GET['cancel'];

$d1=new dbconn();$arr1=array();
$db=$d1->connect();
$time=get_present_time();
    // our SQL statements
$cmd="UPDATE `my_orders` set status='cancelled',last_status_time='$time' where order_id='$order_id'";
$qry=$db->query($cmd);


}
if(isset($_POST['update_order']))
{

$address=$_POST['address'];
$order_id=$_POST['order_id'];
$bill=$_POST['bill'];
$order=new order_id($order_id);
$this_str='';
$arr1=explode(',',$order->item_list);
for ($i=0; $i < sizeof($arr1)-1; $i++) { 
	echo "<br>".$arr1[$i];
	$this_str.=$_POST['order_string'.$i].',';
                                      }
if(!empty($_POST['extra1'])) 
    $this_str.=$_POST['extra1'];
if(!empty($_POST['extra2']))
    $this_str.=$_POST['extra2'];


$d1=new dbconn();$arr1=array();
$db=$d1->connect();
date_default_timezone_set("Asia/calcutta");
$timings1=date('Y-m-d H:i:s');
    // our SQL statements
$cmd="UPDATE `my_orders` set items='$this_str',bill='$bill',address='$address' where order_id='$order_id'";
 $qry=$db->query($cmd);
}
                                                                
// fetch all distinct customers ======================
$misc=new misc();
$all_order=show_all_order();
?>
<!-- ====== modal for updating the work status =========================== -->
<div class="modal fade" id="order_menu" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='background:green;color:white'>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">EDIT THIS ORDER  </h4>
        </div>
        <div class="modal-body" id="edit_order_body">
             
        </div>
     </div>
</div>
</div>
<!-- === modal for updating the work status ============================== -->

<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Order stats</li>
</ol>
 <button style="    margin-top: 0px;
    height: 38px;" href="javascript:void(0)" data-toggle='modal' data-target='#export_data' onclick="document.getElementById('table_name').value='my_orders'" class="pull-right">Upload Excel</button>
<div class="agile-grids">
				<!-- tables -->
				<div class="agile-tables">
					<div class="w3l-table-info table-responsive" >
					  <h2>All orders (<?php echo sizeof($all_order); ?>)</h2>
		 <table class="table-responsive" id="dataTables-example">
						<thead>
						  <tr>
						  	<th>#</th>
							<th>Order Id</th>
							<th>Timings</th>
							<th>Item list</th>
							<th>Bill Amount</th>
							<th>Delivery at</th>
							<th>Action</th>							
						  </tr>
						</thead>
						<tbody>
<?php 					for ($i=0; $i < sizeof($all_order); $i++) { 
						# code...
						 $order=new order_id($all_order[$i]['order_id']);
					     ?>		

						  <tr>
						  	<td><input type="radio" name="gender" value="female"></td>
							<td><strong><?php echo $order->id?></strong></td>
							<td><strong><?php echo $order->order_at?></strong>
							<br>
							<span style="color:red;text-transform: none">
								<?php echo $misc->return_timespan($order->order_at)?>
							</span>
							<br>
							<span style="color:green">
								<?php echo $order->food_status;if($order->food_status=='delivered')
								{
								echo $order->invoice_link;	
									}?>
							</span>
							</td>
							<td><?php echo $misc->menu_item_formatted($order->item_list)?></td>
							<td><?php echo "&#8377;".$order->bill?></td>
							<td><?php echo $order->address?></td>
			
							<td>
							<?php  if($order->food_status=='inprocess') { ?>	
							<button href="javascript:void(0)" data-target="#order_menu" data-toggle="modal" 
							onclick="load_order_editor('<?php echo $order->id;?>')" style="    color: white;
    background: red;
    padding: 2px;">Update</button>
    <?php } ?>
    <!-- forward Delivery --><?php
    if($order->food_status=='in_kitchen' || $order->food_status=='dispatched')
								{?>
						<button href="javascript:void(0)" data-target="#order_menu" data-toggle="modal" 
							onclick="show_all_delivery_boy('<?php echo $order->id;?>')" style="    color: white;
    background: red;
    padding: 2px;">Delivery Forward</button>
								
							<?php		}?>
  
    
   


    <br/>
   <?php  if($order->food_status=='inprocess') { ?>	
    <button href="javascript:void(0)" data-toggle='modal' data-target='#confirmation_pop' onclick="document.getElementById('changing_link').href='?cancel=<?php echo $order->id?>';document.getElementById('changin_text').innerHTML='Are you sure to cancel this order. Doing this will remove all actions for this order'" style="    color: white;
    background: black;
    padding: 1px 7px 1px 7px;">cancel</button> <?php } ?> <br>


    <!--  check the status and provide action for status change  ============ -->
    <?php if($order->food_status!='cancelled'){?>
    <select name="new_status" id='new_status<?php echo $order->id?>'
     onchange="change_current_status('<?php echo $order->id?>')">
     <option value='inprocess'>In Process</option>
        <option value='in_kitchen'>In kitchen</option>
        <option  value='dispatched' >Dispatched</option>
        <option value='delivered'>Delivered</option>
    </select>
    <?php } ?>
                            </td>
						  </tr>
						  <?php } ?>
						</tbody>
					  </table>
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
function update_order(){
	var order_price=$('#order_price').val();
	var order_desc=$('#order_desc').val();
    var order_cat=$('#order_cat').val();
	var order_title=$('#order_title').val();
	var order_code=$('#order_code').val();
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    
document.getElementById('edit_order_body').innerHTML=xmlhttp.responseText;
    }
  }
   xmlhttp.open("GET", "admin-scripts/edit_order.php?order_price="+order_price+"&order_desc="+order_desc+"&order_cat="+order_cat+"&order_code="+order_code+"&order_title="+order_title+"&save_updated=1", true);
        xmlhttp.send();
}

function load_order_editor(a){
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById('edit_order_body').innerHTML=xmlhttp.responseText;
    }
  }
   xmlhttp.open("GET", "admin-scripts/edit_order.php?load_order_editor="+a, true);
   xmlhttp.send();
}

function change_current_status(orderid){
var new_status=document.getElementById('new_status'+orderid).value;
document.getElementById('changing_link').href='?new_status='+new_status+"&order_id="+orderid;
document.getElementById('changin_text').innerHTML='Are you sure to change the status of this order to '+new_status;
document.getElementById('confirmation_pop_id').click();
}

function show_all_delivery_boy(b){
	xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById('edit_order_body').innerHTML=xmlhttp.responseText;
    }
  }
   xmlhttp.open("GET", "admin-scripts/edit_order.php?order_id_for_forward="+b, true);
   xmlhttp.send();
}
</script>
				<?php
include_once('footer1.php');
?>