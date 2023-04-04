<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$price_ve = $_POST['price_ve'];
        $status = $_POST['status'];

		//creating customerid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$service_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "INSERT INTO services (service_id, name, price_ve, status) VALUES ('$service_id', '$name', '$price_ve', '$status')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Servicio añadido satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Rellene el formulario de adición primero';
	}

	header('location: service.php');
?>
