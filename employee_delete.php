<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$empid = $_POST['id'];
		$sql = "DELETE FROM employees WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Empleado eliminado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccione el elemento para eliminar primero';
	}

	header('location: employee.php');
	
?>