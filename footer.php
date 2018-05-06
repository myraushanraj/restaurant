<style type="text/css">
	.active{
		background: red;color: white;
	}
</style>
<!-- ====== modal for updating the work status =========================== -->
  <div class="modal fade" id="export_data" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='background:green;color:white'>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Export your data </h4>
        </div>
        <div class="modal-body" id="add_menu_body">
              <center>
                 <form action='api/export_table.php' method='get' >

<input type="hidden" id="table_name" name="table_name" >
<label>Enter a unique name for your downloaded file </label>
<input type="text" id="file_name" name="file_name" >


<input type="submit" name="new_download" value="Dwonload CSV file" class="theme-btn btn">


                  </form>
                  </center>
        </div>
     </div>
</div>
</div>


<!-- === modal for updating the work status ============================== -->


<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->

<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Pooled . All Rights Reserved | Design by  <a href="http://monkhub.com/" target="_blank">Monkhub</a> </p>
</div>	
<!--COPY rights end here-->
</div>

  <!--//content-inner-->
		<!--/sidebar-menu-->
<!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
  <!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
										
										
										 <li id="menu-academico" ><a href="customer.php"><i class="fa fa-envelope nav_icon"></i><span>Customers</span><div class="clearfix"></div></a></li>
									<li><a href="all-menu.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Items</span><div class="clearfix"></div></a></li>
									<li id="menu-academico" ><a href="all-order.php"><i class="fa fa-bar-chart"></i><span>My orders</span><div class="clearfix"></div></a></li>
									

										 <li class="active" id="menu-academico" ><a href="all-stats.php"><i class="fa fa-envelope nav_icon"></i><span>Statistics</span><div class="clearfix"></div></a></li>
								  
										 <li id="menu-academico" ><a href="admin-access.php"><i class="fa fa-envelope nav_icon"></i><span>Admin data</span><div class="clearfix"></div></a></li>
										 <li id="menu-academico" ><a href="customize-web.php"><i class="fa fa-envelope nav_icon"></i><span>Customize web</span><div class="clearfix"></div></a></li>
										  <li id="menu-academico" ><a href="web-setup.php"><i class="fa fa-envelope nav_icon"></i><span>Account settings</span><div class="clearfix"></div></a></li>
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date( day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '24 Q1', online: 18, store: null, registration: 29},
				{period: '25 Q2', online: 20, store: 139, registration: 151},
				{period: '26 Q3', online: 10, store: 175, registration: 10},
				{period: '27 Q4', online: 70, store: 60, registration: 95},
				{period: '28 Q1', online: 10, store: 124, registration: 300},
				{period: '29 Q2', online:80, store: 90, registration: 71},
				{period: '30 Q3', online: 30, store: 05, registration: 98},
				{period: '31 Q4', online: 83, store: 77, registration: 55},
				{period: '1 Q1', online: 97, store: 70, registration: 28},
				{period: '2 Q2', online: 2, store: 53, registration: 01}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['online', 'store', 'registration'],
            labels: ['Online order', 'store order', 'online registrations'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
	
				<script>
function load_notification_text(link)
{ alert();
var xmlhttp;   
alert(link);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	alert(xmlhttp.responseText);
document.getElementById("show_notification_body").style.display='block';
document.getElementById("show_notification_body").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",'admin-scripts/show-order-profile.php'+,true);
xmlhttp.send();
}


</script>

</body>
</html>