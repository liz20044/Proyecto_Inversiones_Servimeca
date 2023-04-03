<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$salid = $_POST['id'];
		$sql = "DELETE FROM sales WHERE sales.id = '$salid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Factura eliminada con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccione el elemento para eliminar primero';
	}

	header('location: sale.php');
	
?>