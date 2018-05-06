<?php 
include_once "db_class.php";
 /// ======================================================================= 
/*== ======================== product class customer here ============================================================================== */
class customer{

var $name;
var $email;
var $phone;
var $address;
var $password;
var $registration_date;
						function __construct($email){
							$this->email=$email;
							$this->profile_data();
							$this->order_data();
						}
function add_wishlist($productid){

                $obj=new dbconn;
			    $con=$obj->connect();
	// step 1:  increment thw wishlist  followers count 
        						 $sql="update customer set wishlist_count=wishlist_count+1 where email=:email";
                                         $qry = $con->prepare($sql);
                                           $qry -> execute(array(
                                           	':email'=>$this->email,
                                           	));
		   // step 4:  add the productid to the wishlist 
                          $sql="update customer set wishlist=CONCAT('$productid','$$$',wishlist) where email=:email";
                                         $qry = $con->prepare($sql);
                                           $qry -> execute(array(
                                           	':email'=>$this->email,
                                           	));

}


function remove_wishlist($id){

                $obj=new dbconn;
			    $con=$obj->connect();
	// step 1:  increment thw wishlist  followers count 
        						 $sql="update customer set wishlist_count=wishlist_count-1 where email=:email";
                                         $qry = $con->prepare($sql);
                                           $qry -> execute(array(
                                           	':email'=>$this->email,
                                           	));
		   // step 2:  Remove the Product id from the old wishlist 

                                           $oldwisharr=$this->return_wishlist();
                                           for($r=0;$r<sizeof($oldwisharr);$r++)
                                           {
                                           	if($oldwisharr[$r]==$id)
                                           	{
                                           		unset($oldwisharr[$r]);
                                           	}

                                           }
                                      $newwisharr=implode('$$$',$oldwisharr);

               // step 3: Update the value again ======================
                                      
        						 $sql="update customer set wishlist='$newwisharr' where email='$this->email'";
                                         $qry = $con->query($sql);

}
	               function order_data(){
	               	$email=$this->email;$arr5=array();
	               	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();
        			 $cmd="select * from my_orders where customer_email='$email'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	                     array_push($arr5,$row);
				                                                }
				                                                if(sizeof($arr5)>0)
				                                                {
					                                              $this->total_orders=sizeof($arr5);
					                                              $this->last_order=$arr5[0]['order_time'];
					                                              
					                                            }else
					                                            $this->total_orders=0;
					    			

                                        }

                                function fetch_order_string(){
                                	$d1=new dbconn();
                                    $db=$d1->connect();$arr1=array();
        			                $cmd="select * from my_orders where customer_email='$this->email'";
				                    $result=$db->query($cmd);
                                     while($row=$result->fetch()){ 
				                   	                      array_push($arr1,$row);
				                                                }
				                                  return $arr1;
                                }

	               function profile_data(){
	               	$email=$this->email;
	               	$d1=new dbconn();$arr1=array();
	               	$db=$d1->connect();$arr1=array();
        			 $cmd="select * from customer where email='$email'";
				     $result=$db->query($cmd);
                                   while($row=$result->fetch()){ 
				                   	                      array_push($arr1,$row);
				                                                }
					                   $this->name=$arr1[0]['name'];
					                   $this->email=$arr1[0]['email'];
					                   $this->address=$arr1[0]['address'];
					                   $this->phone=$arr1[0]['phone'];
					                   $this->registration=$arr1[0]['registration_time'];
					                   if(empty($arr1[0]['profile_pic']))
					                   $this->profile_pic='unknown1.jpg';
					                   else
					                   $this->profile_pic=$arr1[0]['profile_pic'];
					                   $this->wishlist_added=$arr1[0]['wishlist'];
					                   if($arr1[0]['social_login'])
					                   {$this->social_user=1;
					                   	$this->social_pic=$this->profile_pic;
					                   }else
					                   $this->social_user=0;
					                   if(empty($arr1[0]['gender']))
					                      {
					                      		$this->gender='male';
					                      }else
					                      $this->gender=$arr1[0]['gender'];
					                      $this->phone=$arr1[0]['phone'];

					                      $this->routed_profile_pic='img/'.$this->profile_pic;
                                       }


                                     function return_product_in_wishlist($productid){
                                     	$wishlist_arr=explode('$$$',($this->wishlist_added));
                                     	if(in_array($productid,$wishlist_arr))
                                     		return 1;
                                     	    else
                                     		return 0;
                                     }


                                     function return_wishlist(){


                                     	return explode('$$$',$this->wishlist_added);

                                     }

}
?>