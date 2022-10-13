<?php
session_start();

$varSesion=$_SESSION['usuario'];

if($varSesion==null || $varSesion==''){
    echo "Acceso denegado <br> <a href='index.php'>Regresar</a>";
    die();
}
require('fpdf/fpdf.php');
require('conexion.php');
$num=0;
$ocupa=0;
$pagos=0;
$total=0;

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    date_default_timezone_set('America/Mexico_City');
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(10);
    // Título
    $this->Cell(10,10,'Corte de Caja: ',0,0,'');
    $this->Cell(10);
    // Título
    $this->Cell(40,20,'Dia: '.date('d-m-Y, H:i:s'),0,0,'');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
 
}
}




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Cell(30);
$pdf->Cell(110,5,'Lista del estacionamiento',0,1,'');
$pdf->Cell(0,10,'_____________________________________________________________',0,1);
$pdf->Ln(6);
foreach ($conexion->query("SELECT * from espacios WHERE dinero>'1'") as $row){
    $pdf->SetFont('Times','',14); 
    $pdf->Cell(30);
    $pdf->Cell(0,10,utf8_decode('Número de Estacionamiento: ').$num=$row['id_espacios'],0,1);
    $pdf->Cell(30);
    $pdf->Cell(0,10,utf8_decode('Ocupaciones de Cajón: ').$ocupa=$row['totalOcupaciones'],0,1);
    $pdf->Cell(30);
    $pdf->Cell(0,10,utf8_decode('Total: $ '.$pagos=$row['dinero']),0,1);
    $pdf->Cell(0,10,'_____________________________________________________________',0,1);
    $total+=$pagos;
}
$pdf->Cell(30);
$pdf->Cell(100,5,"TOTAL DE CORTE DE CAJA:  $".$total.".00",0,0,'',0);
$pdf->Ln(10);
// Arial italic 8
$pdf->SetFont('Arial','I',8);
// Número de página
$pdf->Cell(105);
$pdf->Cell(0,10,'>Sistema de Estacionamiento "Tecni Wash"'.date('d-m-Y H:i:s'));
$pdf->Output();
mysqli_close($conexion);
?>