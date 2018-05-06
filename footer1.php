<style type="text/css">
	.active{
		background: red;color: white;
	}
</style>
<!-- ====== modal for updating the work status =========================== -->
  <div class="modal fade" id="export_data" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='background:green;color:white'>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Export your data </h4>
        </div>
        <div class="modal-body" id="add_menu_body">
              <center>
                 <form action='api/export_table.php' method='get' >

<input type="hidden" id="table_name" name="table_name" >
<label>Enter a unique name for your downloaded file </label>
<input type="text" id="file_name" name="file_name" >


<input type="submit" name="new_download" value="Dwonload CSV file" class="theme-btn btn">


                  </form>
                  </center>
        </div>
     </div>
</div>
</div>


<!-- === modal for updating the work status ============================== -->






	
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>

	
				<script>
function load_notification_text(link)
{ alert();
var xmlhttp;   
alert(link);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	alert(xmlhttp.responseText);
document.getElementById("show_notification_body").style.display='block';
document.getElementById("show_notification_body").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET",'admin-scripts/show-order-profile.php'+,true);
xmlhttp.send();
}


</script>

</body>
</html>