<?php 


// test ditance from my sultanpurmetro  place tpo govindpuri pooja masala center 


//lat 1 :28.5326742,77.2570893
//lat2 : 28.5576925,77.1949353


$lat1=28.4968477;
$lon1=77.1608582;
$lat2=28.4979584;
$lon2=77.1596063;
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

echo distance($lat1, $lon1, $lat2, $lon2, "K") . " kms.<br>";


/* inavalid for now =======================================
echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";


*/

?>