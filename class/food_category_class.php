<?php
include_once "db-connection.php";
/*== ======================== product class starts here ============================================================================== */

class rest_setup{

function __construct($id){
$this->id=$id;
$this->all_data();
}


function restaurant_food_category(){
            	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select * from all_category where status='1' and rest_name='$this->id'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	       array_push($arr1,$row);
				                                               }

				                                         return $arr1;

}
function all_data(){
            	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="SELECT * from rest_details where rest_name='$this->id'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	       array_push($arr1,$row);
				                                               }
				                    // allot the restaurant varaiables now 

				          $this->opens=$arr1[0]['otime'];
				          $this->closes=$arr1[0]['ctime'];
				          $this->address=$arr1[0]['address'];
				          $this->min_order=$arr1[0]['minmorder'];
				          $this->range=$arr1[0]['deliveryrange'];
				          $this->latitude=$arr1[0]['latitude'];
				          $this->longitude=$arr1[0]['longitude'];


}





}

?>