<?php require_once('inc/header.php');error_reporting(0) ?>
<style type="text/css">
	.points1{
margin-top: 34px;color: grey;
	}

.text1{
	margin-top: 23px;color:grey;font-weight: normal;
}

</style>

<!-- banner -->
<div class="banner_menu" id="home">
<h3 class="about_title">Privacy Policy</h3>
</div>
<!-- //banner -->
<!-- faq -->

<div class="container" style="margin-top: 120px;margin-bottom: 123px">
<?php $privacy_arr=explode('//',$setup->privacy_page);
for($k=0;$k<12;$k++){
  $privacy_title=explode('$$',$privacy_arr[$k])[0];
  $privacy_string=explode('$$',$privacy_arr[$k])[1];


if(!empty($privacy_title) && !empty($privacy_string) )
{?>
<h4 class="about_detail points1"><?php echo $privacy_title?></h4>
<h5 class="about_detail text1">
	<?php echo $privacy_string?>

</h5>
  
<?php } } ?>
  </div>
    <!-- //faq -->
      <div class="clearfix "></div>
<?php require_once('inc/footer.php') ?>