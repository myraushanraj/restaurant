<?php 

function get_ticket_id(){

$ticketid='SEWA'.time();
return $ticketid;
}
if(isset($_GET['issue_submit']))
{
  require_once "../class/db_class.php";
	$d1=new dbconn();
	$db=$d1->connect();
      $name=($_GET['name']);
        $email=($_GET['email']);
        $mobile=($_GET['mobile']);
        $issue=($_GET['issue']);
        $message=($_GET['message']);
 date_default_timezone_set("Asia/calcutta");
$registeredat=date("Y-m-d H:i:s");
        $ticketid=get_ticket_id();
      $cmd="INSERT into supporttoken(Ticketnumber,name,mobile,email,issue,registeredat,message) values ('$ticketid','$name','$mobile','$email','$issue','$registeredat',:message)";
        $query=$db->prepare($cmd);
        $result=$query->execute(array(
':message'=>$message
        	));
$email_msg="hello Mysabzi, a mew support needed for the following :";
$email_msg.=" Mobile : ".$mobile;
$email_msg.=" Issue : ".$issue;
$email_msg.=" Message : ".$message;
$email_msg.=" Enquirt time :".$registeredat;
//mail('chandanjha.7@gmail.com','Need urgent support',$email_msg);


echo 'Congratulations ! your support requested has been sent with reference '.$ticketid.' Use the same for future reference ';
}
?>
 <!-- Modal -->
  <div class="modal fade" id="writetous" role="dialog" style='    font-size: 13px;
    font-family: calibri;'>
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Write to us </h4>
        </div>
        <div class="modal-body">

 <strong id='support_warning'></strong>
                      <br>



                    </style>
                    <form action='#' id='form2' method='post'>
           		
                          <input name="name" id='name'  placeholder='your name' class='modal-input' type="text" >
    
                          <input name="email" id='email' placeholder='your Email'  class='modal-input' type="text"  >
     
                          <input name="mobile" id='phone' placeholder='your phone'  class='modal-input' type="text" >
         
                          <select id="issue" name='issue'  class='modal-input' >
                            <option value="null">Select requirements </option>    
                            <option value="Technical Issues">Technical Issues</option>
                            <option value="order cancellation">order Cancellation</option>
                            <option value="Refund">Refund</option>
                            <option value="Delivery change">Delivery change</option>  
                             <option value="suggestions">Your suggestions</option>                          
                          </select>
        
                   <textarea name='message' id='message'  class='modal-input' placeholder='enter comments' rows="4" runat="server" maxlength="200" onkeyup="fix(this)" cols="20" id='aboutproduct' name='aboutproduct' >
                   </textarea><span id="remaining" style='color:black;font-size:11px;font-weight:bold'>200</span> Characters remaining</p>
            </form>
             
                    
                  



        </div>
                             <a href="#" onclick='issue_support()' class='modal-btn' id="write_to_btn_id" style="COLOR:WHITE" >
                                <div class="modal-footer">POST NOW</div>
                                </a>
      </div>
   </div>
</div>
 <!-- Modal -->
<script>
 function fix(dis)
    {
      var total=200; // ho many you want to show
      var val = dis.value;
      var lastChar=val.charAt(val.length-1);      
      var count = val.length;
      document.getElementById('remaining').innerHTML= total-count;
      if(count>499)
      {
        alert('Entire text couldnot be pasted, maximum of 200 characters limitation');     
      }

    } 


function issue_support()
{
//step 2 : redirect to the specific location over here  
var name=document.getElementById('name').value;
var mobile=document.getElementById('phone').value;
var email=document.getElementById('email').value;
var issue=document.getElementById('issue').value;
var message=document.getElementById('message').value;
if(name!='' && mobile!='' && issue!='' )
{
  $('#loaderimage').show();
// AJAX Code To Submit Form.
var dataString='issue_submit=1'+'&mobile='+mobile+'&name='+name+'&issue='+issue+'&message='+message+'&email='+email;
// AJAX Code To Submit Form.
$.ajax({
type: "GET",
url: "inc/support-popup.php",
data: dataString,
cache: false,
success: function(result){
     $('#form2').hide(1600);
     $('#write_to_btn_id').hide(1200);
document.getElementById('support_warning').innerHTML=result;

}
});
return false;
}else{
	 $('#writetous').animate({
        scrollTop: 1200},
        'slow');
document.getElementById('support_warning').innerHTML='Please fill all the mandatory values ';
}
}
</script>