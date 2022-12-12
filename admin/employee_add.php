<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$employee_id = $_POST['employee_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$schedule = $_POST['schedule'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating employeeid
			
		//
		$sql = "INSERT INTO employees (employee_id, firstname, lastname, address, birthdate, contact_info, gender, position_id, schedule_id, photo, created_on) VALUES ('$employee_id', '$firstname', '$lastname', '$address', '$birthdate', '$contact', '$gender', '$position', '$schedule', '$filename', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Empleado añadido satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Rellene el formulario de adición primero';
	}

	header('location: employee.php');
?>