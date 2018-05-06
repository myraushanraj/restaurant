<?php include_once "../inc/all_class.php";
if(isset($_GET['load_user_profiles']))
{

  $email=$_SESSION['ecemail'];
  $user1=new customer($email);
  ?>
<style type="text/css">
input,textarea {
      background: #599217;
    color: white;
    outline: none;
    border: none;
    margin-top: 11px;
    border-bottom: 1px solid white;
}
</style>
          <div class="form">
          <h5 style='color:white'>MY PROFILE</h5>
          <form action="#" method="post">
            <input name="name" type="text"  value='<?php echo $user1->name;?>' placeholder="Username" required=" "><br>
            <input type="email" name="password" value='<?php echo $user1->password;?>' placeholder="Password" required=" "><br>


            <input name="phone" type="text"  value='<?php echo $user1->phone;?>' placeholder="phone" required=" "><br>
            <textarea name="address" placeholder="address" required=" ">
<?php echo $user1->address;?>
            </textarea><br>

            <input type="submit" name='submit_login' value="UPDATE" style='width: 200px;
    color: white;
    border: 2px solid white;
    padding: 12px;'>
          </form>
          </div>


                       <?php      
                               }
                        ?>

