<?php 
require_once "../class/product_class.php";

$r1=new reviews($_GET['id']);
$rating=5;
$r1->add_new_review($_GET['content'],$rating);

echo 'ccmame';
?>