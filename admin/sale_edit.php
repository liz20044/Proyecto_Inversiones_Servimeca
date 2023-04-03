<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
        $salid = $_POST['id'];
        $name = $_POST['edit_cliente'];
        $total_ve = $_POST['edit_bs'];
       


		$sql = "UPDATE sales SET name = '$name', total_ve = '$total_ve' WHERE id = '$salid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Actualizado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Rellene el formulario de edición primero';
	}

	header('location:sale.php');

?>