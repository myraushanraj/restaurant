<?php
require_once "class/all-class.php";
require_once "class/menu-class.php";
require_once "class/misc-class.php";
include_once "class/food_category_class.php";
include_once "class/cart_class.php";
$cart1=new cart_all();
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
<style type="text/css">
input[type="number"]{
  min-width: 80px;
  max-width: 84px;
}
</style>
</head>
<body>
<a href="pos_book.php" style="font-weight:bold;color: red;font-style: italic;">New Order</a>

<div class="container" style="padding-top: 200px;padding-left: 12%">
<i style="color:red;font-weight: bold">
  Congratulations ! Your the customers order has been placed with order id <?php echo $_GET['orderid']?>. In case it is a store outlet order,
  collect a cash of <?php echo $cart1->bill?> and make denomination entry below.

</i>
 <ul>
            &#8377; 1000<input type="number" value="0">
            &#8377; 500<input type="number" value="0">

            &#8377; 200<input type="number" value="0">

            &#8377; 100<input type="number" value="0">
            &#8377; 50<input type="number" value="0">

            &#8377; 20<input type="number" value="0">
            &#8377; 10<input type="number" value="0">

            <input type="button" class="theme-btn" style="width:200px" value="Submit money">


          </ul>

</div>


	<!-- === cart wala part from the main web =========================================================== -->
</body>
</html>