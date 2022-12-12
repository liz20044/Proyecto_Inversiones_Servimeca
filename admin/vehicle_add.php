<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$patent = $_POST['patent'];
		$brand = $_POST['brand'];
		$model = $_POST['model'];
		$color = $_POST['color'];
		$engine = $_POST['engine'];
		$chassis = $_POST['chassis'];
		$customer = $_POST['customer'];
		$status = $_POST['status'];

		$sql = "INSERT INTO vehicles (patent, brand, model, color, engine, chassis, customer_id, status) VALUES ('$patent', '$brand', '$model', '$color', '$engine', '$chassis', '$customer', '$status')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Vehiculo añadido satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: vehicle.php');
?>
