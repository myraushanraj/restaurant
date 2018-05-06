<?php include_once '../class/db-connection.php';?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
 <head>
  <title>Uploader</title>
  <script src="jquery-1.7.1.min.js"></script>
  <script src="filereader.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 </head>
 <body>
<?php 
$_SESSION['groupset']=$_GET['imagefor'];
?>
<div style='position:fixed;margin-top:12vw;margin-left:47vw;z-index:33;display:none' id='loadermsg'>
<img src='../images/loader1.gif'>

</div>
  <header style='    background:white;
    width: 100%;
    color: white;border-bottom:2px groove grey;
    text-transform: uppercase;
    height: 89px;
    font-size: 25px;
    padding: 22px;'> </header>
<div class="container" style='    width: 100%;padding-left:12vw;    background: url(../img/portfolio_bg.jpg);'>


<?php echo 'session  is '.$_SESSION['groupset'];?>


	<div id="dropbox" style='border:black 2px groove;height:200px'>


		<div class="text">
			Drop Images Here (only jpeg)
		</div>
	</div>
	<span class="upload-progress"></span>

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