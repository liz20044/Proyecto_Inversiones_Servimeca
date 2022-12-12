<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$customer = $_POST['customer'];
		$vehicle = $_POST['vehicle'];
		$cart_services = json_decode($_POST['cart_services']);
		$total_ve = $_POST['total_ve'];
		$total_us = $_POST['total_us'];
		$pay_method = $_POST['pay_method'];
		$pay_reference = $_POST['pay_reference'];
		$status = 1;
        //creating saleid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$sale_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//

		$sql = "INSERT INTO sales (sale_id, customer_id, vehicle_id, total_ve, total_us, status, pay_method, pay_reference) VALUES ('$sale_id', '$customer', '$vehicle', '$total_ve', '$total_us', '$status', '$pay_method', '$pay_reference')";

		if($conn->query($sql)){
            $sale_last = $conn->insert_id;

            if (is_array($cart_services)) {
                foreach($cart_services as $service) {
                    $sql = "INSERT INTO sales_details (service_id, sale_id, total_ve, total_us) VALUES ('$service->id', '$sale_last', '$service->price_ve', '$service->price_us')";

                    $conn->query($sql);
                }
            }

            $_SESSION['success'] = 'Reparacion añadido satisfactoriamente';

            header('location: sale_detail.php?sale=' . $sale_last);

            exit();
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: sale_generate.php');
?>
