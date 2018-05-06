<!--footer -->
		<div class="container-fluid footer" style="background-image:url(images/footer-background.png)">
		<div class="footer_wrap">
			<div class="skill_info_wthree_agile">
				<div class="col-md-4 banner_bottom_left">
					
				<b>Help</b>
					
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
					
			<b>&nbsp;&nbsp;&nbsp;&nbsp;Support</b>
						
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
				<ul type="none">	
	<b>Social Media</b>
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
					</ul>
				</div>
				

				<div class="clearfix"> </div>
			</div>


	<!-- /footer -->
	<div class="">
		<div class="container" style="padding: 0">
			<hr width="90%" style="border:0.5px solid #a7a3a3;">	
			<p class="footer_para"><span style="float: right;">Delivery at your door.&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/delivery-motorbike.svg" width="35px" ></span> &copy;2018 <?php echo $setup->company;?>  . All rights reserved | Design by <a href="http://monkhub.com">Monkhub</a></p>
		</div>
	</div>
</div>
		</div>
</body>

</html>