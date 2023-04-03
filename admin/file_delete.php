<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$filid = $_POST['id'];
        $sql = "DELETE FROM files_details WHERE file_id = '$filid'";
		if($conn->query($sql)){
            $sql = "DELETE FROM files WHERE id = '$filid'";
            $conn->query($sql);

            $_SESSION['success'] = 'Asignacion de conceptos eliminado con éxito';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccione el elemento para eliminar primero';
	}

	header('location: file.php');

?>
