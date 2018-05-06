<?php
include_once "db-connection.php";
include_once "customer-class.php";
/*== ======================== product class starts here ============================================================================== */
function restaurant_menu(){
            	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select sl from bawarchi";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	       array_push($arr1,$row);
				                                               }

				                                         return $arr1;

}

function return_trending($count=13){
            	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="SELECT sl from bawarchi ORDER BY click_count desc LIMIT 0,20";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	       array_push($arr1,$row);
				                                               }
				                                         return $arr1; 
}
function restaurant_menu_sorted($cat){
            	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select sl from bawarchi where cat_name='$cat'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	       array_push($arr1,$row);
				                                               }
				                                         return $arr1; 
}
function return_title_from_sku($id){

$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select item_name from bawarchi where sl='$id'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	     $title=$row['item_name'];
				                                               }

				                                         return $title;



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
		$this->id=$productid;
		// allot the products value 
		$this->product_data();
		//$this->load_product_frontends();

	}
}
	
	               function product_data(){
	               	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
				 	 $code=$this->productid;
        			 $cmd="select * from bawarchi where sl='$this->productid'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	                      array_push($arr1,$row);
				                                               }
					                   $this->title=$arr1[0]['item_name'];
					                   $this->title_short=substr($arr1[0]['item_name'],0,30).' ...';
					                   $this->category=$arr1[0]['cat_name'];
					                   $this->available=$arr1[0]['status'];
					                   $this->selling_price=$arr1[0]['rate'];
					                   $this->last_modified=$arr1[0]['last_updated'];
					                   $this->click_count=$arr1[0]['click_count'];
					                   $this->selling_price_formatted='&#8377;'.$arr1[0]['rate'];
					                   if($arr1[0]['veg'])
					                   	$this->food_type='veg';
					                   else
					                   	$this->food_type='non-veg';
					           			$this->enabled=1;
					           			if(!$arr1[0]['status'])
					           				$this->enabled=0;
					                   $this->description=$arr1[0]['description'];
									
                              }


                                function product_gallery($pics){
                                	$this->all_pics=explode(',',$pics);
                                	$this->title_pic=explode(',',$pics)[0];
                                	$this->hover_pic=explode(',',$pics)[1];
                                	$this->favicon='img/'.$this->title_pic;
                                	$this->routed_title_pic='img/'.$this->title_pic;
                                }

	        }

	        class similar_products extends products{

	        		function __construct($type){
	        			$this->type=$type;
	        			$this->fetch_similar_skus();
	        		                           }
// This function will return sorted rows in randpom order (such that each time the similar skus are different )
	        					function fetch_similar_skus(){
	        							$d1=new dbconn();
					$arr3=array();
	               	$db=$d1->connect();
	        						$cmd="select code as codes from products where cat1='$this->type'";
	        						$result=$db->query($cmd);
	        						 while($row = $result->fetch()){ 
				                   	                      				array_push($arr3,$row);
				                                                   }
				                                   return $arr3;

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