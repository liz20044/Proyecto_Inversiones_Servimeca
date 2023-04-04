<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$salid = $_POST['id'];
		$sql = "SELECT sales.*, sales.id AS salid, customers.first_name, customers.last_name, vehicles.model, vehicles.brand, vehicles.patent FROM sales LEFT JOIN customers ON customers.id=sales.customer_id LEFT JOIN vehicles ON vehicles.id=sales.vehicle_id WHERE sales.id = '$salid'"; 
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);

    }
?>
