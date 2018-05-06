<?php
require_once "db-connection.php";


/* class : for front end includes 
/* author : chandan jha 
createiond date : 23 march 
last modifies : 23 march 2017
*/
function signoutuser(){

	unset($_SESSION['ecmemberid']);
	?>
<script>
window.location='index.php';
</script>
	<?php
}

function send_message($content1,$triggered_from,$triggered_to,$attach_mail,$msg_subject){
   	    $d1=new dbconn();
	   	$db=$d1->connect();
    // set the PDO error mode to exception
	   	date_default_timezone_set("Asia/calcutta");
    $timings1=date('Y-m-d H:i:s');
    $qry=$db->prepare("INSERT INTO `message_history`(`message_content`, `timings`, `triggered_from`, `member_id`,`attach_mail`,`msg_subject`) VALUES (:content1,'$timings1','$triggered_from', '$triggered_to','$attach_mail',:msg_subject);");
    $qry->execute(array(':content1'=>$content1,':msg_subject'=>$msg_subject));

    			if($attach_mail)
    			{
    					$member1=new member($triggered_to);
    					$member2=new member($triggered_from);
    				// loop for sendimg mail via SMTP 
    					$m1=new misc();
    					$description='You have a new message from '.$member2->name.' ('.$member2->id.')'.'He says :'.$content1;
    					$link='http://monkhub.com/team/index.php?loggedone='.$member1->email;
    					$link_name='REPLY HIM';
    					$m1->memberEmail($member1->email,'New Message from Monkhub',$description,$link,$link_name);
    			}


                      }

function view_all_group(){
	 	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="SELECT * from `group` ORDER BY group_id DESC";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
                                   		array_push($arr1,$row);
				                   	                    	   }
				                   	                    	   return $arr1;
}
	function redirectadmin(){
if(!isset($_SESSION['ecmemberid']))
{
?>
<script>
window.location='index.php';
</script>
	<?php }
}
function view_all_members(){

			   	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select * from organisation_team";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
                                   		array_push($arr1,$row);
				                   	                    	   }
				                   	                    	   return $arr1;

}





function get_pic($pic)
{
	if(!empty(explode('/',$pic)[1]))
		return $pic;
	else
		return 'member-pics/unknown1.png';
}



             function get_present_time()
{

			date_default_timezone_set("Asia/Calcutta");
				                          $timenow=date('Y-m-d H:i:s');	
				                          return $timenow;


}

class misc{




function memberEmail($to_mail,$subject,$description,$link,$link_name){
$to = $to_mail;
$subject = $subject;
$message = "
<html>
<head>
<title>Monkhub</title>
</head>
<body style='border: 3px dotted rgb(3, 169, 244);
    background: white;
    height: 200px;
    padding: 35px;
    font-size: 14px;
    color: #635f5f;
    font-family: helvetica;'>
<h3 style='text-align:center;'>Monkhub Workforce</h3>
<table>
<tr><td><td><img src='http://monkhub.com/team/images/logo1.png' width='140'></td></tr>

<tr>

<th>".$description."</th>

<th></th>

</tr>

<tr>



<td style='text-align: center;height:109px;'><span><a href='".$link."' target='_blank' style='background: #03A9F4;padding-left:40px;;padding:10px;

    color: white;border-radius:4px;text-transform:uppercase;padding-right:40px;font-size:14px;

    text-decoration: none;'>".$link_name."</a></span></td>

</tr>
<tr><td>Sent at : ".time('y-m-d h-i')."</td></tr>
</table>

</body>

</html>

";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From:infor@monkhub.com' . "\r\n";
$headers .= 'Cc:infor@monkhub.com' . "\r\n";
mail($to,$subject,$message,$headers);
 }  

function return_timespan($from_time){
date_default_timezone_set("Asia/calcutta");
$from_time = strtotime(date($from_time));
$to_time =strtotime(date('Y-m-d H:i:s'));
//$from_time = strtotime(date("2017-3-20 09:19:00"));
$minutes=round(abs($to_time - $from_time) / 60,2);
$hours=$minutes/60;
$days=$hours/24;
$years=$days/365;
//echo date("H:i:s");
//===================                        
$final_minutes=((($minutes%(60))%24)%365);
$final_hours=(($hours)%24);
$final_days=($days%24);
//============
$return_string='';
if((round($years)>0))
{
     $return_string.=round($years).' years ';
}
if($final_days>0)
$return_string.=$final_days.' days ';
if($final_hours>0 && ($final_days<=1))
$return_string.=$final_hours.' hours ';
if($final_minutes>=0  && ($final_hours<=1))
$return_string.=$final_minutes.' mins ';
$return_string=ltrim($return_string);
$return_string=rtrim($return_string);
if($return_string=='ago')
{
return 'just now ';

}else
{
return $return_string.' ago';
}			                  }

function return_members_profile_pic($id){
	$dir='member-pics/';
				   	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select profile_pic from organisation_team where member_id='$id'";
				     $result=$db->query($cmd);
                                     while($row=$result->fetch()){ 
				                   	                   $pic1=$dir.$row['profile_pic'];
				                   	          }
				                   	          return $pic1;

}
	function show_faces($id_string){
echo "<ul type='none'>";
$new_span='';
		$profile_arr=explode('$$',$id_string);
		for($t=0;$t<sizeof($profile_arr);$t++)
		 {
		 	if(empty($profile_arr[$t]))
		 		return;
		$image_new=get_pic($this->return_members_profile_pic($profile_arr[$t]));
		?>
		<li style='display:inline-block'>
		<img onmouseout='remove_hover_element()' 
			onmouseover="load_hover_profile(event,'<?php echo $profile_arr[$t];?>')" src="<?php echo $image_new ?>"
			style='width:30px;border-radius:50%' ></li>
			<?php
	     }
		echo $new_span;

	     echo "</ul>";

	}


	function show_project_faces($id_string){
echo "<ul type='none'>";
$new_span='';
		$profile_arr=explode('$$',$id_string);
		for($t=0;$t<sizeof($profile_arr);$t++)
		 {

		 	if(empty($profile_arr[$t]))
		 		return;
		 	$ms=new member($profile_arr[$t]);
		$image_new=get_pic($this->return_members_profile_pic($profile_arr[$t]));

	     	     // =================== Formatted css for team persons
?>

                                    <div class="list-group" style="margin-bottom: 0px">
                                        <a class="list-group-item media" href="">
                                             <div class="pull-left">
                                                <img class="lg-item-img" src="<?php echo $image_new ?>" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                  <div class="lg-item-heading pull-right"><?php echo $ms->name?></div>
                                                  <small class="lg-item-text pull-right">
                                                  	<?php echo $ms->email?>
                                                  </small>
                                                </div>
                                                <div class="pull-right">
                                                  <div class="lg-item-heading pull-right"><?php echo $ms->designation?></div>
                                                </div>
                                            </div>
                                        </a>
                                      
                                       
                                        
                                    </div>
                            
                                <?php
                                	}
	}


/* this will show the project timeline on any moment in graphical form */
function show_project_timeline($project_id){

$pr=new project($project_id);
$work_arr=$pr->current_timeline($project_id);
for($t=0;$t<sizeof($work_arr);$t++){
$task1=new task($work_arr[$t]['w_id']);
$mb1=new member($task1->alloted_by);
$mb2=new member($task1->alloted_to);
// show the csss view for the resulting timeline 
?>

<div class="sl-item sl-primary">
                                  <div class="sl-content">
                                           <small class="text-muted"><?php echo $this->return_timespan($task1->starts_at);?></small>
                                         <p><?php echo $task1->title?></p>
                                   </div>
</div>



<?php 
}
?>
<a href="all-task.php?projectid=<?php echo $project_id;?>" style="color:red">All activities</a>
<?php 
}

function menu_item_formatted($menu_list){
 echo "<ul>";
$all_item=explode(',', $menu_list);
for ($i=0; $i < sizeof($all_item)-1; $i++) { 
	# code...
$one_item=explode('-', $all_item[$i]);
$item_name=$one_item[0];
$qty=$one_item[1];
echo "<li>".$qty.'- '.$item_name."</li>";
}
echo "</ul>";


}




}
	?>
 
