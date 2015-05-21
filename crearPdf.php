<?php
session_start();
require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);


$pdf->Cell(0,10,'Nombre: '.$_SESSION['nom'],0,1);



$pdf->Cell(50,5,'Apellido: '.$_SESSION['ape'],1,1);



$pdf->Cell(0,10,'Fecha: '.$_SESSION['fe'],0,1);
$pdf->Output();




?>
