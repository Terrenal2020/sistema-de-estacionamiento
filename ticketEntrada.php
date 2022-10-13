<?php
require('fpdf/fpdf.php');
require('conexion.php');
$id=(int)"$_REQUEST[id]";
foreach ($conexion->query("SELECT * FROM ocuparlugar WHERE 	numEspacio='$id'") as $row){
    $a=$row['id'];
    $b=$row['numEspacio'];
    $c=$row['numAuto'];
    $d=$row['marca'];
    $e=$row['modelo'];
    $f=$row['placas'];
    $g=$row['conductor'];
    $h=$row['horaLlegada'];
    $i=$row['fecha'];
    $j=$row['lavado']; 
}
mysqli_close($conexion);
class PDF extends FPDF
{
function Header()
{

    $this->SetFont('Arial','B',20);
    $this->Cell(70);
    $this->Cell(30,10,'Ticket de Salida',0,0,'');
    $this->Ln(20);
}
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
   
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',15);
$pdf->Cell(50);
$pdf->Image('imagenes/descarga.jpg' , 9 ,22, 35 , 38,'JPG',);

$pdf->Cell(110,5,'--Este comprobante es de Pago del vehiculo--',0,0,'');
$pdf->Ln(6);
$pdf->Cell(50);
$pdf->Cell(100,5," Numero de Ticket:  ".$a,0,0,'',0);
//$pdf->Cell(10,5,$resguardo,0,0,'C',0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->Cell(100,5,"Numero de Espacio de Estacionamiento: ".$b,0,1,'',0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->Cell(100,5,"Numero de Auto:  ".$c,0,0,'',0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->Cell(100,5,"Marca del Auto:  ".$d,0,1,'',0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->Cell(100,5,"Modelo del Auto:  ".$e,0,0,'',0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->Cell(100,5,"Placas del Auto:  ".$f,0,1,'',0);
$pdf->Cell(50);
$pdf->Cell(100,5,"Pago Autolavado:  $".$j,0,1,'',0);
$pdf->Cell(50);
$pdf->Cell(100,5,"Conductor:  ".$g,0,0,'',0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->Cell(100,5,"Hora de Entrada:  ".$h,0,1,'',0);
$pdf->Cell(50);
$pdf->Cell(100,5,"Fecha:  ".$i,0,0,'',0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->Cell(100,5,"El Precio por hora es de $25",40,30,'',0);

$pdf->Ln(5);

$pdf->Ln(10);
// Arial italic 8
$pdf->SetFont('Arial','I',8);
// Número de página
$pdf->Cell(105);
$pdf->Cell(0,10,'Sistema de Estacionamiento "Tecni Wash"');













$pdf->Output();
?>