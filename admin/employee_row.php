<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$empid = $_POST['id'];
		$sql = "SELECT *, employees.id as empid FROM employees LEFT JOIN schedules ON schedules.id=employees.schedule_id WHERE employees.id = '$empid'"; 
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>