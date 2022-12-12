<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
        $sql = "DELETE FROM files_details WHERE file_id = '$id'";
		if($conn->query($sql)){
            $sql = "DELETE FROM files WHERE id = '$id'";
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
