<?php
include_once "inc/loader_page.php";include_once"class/setup-class.php";
include_once "inc/track-order-popup.php";include_once "inc/saved_food_data.php";
include_once "inc/support-popup.php";
$setup=new web_controllers();
$company=$setup->company;
if(empty($company)){
  ?>
              <script type="text/javascript">

window.location='demo/user-login.php';


              </script>

<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $setup->meta_title?></title>
    <link rel="shortcut icon" 
              href="icon/<?php echo $setup->favicon?>"
              sizes="16x16 32x32 48x48 64x64" 
              />
                <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="lightbox2/src/css/lightbox.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/loader.css">
 <!-- =======  new setup css============== -->
<style type="text/css">
.works{
  text-align: center;
    font-size: 18px;
    color: gray;
}
.make_order_btn{
  background: red;
    color: white;
    border-radius: 8px;
    border: 0;
    padding: 8px 15px 8px 15px;
    margin-right: 15px;
}
.learn_more_btn{
    background: transparent;
    color: white;
    border-radius: 8px;
    border:2px solid #fff;
    padding: 6px 18px 6px 18px;

}
.trending{
  text-align: center;
}
.head_banner{
  height: 350px;
  margin-top: 60px;
  background-position: center;
}
.banner_tag_line{
  position: absolute;
    top: 245px;
    color: #fff;
    margin-left: 28px;
}
.label {
    display: inline-block;
    margin-bottom: .5rem;
    font-size: 14px;
    color: #312b2b;
}
.navbar {
    position: relative;
    background: <?php echo $setup->theme1?>;
    color: <?php echo $setup->theme2?>;
    border: 0;
    border-radius: 0;
    margin-bottom: 0px;
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
#search1{
  padding-left:20px;
    color: black;
    text-transform: capitalize;
    font-size: 18px;
}
.banner-menu{
  background-image: url(http://eatnary.com/icon/<?php echo $setup->banner1?>);
    background-size: 100%;
    background-repeat: no-repeat;
    position: relative;
}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
.row{
margin-right: 0px;
}
header {
    position: fixed;
    width: 100%;
    opacity: 1;
    z-index: 12;
    display: block;
    top: 0;
}
  .mobile_menu{
        position: fixed;
    width: 100%;
    z-index: 999;
    display: none;
    background: <?php echo $setup->theme1?>;
    color: <?php echo $setup->theme2?>; 
    top: 0;
  }
  .tag_line{
        position: absolute;
    top:200px;
    color: #fff;
  }
.track_order{
      border: 1px solid #fff;
    padding: 6px;
    border-radius: 13px;
}
.track_order:hover{
  border: 1px solid <?php echo $setup->theme1 ?>;
    padding: 6px;
    border-radius: 13px;
    background: red;
    color: <?php echo $setup->theme2 ?>
}
.desktop_menu li a{

    padding: 9px;
   
}
.desktop_menu li a:hover{
background: red;
    padding: 9px;
    border-radius: 6px;


}
#head_bill a img{
      margin-top: -2px;
}
@media screen and (max-width:700px) {
  .head_banner{
  height:200px;
  margin-top: 60px;
  background-position: center;
}
 .tag_line{
        position: absolute;
    top: 93px;
    color: #fff;
  }
  header{
    display: none;

  }
  .mobile_menu{
    display: block;
  }
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.desktop_menu li{
list-style: none;
float: left;
padding: 2px 15px 8px 15px;
font-size: 16px;
}
</style>
</head>
<body id="mypage">
    <!--CSS Spinner-->

<div class="modal fade" id="myModal_track" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <div class="modal-body text-center">

<!-- === ================= Track wala form ========================= -->
<form action='#' method='post' >

  <h4 class="modal-title">Track My Order</h4>
<div id='ajaxtrack'></div>
<label>Enter the 10 Digit Booking Id :</label><br>
<input type='text' class="modal-input" id="bookingidtrack" name='bookingidtrack' placeholder='Enter the booking Id ' id='trackid' >
</form>

<!-- ===  track wala form ============================================ -->
  
        </div>
      <div class="modal-footer">
<a href='javascript:void(0)' id="bookingidtrackbtn" class='modal-btn'  onclick='track_my_booking()' name='update_booking'>Track</a>
        </div>
      </div>f
    </div>
  </div>
 <header> 
<div class="theme1 container-fluid">
<div class="col-md-6">
 <a href="index.php"> <img src="http://eatnary.com/icon/<?php echo $setup->logo?>" width="200" style="    margin-top: 10px;
    margin-left: 25px;"></a>
</div>
<div class="col-md-6">
  <div class="col-md-12">
     <p style="    padding: 9px 122px 0 22;
    font-size: 15px;"><b>Call us </b>:  <?php echo $setup->support_phone?> &nbsp;<b> Email</b>: <?php echo $setup->support_email?> </p>
  </div>
  <div class="col-md-12 desktop_menu">
    <li class="active"><a href="javascript:void(0)" data-target="#myModal_track" data-toggle="modal"  class="nav-section1 track_order" id="home-btn">&nbsp;&nbsp;Track Order&nbsp;&nbsp;</a></li>
    <?php if($setup->has_faq){ ?> 
      <li><a href="faq.php">FAQ</a></li>
      <?php } ?>
                    <li><a href="#hello" class="nav-section2" id="about-btn">About</a></li>
                    <li><a href="#contact" class="nav-section5" id="contact-btn">Contact</a></li>
                    <a id='head_bill'></a>
      
  </div>
</div>
</div> 
   </header>
    
   
        



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
<div class="mobile_menu">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div class="col-md-12" style="text-align: center">
<span style="font-size:35px;cursor:pointer;float:left" onclick="openNav()">&#9776;</span>
<img src="http://eatnary.com/icon/<?php echo $setup->logo?>" width="200" style="    margin-top: 10px;
    margin-left: 25px;">
    <span id="head_bill_mobile"></span>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "75%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

</script>
</div>
