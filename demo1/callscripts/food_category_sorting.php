<?php 
require_once "../class/product_class.php";
require_once "../class/db_class.php";
require_once "../class/food_category_class.php";

?>
<div class="head_title text-center wow slideInDown" data-wow-duration="2s">
						<h2>Menu</h2>
						<div class="separetor"></div>
					</div>
					
					<div class="menus_top_menu text-center wow slideInDown" data-wow-duration="1.5s">
						<ul>
<?php if(!isset($_GET['cat']))
$all_menu=restaurant_menu();
else
$all_menu=restaurant_menu_sorted($_GET['cat']);
$rest_setup=new rest_setup('Bawarchi');
$cat_arr=$rest_setup->restaurant_food_category();
							for ($i=0; $i < sizeof($cat_arr) ; $i++) { 
						
									?>
							<li class="active"><a onclick="sort_menus('<?php echo $cat_arr[$i]['category']?>')" href="javascript:void(0)"><?php echo $cat_arr[$i]['category']?></a></li>
									<?php } ?>	
						</ul>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single_menus wow slideInLeft" data-wow-duration="1.5s">
							<ul>
					<?php 
					for ($i=0; $i < sizeof($all_menu)/2; $i++) { 
						# code...
						 $product=new products($all_menu[$i]['sl']);
					     ?>		
				           <li> 

<a class="p-btn" href="javascript:void(0)"  onclick="add_to_cart('<?php echo $product->productid;?>')">
				           <?php echo $product->title;?> <span>
				           <?php echo $product->description;?></span>
				           </a>

				           </li>
								<?php } ?>	
					    	</ul>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single_menus wow slideInRight" data-wow-duration="1.5s">
							<ul>
					<?php 
					for ($i=sizeof($all_menu)/2; $i < sizeof($all_menu); $i++) { 
						# code...
						 $product=new products($all_menu[$i]['sl']);
					     ?>		
				           <li> 


<a class="p-btn" href="javascript:void(0)"  onclick="add_to_cart('<?php echo $product->productid;?>')">
				           <?php echo $product->title;?> <span>
				           <?php echo $product->description;?></span>
				           </a>
				           </li>
								<?php } ?>	
					    	</ul>
						</div>
					</div>