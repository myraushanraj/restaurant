<?php
require_once "class/all-class.php";
require_once "class/menu-class.php";
include_once 'top-nav.php';
require_once "class/misc-class.php";
include_once "class/setup-class.php";
include_once "class/food_category_class.php";

$setup=new web_controllers();
// fetch all the privacy piluic y ka content over here 
?>
<style type="text/css">
  .double-text{
    height: 200px !important;
  }
  .bold{
    font-weight: bold;
  }
  .strong-title{
    font-style:italic;color:red;font-size: 23px
  }
  textarea{
    padding-top:20px !important;
  }
</style>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Tabels</li>
</ol>

<div class="agile-grids">	
				<!-- tables -->
				<div class="agile-tables">
	<div class="container" id="page_updater">

<strong class="strong-title" id='strong-title'>Privacy Policy Data Uploader</strong>
<p style="margin-top:50px;color:grey" id="para1">You are advised to enter the title section first and then the sub-section for it. </p>
<form id="uploader_form">
<?php 
// divide the policy into segmnents and display the same over  below ====================
$privacy_arr=explode('//',$setup->faq_page);
for($k=0;$k<12;$k++){
  $privacy_title=explode('$$',$privacy_arr[$k])[0];
  $privacy_string=explode('$$',$privacy_arr[$k])[1];
?>
<textarea id="privacy_title<?php echo $k?>" class="bold"><?php if(!empty($privacy_title)) echo $privacy_title?></textarea> 
<textarea id="privacy_content<?php echo $k?>" class="double-text"><?php if(!empty($privacy_string)) echo $privacy_string;else echo 'NULL';?></textarea>
<?php 
} ?>

<input type="button" onclick="update_page()" class="btn new-btn pull-left" style="width:200px !important" value="Update Page">
</form>
</div>
					</div>
			</div>
<script>
var xmlhttp;    
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
function update_page(){

var last_one="";var embedded='';
for(var k=0;k<12;k++){
var title=$('#privacy_title'+k).val();
var desc=$('#privacy_content'+k).val();
var embedded=embedded+title+'$$'+desc+'//';
  }
// NOW PASS THIS EMBEDDED VARIABLE TO THE DATABASE PAGE ACCESS ONCE AGAIN ===========================
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
          $('#uploader_form').hide(1200);$("#para1").hide();
          document.getElementById('strong-title').innerHTML=xmlhttp.responseText;
    }
  }
   xmlhttp.open("GET", "admin-scripts/save_footer_page.php?page=faq"+"&content="+embedded+"&save_page=1", true);
        xmlhttp.send();
}

function load_menu_editor(a){
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById('edit_menu_body').innerHTML=xmlhttp.responseText;
    }
  }
   xmlhttp.open("GET", "admin-scripts/edit_menu.php?load_menu_editor="+a, true);
   xmlhttp.send();
}
</script>