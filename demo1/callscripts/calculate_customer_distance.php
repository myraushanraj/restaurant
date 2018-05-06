<?php include_once "../class/food_category_class.php";

if(isset($_GET['calculate_now']))
{
/*
$set=new rest_setup('bawarchi');
$latitude=$_GET['latitude'];
$longitude=$_GET['longitude'];
// calculate the distance now
echo 'You are '.distance($latitude,$longitude,$set->latitude,$set->longitude,"K")." kms away from ".$set->id;
//


if (distance($latitude,$longitude,$set->latitude,$set->longitude,"K")> $set->range) {
  # code...
echo "Sorry de;levery allowed till ".$set->range;

}else{

  echo "Congratulations we can server you with our speed delivery ";
}
*/


$_SESSION['user_address']=$_GET['address'];

}

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}



/* inavalid for now =======================================
echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";


*/

?>