<?php 
include_once '../inc/all_class.php';
$id=$_GET['loadid'];echo 'id is '.$id;
$pr1=new products($id);
?><h2 class="w3-center">Automatic Slideshow</h2>
<div class="w3-content w3-section" style="max-width:500px">
  <img class="mySlides<?php echo $id;?>" src="img/<?php echo $pr1->all_pics[1];?>" style="width:100%">
  <img class="mySlides<?php echo $id;?>" src="img/<?php echo $pr1->all_pics[2];?>" style="width:100%">
    <img class="mySlides<?php echo $id;?>" src="img/<?php echo $pr1->all_pics[3];?>" style="width:100%">

</div>
