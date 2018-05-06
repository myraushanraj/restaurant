<?php 
include_once "../class/product_class.php";
include_once "../class/db_class.php";
$id=$_GET['loadid'];
$pr1=new products($id);
?>
<div class="news-gr">
								<div class="col-md-5 new-grid1">
								<img src="img/<?php echo $pr1->title_pic;?>" class="img-responsive" alt="">
								</div>
									<div class="col-md-7 new-grid">
										<h5><?php echo $pr1->title;?></h5>
										<h6>Quick Overview</h6>
										<span>
												<?php echo $pr1->story;?>
										</span>
										<div class="color-quality hidden1">
											<div class="color-quality-left">
												<h6>Color : </h6>
												<ul>
													<li><a href="#"><span></span>Red</a></li>
													<li><a href="#" class="brown"><span></span>Yellow</a></li>
													<li><a href="#" class="purple"><span></span>Purple</a></li>
													<li><a href="#" class="gray"><span></span>Violet</a></li>
												</ul>
											</div>
											<div class="color-quality-right">
												<h6>Quality :</h6>
												<div class="quantity"> 
													<div class="quantity-select">                           
														<div class="entry value-minus1">&nbsp;</div>
														<div class="entry value1"><span>1</span></div>
														<div class="entry value-plus1 active">&nbsp;</div>
													</div>
												</div>
												<!--quantity-->
														<script>
														$('.value-plus1').on('click', function(){
															var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
															divUpd.text(newVal);
														});

														$('.value-minus1').on('click', function(){
															var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
															if(newVal>=1) divUpd.text(newVal);
														});
														</script>
													<!--quantity-->
											</div>
											<div class="clearfix"> </div>
										</div>
												<div class="add">
										<?php echo $pr1->add_to_cart_front();?>
										</div>
									<div class="women hidden1">
										<span class="size " >XL / XXL / S </span>
										<p ><del>&#8377;<?php echo $pr1->mrp;?></del><em class="item_price">&#8377;<?php echo $pr1->mrp;?></em></p>
								
									</div>
								</div>
							</div>
																		<div class="clearfix"> </div>

							