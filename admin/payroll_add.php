<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
        //creating saleid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$payroll_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//

        $date_pay = $_POST['date_pay'];

        $sql = "SELECT *, files.id AS filid FROM files LEFT JOIN employees ON employees.id=files.employee_id";

        $stmt = $conn->query($sql);
        $files = [];

        while ($file = $stmt->fetch_assoc()) $files[] = $file;

        foreach ($files as $file) {
            $sql = "SELECT *, files_details.id AS detid FROM files_details LEFT JOIN concepts ON concepts.id=files_details.concept_id WHERE files_details.file_id = " . $file['filid'];
            $stmt = $conn->query($sql);

            while ($details = $stmt->fetch_assoc()) {
                if ((int)$details['type'] === 1) {
                    $amount = ($details['amount']) * -1;
                    $sql = "INSERT INTO payroll (payroll_id, date_pay, employee_id, amount) VALUES ('$payroll_id', '$date_pay', '" . $file['id'] . "', '$amount')";

                    $conn->query($sql);
                }

                if ((int)$details['type'] === 2) {
                    $amount = ($details['amount']);
                    $sql = "INSERT INTO payroll (payroll_id, date_pay, employee_id, amount) VALUES ('$payroll_id', '$date_pay', '" . $file['id'] . "', '$amount')";

                    $conn->query($sql);
                }
            }
        }

        $_SESSION['success'] = 'Nomina añadido satisfactoriamente';

        header('location: payroll_detail.php?payroll=' . $payroll_id);

        exit();
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: generate_payroll.php');
?>
