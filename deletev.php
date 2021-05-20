<?php 

	include_once 'conexion.php';
	if(isset($_GET['id_doctor'])){
		$id_doctor=(int) $_GET['id_doctor'];
		$delete=$conexion->prepare('DELETE FROM doctor WHERE id_doctor=:id_doctor');
		$delete->execute(array(
			':id_doctor'=>$id_doctor
		));
		header('Location: indexv.php');
	}else{
		header('Location: indexv.php');
	}
 ?>