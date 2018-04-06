<?php
session_start();
$username=$_SESSION['username'];
class Vendor{
	public $vendorname;
	public $vendoraddress;
	public $vendorgst;
	public $vendorcontact;
	public $vendoremail;
	public function __construct($vendorname,$vendoraddress,$vendorgst,$vendorcontact,$vendoremail){
		   $this->vendorname=$vendorname;
		   $this->vendoraddress=$vendoraddress;
		   $this->vendorgst=$vendorgst;
		   $this->vendorcontact=$vendorcontact;
		   $this->vendoremail=$vendoremail;
	   }
	
}
class Invoice{
	public $financialyear;
	public $invoicedate;
	public $clientid;
	public $orderno;
	public $place;
	public function __construct($financialyear,$invoicedate,$clientid,$orderno,$place){
		   $this->financialyear=$financialyear;
		   $this->invoicedate=$invoicedate;
		   $this->clientid=$clientid;
		   $this->orderno=$orderno;
		   $this->place=$place;
	   }

}
class Description{
	public $description;
	public $sac;
	public $amount;
	public function __construct($description,$sac,$amount){
		   $this->description=$description;
		   $this->sac=$sac;
		   $this->amount=$amount;
	   }
}
class Bank{
	public $bankname;
	public $ac;
	public $ifsc;
	public function __construct($bankname,$ac,$ifsc){
		   $this->bankname=$bankname;
		   $this->ac=$ac;
		   $this->ifsc=$ifsc;
	   }
}
$vendorname=$_POST['vendorname'];
$financialyear=$_POST['financialyear'];
$vendoraddress=$_POST['vendoraddress'];
$vendorgst=$_POST['vendorgst'];
$invoicedate=$_POST['invoicedate'];
$vendorcontact=$_POST['vendorcontact'];
$clientid=$_POST['clientid'];
$orderno=$_POST['orderno'];
$place=$_POST['place'];
$description=$_POST['description'];
$sac=$_POST['title'];
$amount=$_POST['heading'];
$bankname=$_POST['bankname'];
$ac=$_POST['ac'];
$ifsc=$_POST['ifsc'];
$vendoremail=$_POST['vendoremail'];
$conn = mysqli_connect("localhost", "root", "","designmi_demo");

$count=1;
$sql = "SELECT count(*) FROM salesinvoice";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
			//print_r(row);
		     $filecount=$row['count(*)']+1;
		     //$count=$row[''];
		}
    }
	mysqli_query($conn,"SET NAMES utf8");
$count=stripslashes($count);
$count=mysqli_real_escape_string($conn,$count);
$vendorname=stripslashes($vendorname);
$vendorname=mysqli_real_escape_string($conn,$vendorname);
$financialyear=stripslashes($financialyear);
$finacialyear=mysqli_real_escape_string($conn,$financialyear);
$vendoraddress=stripslashes($vendoraddress);
$vendoraddress=mysqli_real_escape_string($conn,$vendoraddress);
$vendorgst=stripslashes($vendorgst);
$vendorgst=mysqli_real_escape_string($conn,$vendorgst);
$invoicedate=stripslashes($invoicedate);
$invoicedate=mysqli_real_escape_string($conn,$invoicedate);
$vendorcontact=stripslashes($vendorcontact);
$vendorcontact=mysqli_real_escape_string($conn,$vendorcontact);
$vendoremail=stripslashes($vendoremail);
$vendoremail=mysqli_real_escape_string($conn,$vendoremail);
$clientid=stripslashes($clientid);
$clientid=mysqli_real_escape_string($conn,$clientid);
$orderno=stripslashes($orderno);
$orderno=mysqli_real_escape_string($conn,$orderno);
$place=stripslashes($place);
$place=mysqli_real_escape_string($conn,$place);
$myobj1=new Vendor($vendorname,$vendoraddress,$vendorgst,$vendorcontact,$vendoremail);
$myobj1=json_encode($myobj1); 
$myobj2=new Invoice($financialyear,$invoicedate,$clientid,$orderno,$place);
$myobj2=json_encode($myobj2);
$final=array();
$final1=array();
$count=sizeof($description);
$i=0;
while($i<$count){
	$descriptions=$description[$i];
	$sacs=$sac[$i];
	$amounts=$amount[$i];
	$descriptions=stripslashes($descriptions);
    $descriptions=mysqli_real_escape_string($conn,$descriptions);
	$sacs=stripslashes($sacs);
    $sacs=mysqli_real_escape_string($conn,$sacs);
	$amounts=stripslashes($amounts);
    $amounts=mysqli_real_escape_string($conn,$amounts);
	$myobj=new Description($descriptions,$sacs,$amounts);
	array_push($final,$myobj);
	$i++;
}
$count1=sizeof($bankname);
$i=0;
while($i<$count1){
	$banknames=$bankname[$i];
	$acs=$ac[$i];
	$ifscs=$ifsc[$i];
	$banknames=stripslashes($banknames);
    $banknames=mysqli_real_escape_string($conn,$banknames);
	$acs=stripslashes($acs);
    $acs=mysqli_real_escape_string($conn,$acs);
	$ifscs=stripslashes($ifscs);
    $ifscs=mysqli_real_escape_string($conn,$ifscs);
	$myobj=new Bank($descriptions,$sacs,$amounts);
	array_push($final1,$myobj);
	$i++;
}
$final2=$final;
$final3=$final1;
//print_r($final1);
$final=json_encode($final);
$final1=json_encode($final1);
$query5 = mysqli_query($conn,"insert into salesinvoice(vendors,invoice,active,description,bankdetails,username) values('$myobj1','$myobj2',1,'$final','$final1','$username')");

$vendornames1="Name: ".$vendorname;
require('fpdf/fpdf.php');
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,8,"Name :",1,0);
$pdf->Cell(90,8,'',1,1);
$pdf->Cell(50,8,'Address',1,0);
$pdf->Cell(90,8,'',1,1);
$pdf->Cell(50,8,'GSTIN: ',1,0);
$pdf->Cell(90,8,'',1,1);
$pdf->Cell(50,8,'PHONE NUMBER:',1,0);
$pdf->Cell(90,8,'',1,1);
$pdf->Cell(50,8,'Email:',1,0);
$pdf->Cell(90,8,'',1,1);
$pdf->Cell(140,4,'',0,1);
$pdf->Cell(100,8,'Billing Details',1,0);
$pdf->Cell(89,8,'Invoice Details',1,1,"C");
$pdf->Cell(100,8,$vendorname,1,0);
$pdf->Cell(55,8,'Year',1,0,"C");
$pdf->Cell(34,8,$financialyear,1,1,"C");
$pdf->Cell(100,8,$vendoraddress,1,0);
$pdf->Cell(55,8,'Invoice No',1,0,"C");
$pdf->Cell(34,8,$count,1,1,"C");
$pdf->Cell(100,8,$vendorgst,1,0);
$pdf->Cell(55,8,'Date',1,0,"C");
$pdf->Cell(34,8,$invoicedate,1,1,"C");
$pdf->Cell(100,8,$vendorcontact,1,0);
$pdf->Cell(55,8,'Service Order No.',1,0,"C");
$pdf->Cell(34,8,$orderno,1,1,"C");
$pdf->Cell(100,8,$vendoremail,1,0);
$pdf->Cell(55,8,'Place Of Service',1,0,"C");
$pdf->Cell(34,8,$place,1,1,"C");
$pdf->Cell(140,5,'',0,1);
$pdf->Cell(100,8,'DESCRIPTION',1,0,"C");
$pdf->Cell(55,8,'SAC',1,0,"C");
$pdf->Cell(34,8,'AMOUNT',1,1,"C");
$sum=0;
foreach($final2 as $arr){
	$pdf->Cell(100,8,$arr->description,1,0);
	$pdf->Cell(55,8,$arr->sac,1,0,"C");
	$pdf->Cell(34,8,$arr->amount,1,1,"C");
	$sum=$sum+(float)$arr->amount;
}
$sum1=(string)$sum;
$csum=(0.09)*$sum;
$tsum=$sum+(0.18)*$sum;
$tsum1=(string)$tsum;
$csum1=(string)$csum;
$pdf->Cell(100,8,'',1,0,"C");
$pdf->Cell(55,8,'SUBTOTAL',1,0,"C");
$pdf->Cell(34,8,$sum1,1,1,"C");
$pdf->Cell(100,8,'',1,0,"C");
$pdf->Cell(55,8,'CGST(9%)',1,0,"C");
$pdf->Cell(34,8,$csum1,1,1,"C");
$pdf->Cell(100,8,'',1,0,"C");
$pdf->Cell(55,8,'SGST(9%)',1,0,"C");
$pdf->Cell(34,8,$csum1,1,1,"C");
$pdf->Cell(100,8,'',1,0,"C");
$pdf->Cell(55,8,'Total payable',1,0,"C");
$pdf->Cell(34,8,$tsum1,1,1,"C");
$pdf->Cell(140,6,'',0,1,"C");
$pdf->Cell(100,8,'BANK',1,0,"C");
$pdf->Cell(55,8,'ACCOUNT NO',1,0,"C");
$pdf->Cell(34,8,'IFSC CODE',1,1,"C");
$sum=0;
//print_r($final3);
foreach($final3 as $arr){
	$pdf->Cell(100,8,$arr->bankname,1,0);
	$pdf->Cell(55,8,$arr->ac,1,0,"C");
	$pdf->Cell(34,8,$arr->ifsc,1,1,"C");
}




$pdf->Output($filecount.".pdf",'D');
$pdf->Output("invoice/".$filecount.".pdf",'F');
//header('Location:listinvoice.php')
if($query5){
	$_SESSION['msg']='Your files have been successfully uploaded.';
     echo "<script>window.open('invoice.php','_self')</script>";
}


?>