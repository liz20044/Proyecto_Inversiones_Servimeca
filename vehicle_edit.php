<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
        $vehid = $_POST['id'];
		$patent = $_POST['edit_patent'];
		$brand = $_POST['edit_brand'];
		$model = $_POST['edit_model'];
		$color = $_POST['edit_color'];
		$engine = $_POST['edit_engine'];
		$chassis = $_POST['edit_chassis'];
		$customer = $_POST['edit_customer'];
		$status = $_POST['edit_status'];

		$sql = "UPDATE vehicles SET patent = '$patent', brand = '$brand', model = '$model', color = '$color', engine = '$engine', chassis = '$chassis', customer_id = '$customer', status = '$status' WHERE id = '$vehid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Vehiculo actualizado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Seleccionar vehiculo para editar primero';
	}

	header('location: vehicle.php');
?>
