<?php 
include('../db.php');

			if(isset($_POST['submit_user']))
			{
   
         $title=$_POST['title'];
         $company=$_POST['company'];
      $link=$_POST['videourl'];
//==== link reader here 
  $link1=$_POST['videourl'];

$username=substr($link1, strpos($link1,"=") + 1); 

$username=str_replace('%20', ' ', $username);



date_default_timezone_set("Asia/Calcutta");
$time=date('y/m/d h:i:s');
$cmd="INSERT INTO `tod_portifolio`(`sl`, `title`, `category`, `link`, `pic`, `company`, `uploadedon`) VALUES ('','$title','animations','$username','','$company','$time')";
$result=mysql_query($cmd);

			}




?>



<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
 <head>
  <title> TOD uploader</title>
  <script src="jquery-1.7.1.min.js"></script>
  <script src="filereader.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
 function addcomments()
        {
     
$('#loadingmessage').show();
var title = $("#title").val();
var videourl= $("#videourl").val();
var company = $("#company").val();


// AJAX Code To Submit Form.
var dataString ='title='+title+'&videourl='+videourl+'&company='+company+'&submit_user='+1;

// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "uploadanimation.php",
data: dataString,
cache: false,
success: function(result){


$('#loadingmessage').hide();


alert('succcessss');

}
});

return false;
}


</script>

 </head>
 <body>


<div style='position:fixed;margin-top:12vw;margin-left:47vw;z-index:33;display:none' id='loadermsg'>
<img src='../images/loader.gif'>

</div>
  <header style='    background: maroon;
    width: 100%;
    color: white;
    text-transform: uppercase;
    height: 89px;
    font-size: 25px;
    padding: 22px;'>TOD-Portifolio Upload Panel !</header>
<div class="container" style='    width: 100%;padding-left:12vw;    background: url(../img/portfolio_bg.jpg);'>

  <form role="form" action='#' method='post' style='margin-top:40px;max-width:450px;'>
    <div class="form-group">
      <label for="email" style='color:white'>video  title (appearing just below the video ):</label>
      <input type="text" class="form-control" name='title' id="title" placeholder="Enter title of the video">
    </div>

      <div class="form-group">
      <label for="email" style='color:white'>For what company this video was designed for:</label>
      <input type="text" class="form-control" name='company' id="company" placeholder="Enter company name">
    </div>




  <div class="form-group">
      <label for="email" style='color:white'>Video Url link (From youtube.com ):</label>
      <input type="text" class="form-control" name='videourl' id="videourl" placeholder="Enter video link of youtube">
    </div>
    




    <a href='#' id='add_comments' onclick="addcomments()" style='    background: orange;
    color: white;width:200px;height:34px;    margin-bottom: 30px;
    border-radius: 0px;' class="btn btn-default" >SUBMIT</a>
  </form>




	<script>
     

  function rotate()
  {

 //adding the logo animation

var angle=0;
  var $elem = $('#mask2');

    // we use a pseudo object for the animation
    // (starts from `0` to `angle`), you can name it as you want
    $({deg:0}).animate({deg: angle}, {
        duration: 900,
        step: function(now) {
            // in the step-callback (that is fired each step of the animation),
            // you can use the `now` paramter which contains the current
            // animation-position (`0` up to `angle`)
            $elem.css({
                transform: 'rotate(' + now + 'deg)'
            });

  }}

   


</script>
  </body>
</html>