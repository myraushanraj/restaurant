<?php
include_once('inc/header.php');
if (isset($_GET['submit_form'])) {
  echo $name=$_GET['name'];
  echo $email=$_GET['email'];
  echo $phone=$_GET['phone'];
  echo $user_message=$_GET['message'];
}

?>

  <!-- banner -->
<div class="banner_menu" id="home">
<h3 class="about_title">Connect with us</h3>
</div>
<br>
<!-- //banner -->  
<div class="container">
  <h3 class="about_detail">Contact</h3>
 <div class="col-md-6">
  <p id="warning"></p>
  <form action="#" method="post" id="form">
     <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="" name="phone" required>
    </div>
    <div class="form-group">
  <label for="comment">Message:</label>
  <textarea class="form-control" rows="5" id="message" required></textarea>
</div>
  <input type="button" onclick="check_validation()" class="theme1 btn_style" value="Submit" style="border: none">
  <p id="warning"></p>
  </form>
</div>
<div class="col-md-6" style="padding:30px">

<!-- ==  gooogle map iframe embed here ================= -->
<?php echo $setup->gmap_iframe;?>
<!-- =-==  google map ka ifrane ends here ============= -->
   <br><br>
   <b>
    <h3>Address:</h3>
   <p><?php echo $setup->support_address?></p>
   <p><img src="icon/email.png" width="14px">&nbsp; <?php echo $setup->support_email?><br>
   <img src="icon/phone.png" width="14px">&nbsp; <?php echo $setup->support_phone?></p></b>
</div>
</div>
<script>
  function check_validation(){
  var name=$('#name').val();
  var email=$('#email').val();
  var message=$('#message').val();
  var phone=$('#phone').val();
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  
if (name=="") {
  var error="Enter Your Name";
}
else if (!re.test(email)) {
  var error="Invalid Email!!";
}
else if (isNaN(phone)) {

  var error="Invalid Phone!!";
}
else if(phone.length!=10){
    var error="Invalid Phone!!";
}
else{
  var error="";
  call_mail();
}
document.getElementById('warning').innerHTML=error;
  }
function call_mail(){
  var name=$('#name').val();
  var email=$('#email').val();
  var message=$('#message').val();
  var phone=$('#phone').val();
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      $('form').hide(1200);
      document.getElementById('warning').innerHTML="Thanks ! We will contact you soon !";
    }
  }
xmlhttp.open("GET","contact.php?name="+name+'&email='+email+'&phone='+phone+'&message='+message+"&submit_form=1",true);
xmlhttp.send();
}
</script>
<?php
include_once('inc/footer.php');
?>
