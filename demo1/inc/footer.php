<!--footer -->
		<div class="container-fluid footer">
		
			<div class="skill_info_wthree_agile">
				<div class="col-md-4 banner_bottom_left">
					
					<li class="list_style"><b>Help</b></li>
					
		<?php if($setup->has_faq){ ?>			
		<li class="list_style"><a href="faq.php" >FAQ</a></li>
		<?php } 
		if($setup->has_terms){ ?>
		<li class="list_style"><a href="faq.php" >Terms and condition</a></li>
		<?php }
		if($setup->has_privacy){ ?>
		<li class="list_style"><a href="privacy-policy.php" >Privacy policy</a></li>
	      <?php }
		if($setup->has_contact){ ?>
		<li class="list_style"><a href="contact.php" >Contact</a></li>
	        <?php } ?>  
	             
				
				</div>
				<div class="col-md-4 banner_bottom_left">
					
					<li class="list_style"><b>Support</b></li>
					
		<?php 
		if($setup->has_track_order){ ?>
		     <li class="list_style"><a href="javascript:void(0)" id="track_popup_link" data-target="#myModal_track" data-toggle="modal">Track order</a></li>
		     		<?php }
		if($setup->has_saved_order){ ?>
		     <li class="list_style"><a href="javascript:void(0)"  data-toggle='modal' data-target='#saved_food_track'>My saved orders</a></li>
		     <?php } 
		     if($setup->has_support_ticket){ ?>
		 <li class="list_style"><a href="javascript:void(0)"  data-toggle='modal' data-target='#writetous'>Support Ticket</a></li>
		      <?php } ?>
		          
				
				</div>
				<div class="col-md-4 banner_bottom_left">
		<li class="list_style"><b>Social Media</b></li>
		<div style="margin-top: 10px;">
		
			
			<?php if(!empty($setup->fb_link))
			 {  ?>
		<a href="<?php echo $setup->fb_link?>" target="_blank"><img src="img/facebook.png"  class="social_image"></a>
		 <?php } 
	     if(!empty($setup->gplus_link))
			 { ?>
		<a href="<?php echo $setup->gplus_link?>" target="_blank"><img src="img/google.png" class="social_image"></a>
        <?php } 
	     if(!empty($setup->twitter_link))
			{ ?>
		<a href="<?php echo $setup->twitter_link?>" target="_blank"><img src="img/twitter.png" class="social_image"></a>
		</div>
     <?php }  ?>
	
				</div>
					

				<div class="clearfix"> </div>
			</div>


	<!-- /footer -->
	<div class="footer">
		<div class="container">
			<hr width="90%" style="border:0.5px solid #a7a3a3;">
			<p> &copy;2018 <?php echo $setup->company;?>  . All rights reserved | Design by <a href="http://monkhub.com">Monkhub</a></p>
		</div>
	</div>

		</div>
	<!-- //footer -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- Navigation-JavaScript -->
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	<!-- js for portfolio lightbox -->
	<script src="js/jquery.chocolat.js "></script>
	<link rel="stylesheet " href="css/chocolat.css " type="text/css " media="screen ">
	<!--light-box-files -->
	<script type="text/javascript ">
		$(function () {
			$('.portfolio-grids a').Chocolat();
		});
	</script>
	<!-- /js for portfolio lightbox -->

	<!-- jarallax-js -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	
	<!-- start-smoth-scrolling -->
	<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script>

	
	<!-- //smooth scrolling -->


	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<script type="text/javascript">
<?php
sleep(1);
?>
	document.getElementById("loader").style.display = "none";
</script>
</body>

</html>