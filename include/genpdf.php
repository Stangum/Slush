<?php
session_start();
if(!isset($_SESSION['uid'])){
	header("location:registration.php?err=login");
}
if(!isset($_SESSION['pdfdata']))
{
	header("location:gen.php?err=data");
}
require('fpdf.php');
class PDF extends FPDF
{
// Page header


function Header()
{
    // Logo
    $this->Image('../img/logo/logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,"Helvetica",1,0,'C');
    $this->Ln(20);
    $this->SetFont('Arial','B',9);
    $this->Cell(70);
    $this->Cell(50,10,"Class: ".$_SESSION['class']."   Sub: ".$_SESSION['sub'],1,0,'C');
	// Line break
    $this->Ln(20);
    $this->Cell(30,10,"______________________________________________________________________________________________________________________________________________________________________________________________________________________",0,0,'C');
    $this->Ln(20);


}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$prep=$_SESSION['pdfdata'];
$no=$_SESSION['no'];
$pdf->AliasNbPages();
$pdf->AddPage();

for($i=0;$i<$no;$i++)
{
	$j=$i+1;
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,0,$j.".  ".$prep[$i]['qest'],0,1,'C');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(0,0,$prep[$i]['type'],0,1,'C');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',9);	
	$pdf->Cell(0,0,'By:  '.$prep[$i]['uid'],0,1,'C');
	$pdf->Ln(5);	
	$pdf->Cell(0,0,'On:  '.$prep[$i]['dtime'],0,1,'C');
	$pdf->Ln(25);	
}
unset($_SESSION['pdfdata']);
unset($_SESSION['no']);
unset($_SESSION['sub']);
unset($_SESSION['class']);
$pdf->Output();
?>