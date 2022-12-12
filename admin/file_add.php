<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$employee = $_POST['employee'];

        $sql = "SELECT * FROM files WHERE employee_id = " . $employee;
        $stmt = $conn->query($sql);

        $file_finded = null;

        while ($file = $stmt->fetch_assoc()) $file_finded = $file;

        if (is_array($file_finded)) {
            $_SESSION['error'] = 'Este empleado ya tiene conceptos asignados';
        }

		$cart_concept = json_decode($_POST['cart_concept']);

		$sql = "INSERT INTO files (employee_id) VALUES ('$employee')";

		if($conn->query($sql)){
            $file_last = $conn->insert_id;

            foreach ($cart_concept as $concept) {
                $sql = "INSERT INTO files_details (file_id, concept_id) VALUES ('$file_last', '$concept->id')";
                $conn->query($sql);
            }

            $_SESSION['success'] = 'Asignacion de conceptos añadido satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: file.php');
?>
