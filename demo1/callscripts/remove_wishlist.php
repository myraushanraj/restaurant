<?php 
require_once "../class/customer_class.php";
if(isset($_GET['id'])){

$id=$_GET['id'];
$c1=new customer($_SESSION['ecemail']);
$c1->remove_wishlist($id);
}
?>