<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$amount = $_POST['amount'];
		$type = $_POST['type'];

		$sql = "INSERT INTO concepts (name, amount, type) VALUES ('$name', '$amount', '$type')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Concepto añadido satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: concept.php');
?>
