<?php
include_once('top-nav.php');
require_once "class/all-class.php";
?>

	<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<span style="    float: left;
    font-weight: 800;    color: #bd3a3a;"><?php echo total_order();?><span style="color: black"><br/>&nbsp;Toatal Sales</span></span><span><img src="icon/cart.png" style="width:50px "></span>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<span style="    float: left;
    font-weight: 800;    color: #bd3a3a;"><?php echo total_customer();?><br/><span style="color: black">&nbsp;Toatal Customers</span></span><span><img src="icon/cart.png" style="width:50px "></span>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<span style="    float: left;
    font-weight: 800;    color: #bd3a3a;"><?php echo total_product();?><br/><span style="color: black">&nbsp;Toatal Items</span></span><span><img src="icon/cart.png" style="width:50px "></span>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<h5 style="text-align: center;
    color: #ce2d2d;
    font-weight: 800;">Welcome to Point of Sale ( Restaurant section), Choose a common task below to get started!</h5>

<!-- start main menu by raushan extra-->
	<div class="four-grids">
					<div class="col-md-6 ">
						<a href="pos_book.php"><div class="face_menu">
						<span>	<img src="icon/cart1.png" width="50px"></span><span style="    font-weight: 800;
    color: #bd3a3a;
    margin-left: 47px;" 
    >Start a New Sell</span>

							
						</div>
                        </a>
					</div>

                    <div class="col-md-6 ">
                        <a href="all-order.php"><div class="face_menu">
                        <span>  <img src="icon/cart1.png" width="50px"></span><span style="    font-weight: 800;
    color: #bd3a3a;
    margin-left: 47px;" 
    >Online sales Statistics</span>

                            
                        </div>
                        </a>
                    </div>

					
					<div class="clearfix"></div>
				</div>

				<div class="four-grids">
					<div class="col-md-6 ">
					 <a href="all-stats.php">	<div class="face_menu">
						<span>	<img src="icon/cart1.png" width="50px"></span><span style="    font-weight: 800;
    color: #bd3a3a;
    margin-left: 47px;" 
    >Overall summary Report</span>

							
						</div></a>
					</div>
					<div class="col-md-6 ">
						<div class="face_menu">
						<span>	<img src="icon/cart1.png" width="50px"></span><span style="    font-weight: 800;
    color: #bd3a3a;
    margin-left: 47px;" 
    >Start a new Receiving</span>

							
						</div>
					</div>
					
					
					<div class="clearfix"></div>
				</div>
				<div class="four-grids">
					<div class="col-md-6 ">
						<div class="face_menu">
						<span>	<img src="icon/cart1.png" width="50px"></span><span style="    font-weight: 800;
    color: #bd3a3a;
    margin-left: 47px;" 
    >Today's Detailed sales report</span>

							
						</div>
					</div>
					
					
					<div class="clearfix"></div>
				</div>
<!-- End start menu  -->
<!--//four-grids here-->
<!--agileinfo-grap-->
<div class="agileinfo-grap">

</div>
	<!--//agileinfo-grap-->
<!--photoday-section-->	
						<div class="clearfix"></div>
                   
	<!--//photoday-section-->	
	<!--w3-agileits-pane-->	
<?php
include_once('footer.php');
?>