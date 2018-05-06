<?php
include_once('top-nav.php');
?>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Tabels</li>
            </ol>
            <div class="col-md-12">
            <form class="form-inline">
   <div class="form-group">
      <label for="email">Date Range:&nbsp;</label>
      <input type="text" class="form-control"  name="today" value="today">
    </div><br/>   <br/> 
    <p>Custom Range</p>       	
  <div class="form-group">
    <button class="btn btn-default table_button" style="">From</button>
    <input type="date" class="form-control" >
  </div>
  <div class="form-group" style="">
    <button class="btn btn-default table_button" style="">To</button>
    <input type="date" class="form-control" >
  </div><br/>   <br/>
     <div class="form-group">
      <label for="email">Sell Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input type="text" class="form-control"  name="today" value="All">
    </div><br/>   <br/>
       <div class="form-group">
      <label for="email">Employee Type:&nbsp;</label>
      <input type="text" class="form-control"  name="today" value="Sale-Person">
    </div><br/>   <br/>
           <div class="form-group">
      <label for="email">Location:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input type="text" class="form-control"  name="today" value="Default">
    </div>
</form>	

            </div>


  <!--//content-inner-->
		<!--/sidebar-menu-->
				<?php
include_once('footer.php');
?>