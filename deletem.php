<?php 

	include_once 'conexion.php';
	if(isset($_GET['id_mascota'])){
		$id_mascota=(int) $_GET['id_mascota'];
		$delete=$conexion->prepare('DELETE FROM mascota WHERE id_mascota=:id_mascota');
		$delete->execute(array(
			':id_mascota'=>$id_mascota
		));
		header('Location: indexd.php');
	}else{
		header('Location: indexd.php');
	}
 ?>