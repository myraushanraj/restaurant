<?php
include_once '../class/customer_class.php';
if(isset($_GET['add_to_wishlist']))
{
$c1=new customer($_SESSION['ecemail']);
$c1->add_wishlist($_GET['add_to_wishlist']);
}
?>