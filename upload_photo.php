<?php
include_once('inc/functionstat.php');
$title=$_POST['title'];
$category=$_POST['category'];
$option=$_POST['option'];


$user_id=$_SESSION["s_no"];
$place="india";
$keyword="india,win,today";
$connn->newPoll($title,$user_id,$place,$keyword,$category);
$max_poll_id=$connn->maxIdOfPoll();

for ($j=0; $j < sizeof($option); $j++) { 
$connn->newPoll_option($max_poll_id[0]['MAX(poll_id)'],$option[$j]);
}

// get the tmp url
$photo_src = $_FILES['photo']['tmp_name'];
// test if the photo realy exists
if (is_file($photo_src)) {
	// photo path in our example
	$photo_dest = 'images/photo_'.time().'.jpg';
	$file_type="png";
$connn->image_insert($max_poll_id[0]['MAX(poll_id)'],$photo_dest,$file_type,$user_id);
	// copy the photo from the tmp path to our path
	copy($photo_src, $photo_dest);
	// call the show_popup_crop function in JavaScript to display the crop popup
	echo '<script type="text/javascript">window.top.window.show_popup_crop("'.$photo_dest.'")</script>';
}
?>