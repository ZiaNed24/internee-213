<?php
//include connection file
include_once("connection.php");
include_once('libs/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'TOP 10 SELLING PRODUCTS',1,0,'C');
    // Line break
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
 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array( 'j_id'=> 'j_id','total_amount'=> 'total_amount' );
 
$result = mysqli_query($connString,"select order_details.j_id as j_id, jewelery_products.name, order_details.j_id as j_id, sum(order_details.total_amount) as total from order_details inner join jewelery_products on order_details.j_id=jewelery_products.id group by order_details.j_id,order_details.j_id order by total desc limit 10;
") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM order_details");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
// foreach($header as $heading) {
// $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
// }
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column);
}
$pdf->Output();
?>
