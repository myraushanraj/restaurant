<?php 
include_once "../class/menu-class.php";
if(isset($_GET['load_user_profiles']))
{
  $username=$_GET['load_user_profiles'];
  $arr1=array();
      $obj1=new dbconn();
      $ustring='%'.$username.'%';
            $con=$obj1->connect();
          $sql="SELECT sl FROM bawarchi where item_name LIKE '$ustring' OR description LIKE '$ustring'";
            $qry = $con->prepare($sql);
$qry -> execute();
 while($result = $qry->fetch()){

  $u1=new products($result['sl']);
                                  ?>
<li class='' style='  height:57px;text-align:left;
    font-size: 12px; ' >
<a href="javascript:void(0)" onclick="add_to_cart('<?php echo $u1->productid;?>')" style="color: #887777;
    font-size: 41px;">
<?php echo $u1->title; ?>
  <img src="icon/dish1.jpeg" width="43">
</a>
<p style="font-size:12px;color:brown"><?php echo $u1->description?></p><br>
</li>
                                  <?php
                               }
 
}
