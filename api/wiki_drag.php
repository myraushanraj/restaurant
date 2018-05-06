<?php 
// drag the food item from wikipedia listing 
include "../class/db-connection.php";

include "simple_html_dom.php";

// Create DOM from URL or file
$domain="https://en.wikipedia.org/wiki/List_of_Indian_dishes";
//$domain="https://www.theguardian.com";
$home_code=file_get_html($domain);

//$home_code = $home_code->plaintext;
// step 1: fnd the url related to blog (search for blog keyword here )
//echo '<span style="color:blue">'.$home_code.'</span>';
foreach ($home_code->find('tr') as $search){
echo "<br>==========================";

// step 2: check all links and find where blog is there 
echo "tr is ".$search;
			foreach ($search->find('td') as $searchtr){
					echo '<br>';
					echo 'td is '.$searchtr;



// save the datta in useful form 
			$item=$search->find('td')[0];

			$pic_link=$search->find('td')[1];
			
			$description=$search->find('td')[2];

			$food_type=$search->find('td')[3];
					// pass the comment to save it in database 
// remove the element searchged for in html formnat 


$item=str_replace('<td>','',$item);
$food_type=str_replace('<td>','',$food_type);
$description=str_replace('<td>','',$description);
$pic_link=str_replace('<td>','',$pic_link);

$item=str_replace('</td>','',$item);
$food_type=str_replace('</td>','',$food_type);
$description=str_replace('</td>','',$description);
$pic_link=str_replace('</td>','',$pic_link);

if(substr($item,0,-(strlen($item)-1))!='<')
{
	
	// loop to avoid bekar ka values 
  $d1=new dbconn();$arr1=array();
               $db=$d1->connect();
               $cmd="INSERT INTO food_drag_data (item,food_type,pic_link,description) values ('$item','$food_type','$pic_link','$description')";

$result=$db->query($cmd);

}


			}




                  }


/*
// Find all images 
foreach($html->find("div#uk-nav-sub ul li a ") as $element) 
       echo $element->src . '<br>';

// Find all links 
foreach($html->find('a') as $element) 
       echo $element->href . '<br>';

       */

?>