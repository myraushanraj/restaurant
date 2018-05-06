   <!-- -=============== NOTIFICATION FOR ADMIN ACTION ================================= -->
<style type="text/css">
div#performed_op
{


  position: fixed;
    z-index: 33;
    margin-left: 39%;
    margin-right: auto;
    margin-top: 196px;


}
.theme-btn{

}
</style>
    <a href="javascript:void(0)" style="display:none" data-toggle='modal' id="confirmation_pop_id" data-target='#confirmation_pop' >CONFIRMATION_HIDDEN</a>
    <div class="modal fade" id="notify_user" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style='background:green;color:white'>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Notify user  </h4>
        </div>
        <div class="modal-body" id="notify_body">
             <textarea>Advertisement text here ......</textarea>
             <input type="submit" value="POST NOW " class="theme-btn">
        </div>
     </div>
</div>
</div>
    <div class="col-md-4 col-sm-4" id='performed_op' style="  display: <?php if(isset($show_notify))
echo 'block';
else
echo 'none';?>;" >
                    <div class="panel" style='    border: 1px solid grey;'>
                        <div class="panel-heading" style="color:white;background:<?php 
if($show_type=='warning')
  echo 'maroon';else
echo 'green';
?>">
                    <?php echo $optitle;?>
                        </div>
                        <div class="panel-body">
                            <p><?php echo $opbody;?></p>
                        <div class="panel-footer">
                         <a href='javascript:void(0)' class='got-it' onclick="document.getElementById('performed_op').style.display='none'">Got it</a>
                        </div>
                    </div>
                </div>
</div>

<!-- ===============NOTIFICATION FOR ADMIN ACTION ==================================== -->
<div class="modal fade" id="confirmation_pop" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:red;color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ACTION CONFIRMATION </h4>
        </div>
        <div class="modal-body" id='bid_placement_body'>
       
          <!-- ==  body ==-->
                  <SPAN id='changin_text'>
                  </SPAN>      <br><br>

<a href="#" id='changing_link' class="btn btn-success" >PROCEED</a> <a href="javascript:void(0)" data-dismiss="modal" data-target="#open_market_pop"  style='background:maroon;color:white;' class="btn btn-failure">CANCEL</a>

          <!-- == body == -->
        </div>
        <div class="modal-footer" style='border-top:none'>

        </div>
      </div>
      
    </div>
  </div>

  <!-- -=============== update order ka notifications starts here ================================= -->