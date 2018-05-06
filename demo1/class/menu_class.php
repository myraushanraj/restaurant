<?php
include_once "db_class.php";

/*== ======================== product class starts here ============================================================================== */
function restaurant_menu_picced($cat){
            	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select sl from bawarchi where status='1' and cat_name='$cat' and pic is not NULL";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	       array_push($arr1,$row);
				                                               }

				                                         return $arr1;

}
function restaurant_menu_unpicced($cat){
            	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select sl from bawarchi where status='1' and cat_name='$cat' and pic is NULL";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	       array_push($arr1,$row);
				                                               }

				                                         return $arr1;

}

class products{

var $productid;
var $title;
var $available;
var $sellingprice;
var $mrp;
var $story;
var $titlepic1;
var $titlepic2;
var $titlepic3;
var $instock;
var $pics_arr;
var $titlepic;
var $material;
var $dimension;

// ================= scientfic names to be adde  for each plants 
var $scientfic;
function __construct($productid)
{		if(!empty($productid))
		{
		$this->productid=$productid;
		// allot the products value 
		$this->product_data();

		//$this->load_product_frontends();

	}
}
	
	               function product_data(){
	               	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
				 	 $code=$this->productid;
        			 $cmd="SELECT * from bawarchi where sl='$this->productid' AND status='1'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	                      array_push($arr1,$row);
				                                               }
					                   $this->title=$arr1[0]['item_name'];
					                   $this->title_pic=$arr1[0]['pic'];
					                   $this->title_short=substr($arr1[0]['item_name'],0,30).' ...';
					                   $this->available=$arr1[0]['status'];
					                   $this->is_veg=$arr1[0]['veg'];
					                   $this->selling_price=$arr1[0]['rate'];
					                   $this->selling_price_formatted='&#8377;'.$arr1[0]['rate'];
					           
					                   $this->description='Some delocopius will be cooked !';
									
                              }


                                function product_gallery($pics){
   
                                	$this->title_pic=explode(',',$pics)[0];
              
                                }

	        }


/* =================== class review will be Defined  for one of the product with product Id  */
class reviews{

var $email;
var $reviews;
var $productid;
var $title;
var $timings;

function __construct($productid){
$this->productid=$productid;
$this->table='product_reviews';
			}
				function fetch_all_reviews(){
					$d1=new dbconn();
					$arr1=array();
	               	$db=$d1->connect();
				 
        			 $cmd="select * from $this->table where productid='$this->productid'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	                      array_push($arr1,$row);
				                                                }

				                                                return $arr1;
                                             }
function check_user_reviewed_product(){
	                 $d1=new dbconn();
					$arr1=array();
	               	$db=$d1->connect();
			        $email=$_SESSION['ecemail'];
  			        $cmd="select productid from $this->table where username='$email'";
			        $result=$db->query($cmd);
                    while($row=$result->fetch()){ 
				                   	        array_push($arr1,$row);
				                         }
				                          if(in_array(($this->productid),$arr1))
				                          	return 1;
				                          else
				                          	return 0;
                                    }

						function add_new_review($review_content,$rating){
							$d1=new dbconn();
                            $db=$d1->connect();
							// step 1: chec if user has already reviewed or not 
				            $user_reviewed_already=$this->check_user_reviewed_product();
				             if(!$user_reviewed_already)
				         	{
				         		$username=$_SESSION['ecemail'];
				         		// add this new entry to the product_reviews table 
				         		$cmd="INSERT into product_reviews(reviews,productid,rating,username) values ('$review_content','$this->productid','$rating','$username')";
				         		$result=$db->query($cmd);

				         		// cehck if user has given rating then update the average rating fort thiks prodiycr 
				         		$this->update_rating();

				         	}

				         }

				         	function update_rating(){


				         	// step 1: get the all listof rating for this product and calculate this average rating
	                        $d1=new dbconn();
                            $db=$d1->connect();

				         		$cmd="SELECT AVG(rating) as rating1 from `$this->table`  where productid='$this->productid'";
				         		$result=$db->query($cmd);
				         		while($row=$result->fetch()){ 
				                   	       $sum1=$row['rating1'];
				                         }
				                      
				                       // step 2: now update this avaerage rating to the products table 
				                       $cmd="UPDATE products set rating='$sum1' where code='$this->productid'";
				                       $result=$result=$db->query($cmd);


				         	}

						}


/*= ========================= product class ends here ============================================================================= */
?>