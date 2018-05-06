<?php require_once('inc/header1.php');
?>
<style type="text/css">
			#scooter{
           animation: eye_k_a 6s infinite ; 
           
		}
		  @media only screen and (max-width:800px){
		#scooter{
           animation: none ; 
           
		}
		}
		@keyframes eye_k_a {
  from {
      margin-left: 0%;
   
  }
  to {
        margin-left: 72%;
     }
}
</style>
<div class="col-md-12">
	<div class="congra">
		<h3>Congratulations!! Your Order has been processed with order id CNF012457877 </h3><br>
		<div class="cogra2">
		<p>SMS Acknowledgement has been send to your mobile : +91-8109299136 </p>
		<p>Invoice for this order with track link has been attached to your mail Id: raushan@monkhub.com</p>
	</div>
	</div>
</div>
<div class="col-md-12">
	<img src="icon/scooter.png" class="img-responsive" id="scooter"> 
</div>
 <div class="clearfix "></div>
<?php require_once('inc/footer.php');
?>