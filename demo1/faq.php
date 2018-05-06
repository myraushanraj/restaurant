<?php require_once('inc/header.php');error_reporting(0) ?>
<style type="text/css">
	.points1{
    margin-top: 34px;color:#33373D;
    font-family: lato;
        font-size: 22px;
    padding-bottom: 6px;	}

.text1{
	margin-top:px;color:grey;font-weight: normal;
      font-family: lato;
      color: #33373D;
}

</style>

<!-- banner -->
<div class="banner_menu" id="home" >
<div class="layer">
    </div>
<h3 class="about_title">Frequently asked questions</h3>
</div>
<!-- //banner -->
<!-- faq -->

<div class="container faq_wrap" style="margin-bottom: 123px">
<?php $privacy_arr=explode('//',$setup->faq_page);
for($k=0;$k<12;$k++){
  $privacy_title=explode('$$',$privacy_arr[$k])[0];
  $privacy_string=explode('$$',$privacy_arr[$k])[1];


if(!empty($privacy_title) && !empty($privacy_string) )
{?>
<h3 class="about_detail points1"><?php echo $privacy_title?></h3>
<h4 class="about_detail text1">
	<?php echo $privacy_string?>

</h4>
  
<?php } } ?>
  </div>
    <!-- //faq -->
      <div class="clearfix "></div>
<?php require_once('inc/footer.php') ?>