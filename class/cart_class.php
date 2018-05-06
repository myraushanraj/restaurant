<?php
include_once "menu-class.php";
// =========================== ADD TO CART CLASSES ================================================================== 
class cart_all{

function __construct(){

	$this->total_items();
	if($this->item_count>0)
	{
	$this->current_bill();
	$this->product_chain();
    }

}
			function add_item($productid,$qtyadded=1,$type){

	$product_exists=0;
				// if the element existed in the cart already ======
						$master_arr=explode('///',$_SESSION['product_chain']);

										for($r=0;$r<sizeof($master_arr);$r++)
										{	
											$id=explode('$$$',$master_arr[$r])[0];
											$qty=1;

											if($id==$productid)
											{
												$product_exists=1;
												// add 1 to the existing loop and try again 
												$newqty=$qty+1;
												
											}
										}



					//  loop ends 					
										if(!$product_exists)
										{
				$productid_string=$productid.'$$$'.$qtyadded.'$$$'.$type;
				$_SESSION['product_chain'].=$productid_string.'///';
										}else{

											$this->modify_existing_item($productid,$newqty);
										}	
			}



function return_qty_added_for_productid($productid){

			$master_arr=explode('///',$_SESSION['product_chain']);
										for($r=0;$r<sizeof($master_arr);$r++)
										{	
											$id=explode('$$$',$master_arr[$r])[0];echo 'id=== '.$id.' <br>';
											if($id==$productid)
											{
												return $qty;
											}
										}
								


}


							function remove_item($productid)
							{
//$this->clear_my_cart();
								
										// break the cart into 3 parts  ====== 
										$master_arr=explode('///',$_SESSION['product_chain']);
										for($r=0;$r<sizeof($master_arr);$r++)
										{	
											$id=explode('$$$',$master_arr[$r])[0];
											if($id==$productid)
											{
												unset($master_arr[$r]);
											}
										}
												$newstring=implode('///',$master_arr);
												$_SESSION['product_chain']=$newstring;
							 }

							function product_chain(){
								if($this->item_count>0)
								$this->current_list=$_SESSION['product_chain'];
							}


								function clear_my_cart(){

										//step 1 : clear the session product chain 

										unset($_SESSION['product_chain']);

								}

								function total_items(){
									if(isset($_SESSION['product_chain']))
								$this->item_count=sizeof(explode('///',$_SESSION['product_chain']))-1;
							    else
								$this->item_count=0;
								}


								function current_bill(){
									$sum=0;
									$this->bill=0;
									$master_arr=explode('///',$_SESSION['product_chain']);
										for($r=0;$r<sizeof($master_arr);$r++)
										{
											$id=explode('$$$',$master_arr[$r])[0];
											if(!empty($id))
											{
											$qty=explode('$$$',$master_arr[$r])[1];
											$product1=new products($id);
											$rate=$product1->selling_price*$qty;
											$sum+=$rate;
										    }
										}
							      $this->bill=$sum;

								   }



								   function modify_existing_item($productid,$newqty){
								   		$newstring='';
								   		$master_arr=explode('///',$_SESSION['product_chain']);
										for($r2=0;$r2<sizeof($master_arr);$r2++)
										{	
											// define a new array =========
											$productarr=explode('$$$',$master_arr[$r2]);
											$id=$productarr[0];
											$qty=$productarr[1];
											$size=$productarr[2];
										
                                               if($id==$productid)
											{	
												$qtynew=$newqty;
											}else
											{
												$qtynew=$qty;
											}
											if(!empty($id))
											{

												// joim the element again and add to the existing array 
											$newstring.=$id.'$$$'.$qtynew.'$$$'.$size.'///';
												}
										}
											
												$_SESSION['product_chain']=$newstring;

								   }




function load_payment_option(){
	?>
<ul type='none'>
<li style="display:inline-block;margin-right:23px;">
                <input type="radio" name="pay_method" value="COD" required style="color:maroon"> Cash on delivery
              </label></li>
              </ul>
              <?php 

}




}


function load_coupon_option(){

 $cart1=new cart_all();
?>
  <div class='row' style='    color: black;
    border: 2px dotted #b6b6b6;
    padding: 14px;
    max-width: 800px;
    margin-left: 12%;'>
<strong>Apply coupon and offers</strong>
<!-- ==  coupon code algorithm ================= -->
<ul type='none' class='pull-left cold-sm-12 col-md-6' style='     float: right;text-align:right;
    font-size: 16px;font-size:13px;font-weight:bold;font-family:calibri;
    margin-right: 8%;'> <li style="" id='realamount'>Total Amount: &#8377;<strong  id='realamount1'><?php echo $cart1->bill;?></strong>

<li style='color:red;display:none' id='couponapplied'>(-)Discount : &#8377; <strong  id='couponamount'></strong> </li>
<li style=''>Payable Amount : &#8377;<strong id='payamount'><?php echo $cart1->bill?></strong> </li>
  </ul>
<br>

<!-- ==  coupon code algorithm ================ -->

     
<ul type='none' class='pull-right cold-sm-12 col-md-6'  id='coupon-ul' style='float:left'>
          <li>  <input type="text" placeholder='Enter Your coupon code ' style='    width: 115px !important;
    display: inline-block;
    min-width: 189px' name='couponentry' class='coupon-entry'  id="couponentry"> 
            <a href='javascript:void(0)' class="add-to-cart" onclick="apply_coupon()" style='background: #cb202d;
    color: white !important;
    padding: 6px;
    display: inline-block;
    font-style: italic;
    padding-left: 23px;
    padding-right: 24px;'>CHECK</a></li>
     
</ul>
<!-- ==  coupoin code input ====== -->
<br><strong style='color: #134a89;
    position: absolute;
    /* margin-top: 73px; */
    margin-left: -33%;' id='couponstatus'></strong><BR>
<a href='javascript:void(0)' onclick="remove_coupon()" id='remove_coupon' style='display:none'>REMOVE</a>

</div>



<?php
					}



?>