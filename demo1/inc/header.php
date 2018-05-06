<?php
   include_once('class/db_class.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php include_once"class/setup-class.php";$setup=new web_controllers();echo $setup->meta_title?></title>
    <!-- Favicon -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="http://www.eatnary.com/icon/<?php echo $setup->favicon?>" type="image/gif" sizes="16x16">
  <meta name="description" content="<?php echo $setup->meta_description; ?>">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap-3.1.1.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand|Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Petit+Formal+Script" rel="stylesheet">
 <!-- =======  new setup css============== -->
 <?php include_once "inc/loader_page.php";
include_once "inc/track-order-popup.php";include_once "inc/saved_food_data.php";
include_once "inc/support-popup.php";


?>
<style type="text/css">
.navbar {
    position: relative;
    background: <?php echo $setup->theme1?>;
    color: <?php echo $setup->theme2?>;
        padding-top: 5px;
    padding-bottom: 5px;
    font-family: 
    }

    .track-btn{
        background: <?php echo $setup->theme1?>;
    color: <?php echo $setup->theme2?>;
    border: none;
   
    }
    .mobile_nav {
       background: <?php echo $setup->theme1?>;
    }
    .sidenav{
       background: <?php echo $setup->theme1?>;
    color: <?php echo $setup->theme2?>; 
    }
    .track-btn {
    border: 2px solid <?php echo $setup->theme1?> ;
}
    .track-btn:hover{
       
   
        border: 2px solid #fff;
   
    }
    .search-btn{
          height: 40px;
    /* border: none; */
    padding: 14px 57px;
        padding: 14px 57px;
    border-radius: 0pc !important;

    }

    .modal-footer {
        background: <?php echo $setup->theme1?>;

  }
.cart_details3 {
         background: <?php echo $setup->theme1?>;
    color: <?php echo $setup->theme2?>;
  }
.content_title {
    color: <?php echo $setup->theme1?>;

  }

   .theme1{
          background: <?php echo $setup->theme1?> !important;
    color: <?php echo $setup->theme2?> !important;
    }
    .theme2{
         
    color: <?php echo $setup->theme1?> !important;
    }
.search_wrap{
    position: absolute;
}

    ::-webkit-scrollbar {
    width:10px;
}
::-webkit-scrollbar-track {
    background-color: #eaeaea;
    border-left: 1px solid #ccc;
}
::-webkit-scrollbar-thumb {
    background-color: #ccc;
}
::-webkit-scrollbar-thumb:hover {
    background-color:grey;
}
.layer {
    background-color: rgba(16, 16, 12, 0.62);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.banner-menu{
  background-image: url(http://www.eatnary.com/icon/<?php echo $setup->banner1?> !important);
}
.logo{
  z-index: 1;
  position: absolute;
}
</style>
 <!-- ===  new sewyup css =============== -->
 </head>
<body>

  <!-- mobile nav -->
<div class="mobile_nav">
 <div id="mySidenav_back" class="mySidenav_back" onclick="close_menu()">
 </div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Home</a>
  <?php if($setup->has_faq){ ?> 
  <a href="faq.php">Faq</a>
  <?php
}
  ?>
  <a href="javascript:void(0)" data-target="#myModal_track" data-toggle="modal">Track Now</a>

</div>
 
<div class="col-md-12" style="padding: 0;text-align: center">
  <span style="font-size:30px;cursor:pointer;float: left;" onclick="openNav()">&#9776;</span>
  <span><img src="http://www.eatnary.com/icon/<?php echo $setup->logo; ?>"  style="width:135px;"></span>

<span style="float: right" id="head_bill_mobile"><img src="icon/checkout.png" style="    width: 61%;"></span>
</div>
</div>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
     document.getElementById("mySidenav_back").style.width = "100%";
   
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
     document.getElementById("mySidenav_back").style.width = "0";
}
function close_menu() {
    document.getElementById("mySidenav").style.width = "0";
     document.getElementById("mySidenav_back").style.width = "0";
}

</script>

  <!-- //mobile nav -->
  <div class="desktop_nav">
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="http://www.eatnary.com/icon/<?php echo $setup->logo?>" class="logo" width="200"></a>
    </div>
    <ul class="nav navbar-nav" style="float: right">
      <li><a href="index.php">Home</a></li>
      <?php if($setup->has_faq){ ?> 
      <li><a href="faq.php">FAQ</a></li>
      <?php } ?>
      <li><button href="javascript:void(0)" data-target="#myModal_track" data-toggle="modal" class="btn btn-danger navbar-btn track-btn">Track Now</button></li>
  
      <li id='head_bill'>
      </li>
    </ul>
    
  </div>
</nav>
</div>

<script>
  function toggle_loader(){
var r=document.getElementById('loader7').style.display;
if(r=='none')
  document.getElementById('loader7').style.display='block';
else
  document.getElementById('loader7').style.display='none';
  }

</script>
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
  var r=jQuery('#cart_main').css('height');

if(r=='66px')
 $('#cart_main').animate({height:'90%'},400);  
else
  $('#cart_main').animate({height:'66px'},400);  

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
xmlhttp.open("GET","callscripts/cart_ajax_loader.php?return_front_end=1",true);
xmlhttp.send();
}
function refresh_cart(){
 

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
document.getElementById('saved_cart_id').innerHTML=xmlhttp.responseText;

    }
  }
xmlhttp.open("GET","callscripts/cart_ajax_loader.php?return_front_end=1",true);
xmlhttp.send();
}
function refresh_header(){
 
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
document.getElementById('head_bill').innerHTML=xmlhttp.responseText;
document.getElementById('head_bill_mobile').innerHTML=xmlhttp.responseText;

    }
  }
xmlhttp.open("GET","callscripts/cart_bill_header.php?show_new_bill=1",true);
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
xmlhttp.open("GET","callscripts/add_to_cart.php?cartadded="+code,true);
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
refresh_cart();call_loader()
    }
  }
xmlhttp.open("GET","callscripts/add_to_cart.php?cartremoved="+code,true);
xmlhttp.send();

}
  function clear_cart(){call_loader();
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
           refresh_cart();
    }
  }
xmlhttp.open("GET","callscripts/add_to_cart.php?clear_cart=1",true);
xmlhttp.send();

}


function modify_cart_item(id,element){ 

call_loader();
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

refresh_cart();call_loader();
    }
  }
xmlhttp.open("GET","callscripts/add_to_cart.php?modify_cart="+id+'&newqty='+newqty,true);
xmlhttp.send();
}


function add_to_wishlist(productid){ 
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
      $()
call_loader();
    }
  }
xmlhttp.open("GET","callscripts/add_to_wishlist.php?add_to_wishlist="+productid,true);
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
xmlhttp.open("GET","callscripts/quick_view.php?loadid="+productid,true);
xmlhttp.send();
}



function remove_from_wishlist(productid){ 

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
$('#wishtr'+productid).hide(1200);
    }
  }
xmlhttp.open("GET","callscripts/remove_wishlist.php?id="+productid,true);
xmlhttp.send();
}


function save_my_order(){

var order_id=$('#order_id').val();
var title_save=$('#title_save').val();

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
$('#order_save_form').hide();
document.getElementById('order_save_menu').innerHTML=xmlhttp.responseText;
$('#order_save_form').slideDown(1200);
    }
  }
xmlhttp.open("GET","callscripts/user_save_menu.php?save_submit=1&title_save="+title_save+"&order_id="+order_id,true);
xmlhttp.send();



}
function call_loader(){
var r=document.getElementById('loader7').style.display;
if(r=='none')
$('#loader7').show();
else
$('#loader7').hide();
}
$(document).ready(function(){
refresh_header();
});


</script>

