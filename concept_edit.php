<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$conid = $_POST['id'];
		$name = $_POST['edit_name'];
		$amount = $_POST['edit_amount'];
		$type = $_POST['edit_type'];

		$sql = "UPDATE concepts SET name = '$name', amount = '$amount', type = '$type' WHERE id = '$conid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Concepto actualizado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Seleccionar concepto para editar primero';
	}

	header('location: concept.php');
?>
