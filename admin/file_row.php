<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$filid = $_POST['id'];
		$sql = "SELECT *, files.id as filid FROM files WHERE file_id = '$filid'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>
