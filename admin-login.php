<?php 
include('class/all-class.php');

if(isset($_POST['submitadmin']))
{
   $username=$_POST['username'];
   $password=$_POST['password'];      
   $err=login_profiles($username,$password);
}




?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin </title>

    <link rel="shortcut icon" href="favicon.ico" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body style="
    /* background: linear-gradient(to top, #ff1e1e , #ffffff); */
    color: white;
    padding-top: 5em;
    font-size: 21px;
    ">

    
            <section style=" 
">


                     <center>
                      <h2 style="color:white">Restaurant store authenciation</h2><br>
<img src="https://b.zmtcdn.com/images/logo/zomato_logo.svg" width=" 200" style="
    width: 84px;margin-bottom: 70px;
"><br>
                            <form action="#" method="post">
<?php 
if(isset($err))
{

  echo "<span style='color:red'>Invalid username/ password</span><br>";
}


?>


                                        <input type="text" placeholder="Username " style="    width: 320px;color:maroon;
    height: 35px;    width: 320px !important;
    text-align: center;" name="username" required> <br><br>
                                         <input type="password" placeholder="password" style="    width: 320px;
    height: 35px;    width: 320px !important;color:maroon;
    text-align: center;" name="password" required> <br><br>

<input type="submit" class="btn btn-primary" style="
        background: #cb202d;
    border: none;
    height: 52px;
    border: 2px solid #cb202d;
    color: #ffffff;
    font-style: italic;
    /* text-transform: uppercase; */
    font-size: 19px;
    font-weight: bold;
    " name="submitadmin" value="authenciate me "> 


                            </form>




                     </center>      


            </section>      




<!-- ==========  login popup scetion ends here ============================ -->



    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   <script type="text/javascript">


                      function closeallpopup()
{

   document.getElementById('allcustomers').style.display='none';
    document.getElementById('editupdatecustomer').style.display='none';

    document.getElementById('blockcustomer').style.display='none';
    
        document.getElementById('notifycustomer').style.display='none';


}

   </script>
</body>
</html>
