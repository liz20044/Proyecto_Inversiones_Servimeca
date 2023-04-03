<?php

require 'fpdf/fpdf.php';
require 'conexion.php';

$sql = "SELECT cus.first_name, cus.last_name, ve.brand, ve.model, s.sale_id, s.created_on, s.total_ve, s.total_us, s.pay_method FROM sales s INNER JOIN customers cus ON s.customer_id = cus.id INNER JOIN vehicles ve ON s.vehicle_id = ve.id";
$resultado = $mysqli->query($sql);

class PDF extends FPDF 
{
    function Header()
{
    $this->SetXY(15,15);
    $this->Image('../images/logo.jpeg',145,15,50,45);
	$this->SetFont('Times','B',16);
	$this->Cell(150,10,utf8_decode(strtoupper("Inversiones Servimeca, C.A")),0,0,'L');

	$this->Ln(9);

	$this->SetFont('Arial','',10);
	$this->SetTextColor(39,39,51);
	$this->Ln(5);
    $this->Cell(150,9,utf8_decode("RIF: J-40032951"),0,0,'L');
	$this->Ln(5);
	$this->Cell(150,9,utf8_decode("Dirección: Ribas Dávila Este, Local 186, La victoria, Edo Aragua"),0,0,'L');
	$this->Ln(5);
	$this->Cell(150,9,utf8_decode("Teléfono: 0244-5115412"),0,0,'L');
	$this->Ln(5);
	$this->Cell(150,9,utf8_decode("Email: servimeca.ca@hotmail.com"),0,0,'L');
	$this->Ln(10);

	$this->SetFont('Arial','',10);
	$this->Cell(30,7,utf8_decode("Fecha: ".date("d/m/Y")),0,0);
	$this->Ln(7);

}
    function Footer()
{
    $this->SetY(-10);
    $this->SetFont('Times','I',12);
    $this->Cell(190,5,"Todos los derechos reservados. UPTA Aragua",0, 0,"C");
    $this->SetFont('Times','',12);
    $this->SetX(-25);
    $this->AliasNbPages();
    $this->Write(5, $this->PageNo().'/{nb}');

}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,20);
$pdf->SetFont('Times','B',20);
$pdf->Ln(20);  
$pdf->Cell(190,5,utf8_decode("Lista de Facturas"), 0, 1,"C");
$pdf->Ln(10);  
$pdf->SetFont('Times','',9);
$pdf->SetFillColor(233,229,235);
    $pdf->Cell(32,8,utf8_decode('ID reparación'), 1, 0,"C",1);
    $pdf->Cell(32,8,utf8_decode('Cliente'), 1, 0,"C",1);   
    $pdf->Cell(35,8,utf8_decode('Vehículo'), 1, 0,"C",1);  
    $pdf->Cell(35,8,utf8_decode('Fecha'), 1, 0,"C",1); 
    $pdf->Cell(15,8,utf8_decode('Total VE'), 1, 0,"C",1);
    $pdf->Cell(15,8,utf8_decode('Total US'), 1, 0,"C",1);
    $pdf->Cell(26,8,utf8_decode('Metodo de pago'), 1, 1,"C",1);

while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(30,8,utf8_decode($fila['sale_id']), 'B', 0,"C");
    $pdf->Cell(35,8,utf8_decode($fila['first_name']) . " " . utf8_decode($fila['last_name']) , 'B', 0,"C");
    $pdf->Cell(35,8,utf8_decode($fila['brand']) . " " . utf8_decode($fila['model']), 'B', 0,"C");
    $pdf->Cell(32,8,utf8_decode($fila['created_on']), 'B', 0,"C");   
    $pdf->Cell(16,8,utf8_decode($fila['total_ve']), 'B', 0,"C");  
    $pdf->Cell(16,8,utf8_decode($fila['total_us']), 'B', 0,"C"); 
    $pdf->Cell(25,8,utf8_decode($fila['pay_method']), 'B', 1,"C");
   
}

$pdf->Output('listadereparaciones.pdf','I');