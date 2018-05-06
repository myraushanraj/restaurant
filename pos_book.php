<?php
require_once "class/all-class.php";
require_once "class/menu-class.php";
require_once "class/misc-class.php";
include_once "class/food_category_class.php";
include_once "class/cart_class.php";
$cart1=new cart_all();
$cart1->clear_my_cart();

?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/mystyle.css" rel='stylesheet' type='text/css' />

<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<style type="text/css">
#menu li {
    position: relative !important;
    margin: 0 !important;
    border-bottom: 0px solid !important;
    }
#menu li a {
    /* font-style: normal; */
    /* font-weight: 600; */
    position: relative;
    display: block;
    padding: 13px 20px;
    color: #fe0000;
    white-space: nowrap;
    /* z-index: 2; */
    background-color: white;
    font-size: 15px;}
#display1{
   
    z-index: 121232323;
    position: fixed;
  
    padding: 23px;display:none;
    height: 362px;
    overflow: hidden;
    margin-top: 104px;
        width: 75%;
    z-index: 121232323;
    background:white;
    position: fixed;
}
#display1>li>a{
	color: red;font-size: 24px;
}

.search-input{    width: 80%;
    font-weight: bold;
    margin-left: 7%;border:none;
    background: transparent;
    font-size: 30px;
    padding: 22px;
    color: red;
    margin-top: -31px;
    border-bottom: 2px solid #5d5454;
}
.red-tab{
	background: #d2cece;
    padding: 9px;
    margin-bottom: 18px;
    display: inline-block;
    border: 1px #b13535 solid;
    color: red !important;
}
.red-tab>a:hover{
	color:white;
    text-transform: capitalize;
}
.red-tab>a{
	color: red;
    text-transform: capitalize;
}
.red-tab:hover{
	background: red;
	color:white ;
    text-transform: capitalize;
}

	.cart_main{
	       width: 410px;
    padding: 12px;
       background:white;
  height:100%;
    position: fixed;
    box-shadow: 0px 0px 29px 2px #949387;
    z-index: 22;
    bottom: 0;
    color: white;
    float: right;
    margin-left:2000px;
}
.item-details{
  display: -webkit-inline-box;
      color: red !important;

}
.item-title{
	color: red;
}
</style>
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner" id='whole_frame'>
             <!--header start here-->
		
<!--heder end here-->
		<ol class="breadcrumb">
                <li class="breadcrumb-item"> <i class="fa fa-angle-right"></i></li>
    <a href="javascript:void(0)">
 <span id="cart_count" onclick="refresh_cart()" class="cart_count" style="font-size: 13px;
    background: red;
    color: white;
    padding: 12px;
    border-radius: 54%;">   	
<?php echo $cart1->item_count;?></span>    	
    </a>
<li>
	<a href="javascript:void(0)" style="font-style: italic;color:red" 
  onclick="show_checkout_Form()">Proceed to checkout</a>
</li>
            </ol>
<!--four-grids here-->
<!--//four-grids here-->
<!--agileinfo-grap-->
<div class="agileinfo-grap">
<div class="agileits-box">

<div class="agileits-box-body clearfix">
<div id="hero-area">
	<ul>
<?php $trend_arr=return_trending('5');
	for ($m=0; $m < sizeof($trend_arr); $m++) { 
						# code...
						 $product=new products($trend_arr[$m]['sl']);
					?>
<!-- === display in tablular form for themenu item here ==================== -->
<li class="red-tab">
<a href="javascript:void(0)" onclick="add_to_cart('<?php echo $product->productid;?>')">
<?php echo $product->title?>
</a>
</li>
<!-- =-=== tabluar menu ends here ========================================== -->


					<?php 
					} ?>
					</ul>
<br><br>
    <ul type='none' id="display1" class='search-bar-ul' onmouseout="this.style.display='none'" onmouseover="this.style.display='block'" ></ul>

	<input type='text' id='serach_bar' onkeyup="call_username_search_prefill(this)" placeholder="Search anything ..." class="search-input">


</div>
</div>
</div>
</div>
	<!--//agileinfo-grap-->
<!--photoday-section-->	
	
                        </div>
						<div class="clearfix"></div>
                   
	<!--//photoday-section-->	
	<!--w3-agileits-pane-->	
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
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->

</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
			<?php
$all_menu=restaurant_menu();
$rest_setup=new rest_setup('Bawarchi');
$cat_arr=$rest_setup->restaurant_food_category();
?>
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
				<!-- ===== ONE CATEGORY REPETITION WITH THE MENU ==========================================-->		
								<?php for ($i=0; $i < sizeof($cat_arr); $i++) { 
									?>
									 <li id="menu-academico" ><a href="#"><i class="fa fa-leaf" aria-hidden="true"></i><span> <?php echo $cat_arr[$i]['category']?></span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   								<?php	# code...
									$item_arr=restaurant_menu_sorted($cat_arr[$i]['category']);
									for ($m=0; $m < sizeof($item_arr); $m++) { 
						# code...
						 $product=new products($item_arr[$m]['sl']);
					     ?>		
				 <li id="menu-academico-avaliacoes" ><a href="javascript:void(0)" onclick="add_to_cart('<?php echo $product->productid;?>')"><?php echo $product->title?></a></li>
						<?php }?>
										  </ul>
								     </li>
										<?php } ?>
			<!-- ========== one category repetition ends here ============================================ -->						
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
			return new Date(year, month - 1, day).getTime();
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
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>



	<!-- ==== cart wala part from main web ============================================================== -->

<div class="cart_main" id="cart_main">
<div class="cart_body" id="cart_body" >
<?php echo $_SESSION['product_chain']?>
</div>
</div>	
    <script>
function call_user_profile(){
var xmlhttp;
if(window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById('profile_pop_body').innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","inc/user-profile.php?called=1",true);
xmlhttp.send();
}
function refresh_open_cart(){
	var r=jQuery('#cart_main').css('marginLeft');

if(r=='96%')
 $('#cart_main').animate({marginLeft:'69%'},400);  
else
  $('#cart_main').animate({marginLeft:'96%'},400);  

var xmlhttp;   
if(window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById('cart_body').innerHTML=xmlhttp.responseText;

    }
  }
xmlhttp.open("GETadmin-scripts/cart_ajax_loader.php?return_front_end=1",true);
xmlhttp.send();
}
function refresh_cart(){
 
	var r=jQuery('#cart_main').css('marginLeft');
if(r=='2000px')
$('#cart_main').animate({marginLeft:'69%'},400);  
else
$('#cart_main').animate({marginLeft:'2000px'},400); 
var xmlhttp;   
if(window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById('cart_body').innerHTML=xmlhttp.responseText;

    }
  }
xmlhttp.open("GET","admin-scripts/cart_ajax_loader.php?return_front_end=1",true);
xmlhttp.send();
}

function change_qty(id,type){
var last=document.getElementById('current_cart_qty'+id).value;
if(type=='asc')
{
    document.getElementById('current_cart_qty'+id).value=+last+1;

}else{
            if(last!=0)
          {
          document.getElementById('current_cart_qty'+id).value=+last-1;
          }
}
}



function hide_unhide_cart(){
var r=jQuery('#cartid').css('margin-top');

if(r=='-100px')
 $('#cartid').animate({marginTop:'2200px'},400);  
else
  $('#cartid').animate({marginTop:'-100px'},400);  
refresh_cart();
}


  function add_to_cart(code){
  //window.location='shop-single.php?cartadded='+code+'&qty='+qty;
var xmlhttp;    
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
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
       $('#cart_count').animate({fontSize:'34px'},400);  
       $('#cart_count').animate({fontSize:'13px'},400);  

      document.getElementById('cart_count').innerHTML=+document.getElementById('cart_count').innerHTML+1;
refresh_cart();hide_unhide_cart();call_loader()
    }
  }
xmlhttp.open("GET","admin-scripts/add_to_cart.php?cartadded="+code,true);
xmlhttp.send();

}



  function remove_cart(code){call_loader();
  //window.location='shop-single.php?cartadded='+code+'&qty='+qty;
var xmlhttp;    
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
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {

document.getElementById('cart_count').innerHTML=+document.getElementById('cart_count').innerHTML-1;

       $('#cart_count').animate({fontSize:'34px'},400);  
       $('#cart_count').animate({fontSize:'13px'},400);
refresh_cart();call_loader()
    }
  }
xmlhttp.open("GET","admin-scripts/add_to_cart.php?cartremoved="+code,true);
xmlhttp.send();

}


function show_checkout_Form(){

var xmlhttp;    
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
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById('whole_frame').innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","admin-scripts/show_checkout_form.php",true);
xmlhttp.send();
}
  function clear_cart(){
  //window.location='shop-single.php?cartadded='+code+'&qty='+qty;
var xmlhttp;    
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
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
            document.getElementById('cart_count').innerHTML=0;

refresh_cart();hide_unhide_cart();
    }
  }
xmlhttp.open("GET","admin-scripts/add_to_cart.php?clear_cart=1",true);
xmlhttp.send();

}


function modify_cart_item(id,element){ 
var newqty=document.getElementById('current_cart_qty'+element).value;
var xmlhttp;    
if(window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    
    }
  }
xmlhttp.open("GET","admin-scripts/add_to_cart.php?modify_cart="+id+'&newqty='+newqty,true);
xmlhttp.send();
}

function quick_view(productid){ 
  call_loader();
var xmlhttp;    
if(window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
call_loader();
document.getElementById('quick_view_id').innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","admin-scripts/quick_view.php?loadid="+productid,true);
xmlhttp.send();
}


function call_username_search_prefill(r){
  var search1=r.value;
 var xmlhttp;    
// ====password do not match =======
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
    $('#display1').show();
      document.getElementById('display1').innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","admin-scripts/prefills.php?load_user_profiles="+search1,true);
xmlhttp.send();
}

</script>




	<!-- === cart wala part from the main web =========================================================== -->
</body>
</html>