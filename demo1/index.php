<?php require_once('inc/header.php'); ?>
<!-- banner -->
<!-- ===  geo scripts ========================= -->

  <!-- ----------------------- getting the address of the user -------------------------- -->
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>  
<script src="//code.jquery.com/jquery-1.9.js"></script>
<script>

$( document ).ready(function() {

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
document.getElementById('checkout_cart').innerHTML=xmlhttp.responseText;

    }
  }
xmlhttp.open("GET","callscripts/cart_ajax_loader-checkout.php?return_front_end=1",true);
xmlhttp.send();



});


function t1(lat,long)
{

// Hidden for now 

     if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
var latlng =lat+','+long;
var url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + latlng + "&sensor=false";
$.getJSON(url, function (data) {
    for(var i=0;i<data.results.length;i++) {
        var adress = data.results[0].formatted_address;
         document.getElementById('search1').value=adress;
    }
   calculate_distance(lat,long,adress);
});
}

function getLocation() {
  toggle_loader();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
    toggle_loader();
   
}

function showPosition(position) {   
          t1(position.coords.latitude,position.coords.longitude )

   
}


function calculate_distance(lat,long,address){

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
xmlhttp.open("GET","callscripts/calculate_customer_distance.php?latitude="+lat+"&longitude="+long+"&calculate_now=1"+"&address="+address,true);
xmlhttp.send();
}



</script>

<!-- ===  geo scripts ========================= -->

<!-- //banner -->
<div class="banner" id="home" style="background-image:url(http://www.eatnary.com/icon/<?php echo $setup->banner1;?>)">
<div class="layer">
    </div>
    <div class="search_wrap">
      <div class="search">
        <form action="#" method="post">
  
             <input type="search" name="" id="search1" class="search_box" style="" placeholder="Delievery Location" placeholder="Delievery Location">
             <span class="locate_me"><a href="#" onclick="getLocation()" style="color: gray;"><img src="img/locate.png" style="width:15px;padding-bottom: 2px;">&nbsp;Locate Me</a></span>
             <a href="menu.php" class="search_button1 theme1">Search</a>
        </form> 
     </div>
    </div>
      <div class="top_cotation">
            <h3  class="cotation_head">" <?php echo $setup->tag_line?>"</h3><br>
            <h3 class="cotation_head">Come join us. Life is so endlessly delicious."</h3>
      </div>
 </div>
  <!-- //banner -->
  <!-- trending -->
    <div class="servies" id="services">
       <div class="container">
          <h3 class="trending">Trending</h3>
    
          <div class="skill_info_wthree_agile">
              <div class="col-md-3 banner_bottom_left">
                 <img src="img/1.png" class="trend_image"> 
              </div>
              <div class="col-md-3 banner_bottom_left">
                <img src="img/2.png" class="trend_image"> 
              </div>
              <div class="col-md-3 banner_bottom_left">
                <img src="img/3.png" class="trend_image"> 
              </div>
              <div class="col-md-3 banner_bottom_left">
                <img src="img/4.png" class="trend_image">  
              </div>

                   <div class="clearfix"> </div>
          </div>
        </div>
   </div>
  <!-- //trending -->
  <!-- how it works -->
    <div class="servies" id="services" style=" background-image: url(http://localhost/food/temp/web/img/secondimage.png);">
    <div class="container">
      <h3 class="trending">How It Works</h3>
    
      <div class="skill_info_wthree_agile">
        <div class="col-md-3 works">
          <img src="img/menu.png">
        <div class="col-xs-12 banner_bottom_grid_right">
                <p>You choose menu and place order</p>
              </div>  
        </div>
        <div class="col-md-3 works">
        <img src="img/location.png">
        <div class="col-xs-12 banner_bottom_grid_right">
                <p>You receive track link</p>
              </div>  
        </div>
        <div class="col-md-3 works">
          <img src="img/wallet.png">
          <div class="col-xs-12 banner_bottom_grid_right">
                <p>Delivery boy picks delivery, you pay for your order</p>
              </div>  
        </div>
          <div class="col-md-3 works">
          <img src="img/like.png">
          <div class="col-xs-12 banner_bottom_grid_right">
                <p>Happy customers put a review</p>
              </div>  
        </div>

        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <!-- //how it works -->
  <!-- Clients say -->
    <div class="servies" id="services">
    <div class="container">
      <h3 class="trending">Client Say</h3>
    
      <div class="skill_info_wthree_agile">
        <div class="col-md-4 banner_bottom_left">
          <div class="banner_bottom_pos_w3ls">
            <div class="banner_bottom_pos_grid">
              <div class="col-xs-3 banner_bottom_grid_left">
                <div class="bottom_grid_left_grid">
                  <img src="img/raushan pic.jpg" class="testimonial_image">
   
                </div>
              </div>
              <div class="col-xs-9 banner_bottom_grid_right">
                <h4 class="testimonial_title">Raushan Raj<br>Delhi</h4>
              </div>
              <div class="col-xs-12 banner_bottom_grid_right">
                <p>Amazing Place for ambience and music, the food served was good. the dal makhani was good and I found there a pasta was decent. I liked there sitting area special near the DJ. hence i would give this place 4.5</p>
              </div>
              <div class="clearfix"> </div>

            </div>
          </div>
        </div>
         <div class="col-md-4 banner_bottom_left">
          <div class="banner_bottom_pos_w3ls">
            <div class="banner_bottom_pos_grid">
              <div class="col-xs-3 banner_bottom_grid_left">
                <div class="bottom_grid_left_grid">
                  <img src="img/raushan pic.jpg" class="testimonial_image">
   
                </div>
              </div>
              <div class="col-xs-9 banner_bottom_grid_right">
                <h4 class="testimonial_title">Raushan Raj<br>Delhi</h4>
              </div>
              <div class="col-xs-12 banner_bottom_grid_right">
                <p>Amazing Place for ambience and music, the food served was good. the dal makhani was good and I found there a pasta was decent. I liked there sitting area special near the DJ. hence i would give this place 4.5</p>
              </div>
              <div class="clearfix"> </div>

            </div>
          </div>
        </div>
       <div class="col-md-4 banner_bottom_left">
          <div class="banner_bottom_pos_w3ls">
            <div class="banner_bottom_pos_grid">
              <div class="col-xs-3 banner_bottom_grid_left">
                <div class="bottom_grid_left_grid">
                  <img src="img/raushan pic.jpg" class="testimonial_image">
   
                </div>
              </div>
              <div class="col-xs-9 banner_bottom_grid_right">
                <h4 class="testimonial_title">Raushan Raj<br>Delhi</h4>
              </div>
              <div class="col-xs-12 banner_bottom_grid_right">
                <p>Amazing Place for ambience and music, the food served was good. the dal makhani was good and I found there a pasta was decent. I liked there sitting area special near the DJ. hence i would give this place 4.5</p>
              </div>
              <div class="clearfix"> </div>

            </div>
          </div>
        </div>
        

        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <!-- client say -->
<?php
include_once('inc/footer.php');
?>