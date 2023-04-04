<?php

require 'fpdf/fpdf.php';
require 'conexion.php';

    $sql = "SELECT DISTINCT payroll.employee_id, employees.*, payroll.payroll_id, payroll.amount FROM payroll LEFT JOIN employees ON employees.id = payroll.employee_id WHERE payroll.payroll_id = '" . $_GET['payroll'] . "' AND payroll.employee_id = " . $_GET['employee'];
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
$pdf->Cell(190,5,utf8_decode("Recibo de Empleado"), 0, 1,"C");
$pdf->Ln(20);  
$pdf->SetFont('Times','',8);
$pdf->SetFillColor(233,229,235);
    $pdf->Cell(27,8,utf8_decode('Cliente'), 1, 0,"C",1);   
    $pdf->Cell(40,8,utf8_decode('Monto'), 1, 1,"C",1);  


while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(27,8,utf8_decode($fila['firstname']) . " " . utf8_decode($fila['lastname']), 'B', 1,"C");
    $pdf->Cell(40,8,utf8_decode($fila['amount']), 'B', 0,"C"); 


}


$pdf->Output('reciboempleado.pdf', 'I');
