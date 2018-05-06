<?php
include_once('../class/cart_class.php');

if(isset($_GET['cartadded']))
{
  $cart_num=$_GET['cartadded'];

$c1=new cart_all();
$c1->add_item($cart_num,'1','universal');

}



if(isset($_GET['cartremoved']))
{
  $cart_num=$_GET['cartremoved'];
  $c1=new cart_all();
$c1->remove_item($cart_num);

}


if(isset($_GET['clear_cart']))
{
  $c1=new cart_all();
$c1->clear_my_cart();

}


if(isset($_GET['modify_cart']))
{	$productid=$_GET['modify_cart'];
	$newqty=$_GET['newqty'];

	echo "new qty hai ".$newqty;
$c1=new cart_all();
// check if the item is added already or not 
$qty=$c1->return_qty_added_for_productid($productid);

if(!$qty)
{
$c1->add_item($productid,'1','universal');
}
else
$c1->modify_existing_item($productid,$newqty);
}


?>