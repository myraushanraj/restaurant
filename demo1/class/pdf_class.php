<?php require_once('pdf/fpdf.php');
include_once"setup-class.php";
function create_order_invoice($customername,$phone,$email,$address,$bill,$stringitems,$time,$orderid,$plan_id){
$setup=new web_controllers();
$setup->operational_data();
// calculate the final bill here =================
$domain=$setup->domain;
$gst=($bill/100)*($setup->gst);
$delivery_charge=$setup->delivery_charge;
$final_bill=$bill+$gst+$delivery_charge;


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetY(75);
$pdf->SetFont("Arial","",15);
$time=date("y/m/d h:i:s");
// Title
$pdf->SetFont("helvetica","",10,'');
    





// the header par of pdf =======================================================================================================
$pdf->SetTextColor(199,0,0);


$pdf->SetFillColor(0,233,255);

$pdf->Image('../icon/10895643.png',10,6,30);
$pdf->Ln(20);
$pdf->SetFont("Arial","",15);
$pdf->SetY(5);
$pdf->SetX(122);
$pdf->Cell(0,2,$setup->company,"0","1",C);
$pdf->Ln(4);
$pdf->SetX(122);
   
$pdf->Ln(2.8);
$pdf->SetY(85);
$pdf->SetX(122);
$pdf->SetFont("Arial","B",8);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);

// left side details ===============================
    $pdf->Ln(4);
        $pdf->Ln(4);$pdf->SetX(-322);
$pdf->SetFont("Arial","",17);


    $pdf->Ln(4);
      $pdf->Cell(0,2,"","",11);
$pdf->SetFont("Arial","B",11);
    $pdf->Cell(0,2,"Your billing details :","",11);  $pdf->Ln(4);  $pdf->Ln(4);


    
  $pdf->SetFont("Arial","",9);
  $pdf->Cell(0,2,"{$customername}","0","1");
  $pdf->Ln(4);
  $pdf->Cell(0,2,"{$address}","0","1");
  $pdf->Ln(4);
  $pdf->Cell(0,2,"{$email}","0","1");
  $pdf->Ln(4);
  $pdf->Cell(0,2,"{$phone}","0","1");
 
// left side detailsends here ================================

  // right side detailos starts here ========================================================
$pdf->SetY(35);
      $pdf->SetX(0);              $pdf->Ln(4);
              $pdf->Cell(0,2,"","0","1",C);
              $pdf->SetFont("Arial","B",14);
        $pdf->Cell(0,2,"Invoice number: IN{$orderid}","0","1",C);
              $pdf->Ln(4);
$pdf->Cell(0,2,"Date :{$time}","0","1",C);
$pdf->Ln(4);

  // right side details will ends here =========================================================================
$pdf->SetFont("Arial","",10);
$pdf->SetY(135);



  //$pdf->SetX(-52);

// customizing the string for detailed products invoicing 
// ====== detailed product invoicing 


$pdf->SetFont("helvetica","B",9);


$pdf->SetFont("helvetica","B",9);
$pdf->Cell(145,10,"FOOD TO BE DELIVERED :  {$stringitems}","0","1");

      $pdf->Ln(19);

      $pdf->Cell(145,10," FOOD CHARGES:   INR {$bill}","0","1");

      $pdf->Ln(1);

      $pdf->Cell(145,10," GST @ {$setup->gst} % : INR {$gst}","0","1");

      $pdf->Ln(1);

      $pdf->Cell(145,10," DELIVERY CHARGES:   INR {$delivery_charge}","0","1");

      $pdf->Ln(4);
            $pdf->Cell(145,10,"______________________________________","0","1");
$pdf->SetTextColor(230,0,0);

      $pdf->Cell(145,10," TOTAL :   INR {$final_bill}","0","1");
$pdf->SetTextColor(0,0,0);
      $pdf->Cell(145,10,"This invoice can be used as a reciept .
       ","0","1");  $pdf->Ln(0.5);
       $pdf->Cell(145,10,"Food ordered once can not be cancelled","0","1");
            $pdf->Cell(145,10,"You can track your booking at {$domain}","0","1");
             $pdf->Cell(145,10,"Delivery duration depends on the kind of food ordered as well as city traffic.","0","1");
// =========================== new pdf examples ================================================= 




//============================= new pdf examples ends hre



//$pdf->output();
$invoicename='invoices/IN'.$orderid.'.pdf';
$content = $pdf->Output($invoicename,'F');




}

?>
