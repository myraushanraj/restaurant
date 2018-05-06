<?php
include('class/all-class.php');
if (isset($_POST['submit_input'])) {
$username=$_POST['email'];
$password=$_POST['password'];


$status=login_profiles($username,$password);
//$status=$cust->login_customer($email,$password);
 

}
?>
<!DOCTYPE html>
<html>
<head>
<title>eatnary</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
	body{
		background: url(img/index-background.jpeg) no-repeat center red;
    
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    min-height: 100vh
	}
	.w3-container{
		background:#0000006b;height: 700px;
	}
	.center{
    text-align: center;
   } 
   .wrap{
  margin-top:13%;
   }
   a{
   	text-decoration: none;
   }
   .make{
   	    padding: 10px 42px 10px 42px;
    background: #ff8400;
    color: #fff;
   }
   .make1{
   	padding: 10px 30px 10px 30px;
    background: #ff8400;
    color: #fff;
    float: right;
    margin: 10px;
   }
   .setup{
   	color: #fff;
   	    font-family: serif;
   }
   .form{
        width: 44%;
    margin: auto;
   }
   .form-control{
           border: 1px solid #ff8400;
    border-radius: 7px;
    height: 42px;
    background: #00000057;
    color:#fff;
   }
   ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: pink;
}
.make_submit{
  border: none;
    padding: 10px 30px 10px 30px;
    background: #ff8400;
    color: #fff;
    float: right;
    margin: 10px;
}
.already_login{
      color: #ff8400;
    font-size: 18px;
}
@media screen and (max-width: 767px){
   .form{
        width: 95%;
    margin: auto;
   }
}
</style>
</head>
<body>

<div class="w3-container" style="">
<a href=""><img src="icon/eatnarylogo.png" style="width: 110px;"></a>
<a href="register.php" style="float: right;margin:19px" class="make">Signup</a>

<div class="wrap">

<h3 class="center setup">Login</h3><br>
<form action="" class="form" method="post">
  <div class="form-group">
    
    <input type="email" class="form-control" placeholder="Email Address" name="email" required="">
  </div>
  <div class="form-group">
  
    <input type="password" class="form-control" placeholder="******" name="password" required="">
  </div>
  
  

<input type="submit" name="submit_input" class="make_submit" id="make_submit" value="Login">
<?php
 if (isset($status)) { ?>

<p style="text-align: ;color: #fff">Invalid email or password</p>
 <?php }
?>
</form>
</div>
</div>




</div>

</body>
</html>       
