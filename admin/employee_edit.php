<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$employee_id = $_POST['employee_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$schedule = $_POST['schedule'];
		
		$sql = "UPDATE employees SET  employee_id = '$employee_id', firstname = '$firstname', lastname = '$lastname', address = '$address', birthdate = '$birthdate', contact_info = '$contact', gender = '$gender', schedule_id = '$schedule' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Empleado actualizado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Seleccionar empleado para editar primero';
	}

	header('location: employee.php');
?>