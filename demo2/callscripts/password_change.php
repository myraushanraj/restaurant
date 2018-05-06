<?php include_once "../inc/all_class.php";

if(isset($_GET['change_pass_final']))
{
           $d1=new dbconn();
           $db=$d1->connect();
           $password=($_GET['change_pass_final']);
           $email=$_SESSION['ecemail'];
           $cmd="update customer set password='$password' where email='$email'";
           $qry=$db->query($cmd);
              if($qry)
              {
              echo '1';
              }
              else{
                   echo '0';
                  }
}


if(isset($_GET['check_password']))
{
$d1=new dbconn();
$db=$d1->connect();
$email=$_SESSION['ecemail'];
 $check_password=($_GET['check_password']);
$cmd="SELECT * from `customer` where email='$email' and password='$check_password'";
$result=$db->query($cmd);
$c=$result->rowCount();
if($c>=1)
{
$found=1;
echo '1';
}
else{
$found=0;
echo '0';
}

}


if(isset($_GET['load_pass_change_option']))
{
  ?>

<style type="text/css">
input,textarea [type='password'] {
      background: #599217 !important;
    color: white;
    outline: none !important;
    border: none !important;
    margin-top: 11px;
    border-bottom: 1px solid white !important;
}

.bac1{
  width: 200px;
    color: white;
    border: 2px solid white;
    padding: 12px;

}
</style>
<form role="form" style='width:50%;margin-left:10%;margin-bottom:100px;    min-height: 196px;'>
    <div class="form-group">

      <span id='txtHint2' style='    color: #D82A00;
    text-align: center;
    font-family: helvetica;
    font-size: 10px;
    text-transform: capitalize;
    '></span>
     
      <input type="password" id='oldpass' class="form-control"   id="email" placeholder="Enter old password">
     <input type="password" id='newpass' class="form-control"  style='display:none'  id="email" placeholder="Enter new password">


    </div>
    

  <a href='javascript:void(0)' onclick="
var t=document.getElementById('oldpass').value;check_password(t);
"  style='display:none2;padding:6px' class='bac1' id="verify_pass_link">Verify and proceed
</a>


<a href='javascript:void(0)' onclick="var p=document.getElementById('newpass').value;
change_new_password(p);
"  class="btn btn-info btn-lg bac1" style='display:none' id="submit_newpass_link">update password</a>
  </form> 

  <?php 
}