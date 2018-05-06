<?php
require_once "class/all-class.php";
require_once "class/customer-class.php";
require_once "class/misc-class.php";

include_once 'top-nav.php';
// fetch all distinct customers ======================\
$misc=new misc();
$customers=show_all_customer();
?>
<!--heder end here-->

<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Tabels</li>
</ol>


    <button style="    margin-top: 0px;
    height: 38px;" href="javascript:void(0)" data-toggle='modal' data-target='#export_data' onclick="document.getElementById('table_name').value='customer'" class="pull-right">Export Excel</button>
<div class="agile-grids">	
				<!-- tables -->
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Customers On board (<?php echo sizeof($customers); ?>)</h2>
		 <table class="" id="dataTables-example">
						<thead>
						  <tr>
						  	<th>#</th>
							<th>Personal Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Last address</th>
							<th>Stats</th>
							<th>Action</th>	
						  </tr>
						</thead>
						<tbody>
<?php for ($i=0; $i < sizeof($customers); $i++) { 
	$customer=new customer($customers[$i]['email']);
                                                    ?>
						  <tr>
						  	<td><input type="radio" name="gender" value="female"></td>
							<td><?php echo $i+1;?></td>
							<td><?php echo $customer->name?></td>
							<td><?php echo $customer->email?></td>
							<td><?php echo $customer->phone?></td>
							<td><?php echo $customer->last_address?></td>
							<td><?php echo "Total Orders : ".$customer->total_orders?><br>
							Last order : <?php if(!empty($customer->last_order))echo $misc->return_timespan($customer->last_order);?><br>
							Orders the most : Chinese 
							</td>
							<td><button class="theme-btn" href="javascript:void(0)" data-target="#notify_user" data-toggle="modal" style="    color: white;
    background: black;
    padding: 1px 7px 1px 7px;">Notify User</button>

    </td>
						  </tr>
						  <?php } ?>
						</tbody>
					  </table>
					</div>
			</div>
</div>
				<?php
include_once('footer.php');
?>