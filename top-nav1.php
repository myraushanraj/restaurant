<?php require_once "class/db-connection.php";
require_once "class/notification-class.php";
require_once "class/misc-class.php";
if(!isset($_SESSION['admin_logged'])){
	?>
<script>
	window.location='user-login.php';
</script>
	<?php
}
if(isset($_GET['logout'])){
unset($_SESSION['admin_logged']);?>
<script>
	window.location="index.php";
</script>
	<?php
}
$m1=new misc();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Monkhub Restaurant Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link rel="stylesheet" href="css/table-style.css" type="text/css"/>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link rel="stylesheet" href="css/mystyle.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<!-- lined-icons -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand|Raleway" rel="stylesheet">

<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>

<style type="text/css">
	table{
		overflow: scroll !important;
	}
.user_content a{
	color: gray;
}	

</style>
				<script>
function load_notification_text(link)
{ 
var xmlhttp;   
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   
document.getElementById("show_notification_body").style.display='block';
document.getElementById("show_notification_body").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",'admin-scripts/'+link,true);
xmlhttp.send();
}


</script>
<div class="modal fade" id="show_notification" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Notification confirmations </h4>
        </div>
        <div class="modal-body" id='show_notification_body'>
        </div>
      </div>
   </div>
</div>
   <div class="container">
   <!--/content-inner-->
<div class="">
	   <div class="">
             <!--header start here-->
				<div class="header-main" style="display: none">
					<div class="logo-w3-agile">
					
                <p><a href="index.php" style="color: white;
    font-weight: 800;
    float: left;
    line-height: 40px;
    margin-left: 2%;">Dashboard</a></p>
            
							</div>
		<?php 
					$notify=new admin_notifications();
					$notify_arr=$notify->all_data();
		?>				
						 <div class="w3layouts-right" >
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown" style="float:right">
									
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;
    font-size: 1em;
    color: #fff;
    line-height: 1em;
    font-weight: 700;"aria-expanded="false"><img src="icon/language.png" style="width: 40px;
                                                height: 40px;">English &nbsp;v</a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>choose your language</h3>
												</div>
											</li>
											<li><a href="#">
												<div class="user_img"><img src="icon/in.png" alt=""></div>
											   <div class="notification_desc">
												<p>Hindi</p>
												</div>
											  <div class="clearfix"></div>	
											 </a></li>

											<li><a href="#">
												<div class="user_img"><img src="icon/cn.png" alt=""></div>
											   <div class="notification_desc">
												<p>Chinese</p>
												</div>
											  <div class="clearfix"></div>	
											 </a></li>

											<li><a href="#">
												<div class="user_img"><img src="icon/sa.png" alt=""></div>
											   <div class="notification_desc">
												<p>Arabic</p>
												</div>
											  <div class="clearfix"></div>	
											 </a></li>
											 
										</ul>
									</li>
                                            <li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><img src="icon/bell.png" style="width: 40px;
                                                height: 40px;"><span class="badge blue"><?php echo sizeof($notify_arr)?></span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have <?php echo $notify->unread;?> new notification</h3>
												</div>
											</li>
											<?php for($y=sizeof($notify_arr)-1;$y>sizeof($notify_arr)-6;$y--)
											{ ?>
 											<li>
												<a href="javascript:void(0)" data-target='#show_notification' data-toggle='modal' onclick="load_notification_text('<?php echo $notify_arr[$y]['link1'];?>')">
												<div class="user_img"><img width='36' src="../profile-pics/chandan7.jpg" alt=""></div>
											     <div class="notification_desc">
												<p><?php echo $notify_arr[$y]['notification'];?></p>
												<p><span><?php echo $m1->return_timespan($notify_arr[$y]['timings']); ?></span></p>
												</div>
											  <div class="clearfix"></div>	
											 </a></li>
											<?php  } ?>
										</ul>
									</li>	
									<div class="clearfix"> </div>
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							
							<div class="clearfix"> </div>				
						</div>
						<div class="profile_details w3l">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="profile-pic/<?php echo $_SESSION['adminpic']?>" alt="monkhub-admin-user"> </span> 
												<div class="user-name">
													<p><?php echo $_SESSION['adminname']?></p>
													
												</div>
												
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
											<li> <a href="?logout=1"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							
				     <div class="clearfix"> </div>	
				</div>
				<div class="top_header" style="padding: 10px">
 <span><img src="icon/eatnarylogo.png" style="width: 100px"></span>
  <div class="user_content" style="    float: right;
    margin-right: 20px;margin-top: 8px"><a><img src="icon/chef.svg" style="width: 23px;"><?php echo " ".$_SESSION['adminname']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?logout=1"><img src="icon/logout.svg" style="width: 18px"> Logout</a></div>
</div>
				<?php require_once "admin-inc/admin_pops.php";?>