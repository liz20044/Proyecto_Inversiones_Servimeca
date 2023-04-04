<?php

require 'fpdf/fpdf.php';
require 'conexion.php';

$sql = "SELECT employee_id,	firstname, lastname, contact_info, time_in,	
time_out , created_on FROM employees e INNER JOIN  schedules s ON e.schedule_id = s.id";
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
$pdf->Cell(190,5,"Horarios", 0, 1,"C");
$pdf->Ln(10);  
$pdf->SetFont('Times','',15);
$pdf->SetFillColor(233,229,235);
    $pdf->Cell(30,8,utf8_decode('Cédula'), 1, 0,"C",1);
    $pdf->Cell(30,8,utf8_decode('Nombre'), 1, 0,"C",1);   
    $pdf->Cell(30,8,utf8_decode('Apellido'), 1, 0,"C",1);  
    $pdf->Cell(40,8,utf8_decode('Contacto'), 1, 0,"C",1); 
    $pdf->Cell(30,8,utf8_decode('Entrada'), 1, 0,"C",1);
    $pdf->Cell(30,8,utf8_decode('Salida'), 1, 1,"C",1);

while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(30,8,utf8_decode($fila['employee_id']), 'B', 0,"C");
    $pdf->Cell(30,8,utf8_decode($fila['firstname']), 'B', 0,"C");   
    $pdf->Cell(30,8,utf8_decode($fila['lastname']), 'B', 0,"C");  
    $pdf->Cell(40,8,utf8_decode($fila['contact_info']), 'B', 0,"C"); 
    $pdf->Cell(30,8,utf8_decode($fila['time_in']), 'B', 0,"C");
    $pdf->Cell(30,8,utf8_decode($fila['time_out']), 'B', 1,"C");

}

$pdf->Output('horarios.pdf', 'I');