<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$serid = $_POST['id'];
		$edit_name = $_POST['edit_name'];
		$price_ve = $_POST['edit_price_ve'];
		$status = $_POST['edit_status'];

		$sql = "UPDATE services SET name = '$edit_name', price_ve = '$price_ve', status = '$status' WHERE id = '$serid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Servicio actualizado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Seleccionar servicio para editar primero';
	}

	header('location: service.php');
?>
