<?php 
include_once "../class/setup-class.php"; 

$image_for=$_GET['image_for'];

// tbhis wo;ll; gove tyhe pci slecytopm baraiavb;ler  



?>
<form action='#' method='post'>
<span>In case you are sure to add, please choose a relevant icon. In case you dont find
any related picture for this product, upload a new one.<br>
<br>
<a href='asd' id='link_new' target='_blank'>Yes allow me to upload</a>
 </span><br>

 <input type='hidden' name='iconfor' id='iconfor' value=''>
<?php 
$coverarr=return_all_icons($image_for);
for($r=0;$r<sizeof($coverarr);$r++)
{
     $filename=$coverarr[$r]['file_name'];
  ?>
  <img src="../icon/<?php echo $filename;?>" class='right-gap' style='width:30%'>
  <span> ( <?php echo $coverarr[$r]['timings'];?>)</span>   <br>

   <input type='radio'  value='<?php echo $filename;?>' name='picsel'> Choose me
  <hr>
  <?php 
}
?>
<input type='submit' name='update_icon'  class="btn btn-success" >
</form>