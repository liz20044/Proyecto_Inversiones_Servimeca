<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM payroll WHERE payroll_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Nomina Eliminado Satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Selecciona un elemento para eliminar';
	}

	header('location: payrolls.php');

?>
