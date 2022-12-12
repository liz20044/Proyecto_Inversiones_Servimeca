<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $document = $_POST['document'];

		//creating customerid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$customer_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "INSERT INTO customers (customer_id, first_name, last_name, address, phone, email, document, created_at) VALUES ('$customer_id', '$first_name', '$last_name', '$address', '$phone', '$email', '$document', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cliente añadido satisfactoriamente';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: customer.php');
?>
