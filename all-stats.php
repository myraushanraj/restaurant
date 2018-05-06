<?php
include_once('top-nav.php');
require_once "class/all-class.php";
?>

				<h5 style="text-align: center;
    color: #ce2d2d;
    font-weight: 800;">All statistics</h5>

<!-- start main menu by raushan extra-->
					<div class="clearfix"></div>
				</div>
<!-- End start menu  -->
<!--//four-grids here-->
<!--agileinfo-grap-->
<div class="agileinfo-grap">
<div class="agileits-box">
<header class="agileits-box-header clearfix">
<h5>Statistics (sale and user records)</h5>
	<div class="toolbar">
		<div class="pull-left">
			<div class="btn-group">
				<a href="#" class="btn btn-default btn-xs">Daily</a>
				<a href="#" class="btn btn-default btn-xs active">Monthly</a>
				<a href="#" class="btn btn-default btn-xs">Yearly</a>
			</div>
		</div>
		<div class="pull-right">
			<div class="btn-group">
			  <a aria-expanded="false" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
				Export <i class="fa fa-angle-down"></i>
			  </a>
			  <ul class="dropdown-menu pull-right" role="menu">
				<li><a href="#">Export as PDF</a></li>
				<li><a href="#">Export as CSV</a></li>
				<li><a href="#">Export as PNG</a></li>
				<li class="divider"></li>
				<li><a href="#">Separated link</a></li>
			  </ul>
			</div>
			<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-cog"></i></a>
		</div>
	</div>
</header>
<div class="agileits-box-body clearfix">
<div id="hero-area"></div>
</div>
</div>
</div>
	<!--//agileinfo-grap-->
<!--photoday-section-->	
						<div class="clearfix"></div>
                   
	<!--//photoday-section-->	
	<!--w3-agileits-pane-->	
<?php
include_once('footer.php');
?>