<?php 

	include_once 'conexion.php';
	if(isset($_GET['id_usuario'])){
		$id_usuario=(int) $_GET['id_usuario'];
		$delete=$conexion->prepare('DELETE FROM usuario WHERE id_usuario=:id_usuario');
		$delete->execute(array(
			':id_usuario'=>$id_usuario
		));
		header('Location: indexc.php');
	}else{
		header('Location: indexc.php');
	}
 ?>