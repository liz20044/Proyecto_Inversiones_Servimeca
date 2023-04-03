<?php

require 'fpdf/fpdf.php';
require 'conexion.php';
$sale_id = $_GET['sale'];
$sql = "SELECT sales.*, customers.first_name, customers.last_name, vehicles.model, vehicles.brand, vehicles.patent FROM sales LEFT JOIN customers ON customers.id=sales.customer_id LEFT JOIN vehicles ON vehicles.id=sales.vehicle_id WHERE sales.id = {$sale_id}";
$resultado = $mysqli->query($sql);

 $sql = "SELECT *, sales_details.id FROM sales_details LEFT JOIN services ON services.id = sales_details.service_id WHERE sale_id = {$sale_id}";
 $resultado2 = $mysqli->query($sql);

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
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(5);
$pdf->SetFont('Times','B',20);
$pdf->Ln(20);  
$pdf->Cell(195,5,utf8_decode("Factura de Reparación"), 0, 1,"C");
$pdf->Ln(12);  
$pdf->SetFont('Times','',8);
$pdf->SetFillColor(233,229,235);
    $pdf->Cell(28,8,utf8_decode('ID Reparación'), 1, 0,"C",1);
    $pdf->Cell(27,8,utf8_decode('Cliente'), 1, 0,"C",1);   
    $pdf->Cell(40,8,utf8_decode('Vehículo'), 1, 0,"C",1);  
    $pdf->Cell(30,8,utf8_decode('Creado'), 1, 0,"C",1); 
    $pdf->Cell(16,8,utf8_decode('Total VES'), 1, 0,"C",1);
    $pdf->Cell(16,8,utf8_decode('Total USD'), 1, 0,"C",1);
    $pdf->Cell(25,8,utf8_decode('Metodo de pago'), 1, 0,"C",1);
    $pdf->Cell(15,8,utf8_decode('Referencia'), 1, 1,"C",1);

while ($fila = $resultado->fetch_assoc()) {
	$pdf->Cell(28,8,utf8_decode($fila['sale_id']), 'B', 0,"C"); 
    $pdf->Cell(27,8,utf8_decode($fila['first_name']) . " " . utf8_decode($fila['last_name']), 'B', 0,"C");
    $pdf->Cell(40,8,utf8_decode($fila['patent']) . " - " . utf8_decode($fila['brand']) . " " . utf8_decode($fila['model']), 'B', 0,"C"); 
    $pdf->Cell(30,8,utf8_decode($fila['created_on']), 'B', 0,"C"); 
	$pdf->Cell(16,8,utf8_decode($fila['total_ve']), 'B', 0,"C");  
    $pdf->Cell(16,8,utf8_decode($fila['total_us']), 'B', 0,"C"); 
    $pdf->Cell(25,8,utf8_decode($fila['pay_method']), 'B', 0,"C");
    $pdf->Cell(15,8,utf8_decode($fila['pay_reference']), 'B', 1,"C");

}

$pdf->Ln(10);
$pdf->SetLeftMargin(5);
$pdf->SetRightMargin(5); 
$pdf->SetFont('Times','',15);
$pdf->Cell(190,5,utf8_decode("Detalles de servicios aplicados"), 0, 1,"C");
$pdf->SetFont('Times','',10);
$pdf->Ln(5);
$pdf->SetFillColor(233,229,235);
    $pdf->Cell(50,8,utf8_decode('ID Servicio'), 1, 0,"C",1);
    $pdf->Cell(60,8,utf8_decode('Nombre'), 1, 0,"C",1);   
    $pdf->Cell(30,8,utf8_decode('Precio BS'), 1, 0,"C",1);  
    $pdf->Cell(30,8,utf8_decode('Precio USD'), 1, 0,"C",1); 
    $pdf->Cell(30,8,utf8_decode('Estado'), 1, 1,"C",1);

while ($fila = $resultado2->fetch_assoc()) {
	$pdf->Cell(50,8,utf8_decode($fila['service_id']), 'B', 0,"C"); 
    $pdf->Cell(60,8,utf8_decode($fila['name']), 'B', 0,"C");
	$pdf->Cell(30,8,utf8_decode($fila['total_ve']), 'B', 0,"C");  
    $pdf->Cell(30,8,utf8_decode($fila['total_us']), 'B', 0,"C"); 
	$pdf->Cell(30,8,utf8_decode($fila['status']) ? 'Activo' : 'Inactivo', 'B',1,"C"); 
}
$pdf->Ln(35);
$pdf->Write(10,('_______________________________'));
$pdf->SetX(150);
$pdf->Write(10,('______________________________'));
$pdf->Ln(10);
$pdf->Write(8,utf8_decode('Firma Encargado '));
$pdf->SetX(180);
$pdf->Write(8,utf8_decode('Firma Cliente '));

$pdf->Output('facturacliente.pdf', 'I');

?>
