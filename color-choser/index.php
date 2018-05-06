<?php 
include_once '../class/setup-class.php';
if(isset($_POST['submit_themes']))
{
	 $rest_key=REST_KEY;
	$theme1='#'.$_POST['theme1'];
	$theme2='#'.$_POST['theme2'];
  	$d1=new dbconn();$arr1=array();
	 $db=$d1->connect();
$cmd="UPDATE web_controllers set theme1='$theme1',theme2='$theme2' where rest_key='$rest_key'";
$result=$db->query($cmd);
// forward now to the setup wala page 
if($result)
	echo "<script>window.location='../setup-2.php';</script>";
}
$set1=new web_controllers();
/* ====================== submit a new theme ======================================================== *
// ==================== submit a new theme ends here ============================================================= */

?>
<html>
<head>
	<title>Theme selection </title>
	<script type="text/javascript" src="jscolor.js"></script>



<!-- ==== the header section  for the usewr demo part for final confirmation ============================================ -->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!--css-->
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/font-awesome.css" rel="stylesheet">
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../../js/jquery.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!--search jQuery-->
	<script src="../../js/main.js"></script>
<!--search jQuery-->
<script src="../../js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
 </script>
 <!--mycart-->
<script type="text/javascript" src="../../js/bootstrap-3.1.1.min.js"></script>
 <!-- cart -->
<script src="../../js/simpleCart.min.js"></script>
<!-- cart -->
  <!--start-rate-->
<script src="../../js/jstarbox.js"></script>
	<link rel="stylesheet" href="../../css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>

		<style type="text/css">

.warning{
color: 	red;

font-size: 18px;font-weight: bold;

}
.navbar-default .navbar-nav > li > a {
	color:<?php echo $set1->theme2?>;
}
.header_id_font{

	color:<?php echo $set1->theme2?>;
}
.btn-danger:hover, .btn-danger:focus, .btn-danger.focus, .btn-danger:active, .btn-danger.active, .open > .dropdown-toggle.btn-danger {
   color: #fff; 
   border-color: #fff; 
   background:red; 
}
		</style>
<!--//End-rate-->
</head>
<body>
	<!--header-->
			<header id="header_id" class="header">
				<div class="row">
					<div class="nave_menu">
					<nav class="navbar navbar-default" id="nav1">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  
						  <ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="index.php">HOME</a></li>
							<li><a href="menu.php">PRICINGS</a></li>
							<li> <a href="javascript:void(0)" style="display: -webkit-box;" style="    display: -webkit-box;
    border: 2px white solid;
    margin-right: 18px;
" data-toggle='modal' id="trackid1" data-target='#trackorder'>Track order</a></li>
							<a href='javascript:void(0)' data-toggle='modal' data-target='#cart_pop' onclick="refresh_open_cart()" style='color:black'>
<span id="cart_count" class="cart_count">
4
</span>
</a>
						  </ul>
						</div><!-- /.navbar-collapse -->

					</nav>
					</div>	
				</div><!--End of row -->
	</header> <!--End of header -->
		<!--header-->
<!-- ==  the header section ends here ============================================================================= -->
<!-- ======  the color choser starts here =-================================== -->
<div class='row' style="margin-top: 300px">
<div class='col-md-4'></div>
<div class='col-md-6'>
<form action="#" method="post" >
<div class='warning' >Choose the background color ( theme color )<br>
 <input class="color" name='theme1' value="66ff00" onchange='change_color_codes(this.value)'>
</div>
<div class='warning' >Choose the foreround color  ( theme inverted )<br>
<input class="color"  name='theme2' value="66ff00" onchange='change_fore_color_codes(this.value)'>
</div>
<br>
<input type="submit" class='btn btn-danger' name='submit_themes' value=" Works for me !"  >
</form>
</div>
</div>
<!------ ===  the coolor choser ends her ======================================= -->
<div class='row' style='margin-top:200px'>
	<div class='col-md-2' ></div>
	<div class='col-md-6'>
<strong>Theme section window for client.</strong>
<p>You are always advised to set the loader first and then select the theme accorfing to your company design and color codes </p>
</div>
<script>
function change_color_codes(a){
document.getElementById('header_id').style.backgroundColor=a;
document.getElementById('nav1').style.backgroundColor=a;
}
function change_fore_color_codes(b){
document.getElementsByClassName('header_id_font')[0].style.color=b;
document.getElementsByClassName('header_id_font')[1].style.color=b;
document.getElementsByClassName('header_id_font')[2].style.color=b;
document.getElementsByClassName('header_id_font')[3].style.color=b;
document.getElementsByClassName('header_id_font')[4].style.color=b;
}
</script>
</body>
</html>