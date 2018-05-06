<?php 
include_once "../class/product_class.php";
if(isset($_GET['load_user_profiles']))
{

  $username=$_GET['load_user_profiles'];
  $arr1=array();
      $obj1=new dbconn();
      $ustring='%'.$username.'%';
            $con=$obj1->connect();
          $sql="SELECT * FROM products where title LIKE '$ustring' and isdelete='0'";
            $qry = $con->prepare($sql);
$qry -> execute();
 while($result = $qry->fetch()){

  $u1=new products($result['code']);
                                  ?>
<li class='' style='  height:57px;text-align:left;
    font-size: 12px;    max-width: 28ch; ' >
<a href='<?php echo $u1->pagelink?>' style='    color:inherit;
    font-size: 12px;'>
<img class='round-img' style='    width: 40px;
    border-radius: 50%;
    /* border: 2px solid #e49806; */
    height: 40px;
    margin-right: 40px;
' src="img/<?php echo $u1->title_pic;?>"
 >
  <p style='     text-align: left;
    font-size: 12px;
    /* max-width: 29ch; */
    /* display: inline; */
    max-width: 28ch;
    margin-left:34%;
    margin-top: -42px;
    /* float: right; */
    /* background: red; */
    width: 211px;'><?php echo $u1->title; ?></p></a></li>
                                  <?php
                               }
 
}
