<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$cusid = $_POST['id'];
		$first_name = $_POST['edit_first_name'];
		$last_name = $_POST['edit_last_name'];
		$address = $_POST['edit_address'];
		$phone = $_POST['edit_phone'];
        $email = $_POST['edit_email'];
        $document = $_POST['edit_document'];

		$sql = "UPDATE customers SET first_name = '$first_name', last_name = '$last_name', address = '$address', phone = '$phone', email = '$email', document = '$document' WHERE id = '$cusid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cliente actualizado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Seleccionar cliente para editar primero';
	}

	header('location: customer.php');
?>
