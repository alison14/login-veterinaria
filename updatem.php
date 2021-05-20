<?php
	include_once 'conexion.php';

	if(isset($_GET['id_mascota'])){
		$id_mascota=(int) $_GET['id_mascota'];

		$buscar_id=$conexion->prepare('SELECT * FROM mascota WHERE id_mascota=:id_mascota LIMIT 1');
		$buscar_id->execute(array(
			':id_mascota'=>$id_mascota
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: indexd.php');
	}


	if(isset($_POST['guardar'])){
		$nombre_masco=$_POST['nombre_masco'];
		$tipo_mascota=$_POST['tipo_mascota'];
		$raza=$_POST['raza'];
		$color=$_POST['color'];
		$id_mascota=(int) $_GET['id_mascota'];

		if(!empty($nombre_masco) && !empty($tipo_mascota) && !empty($raza) && !empty($color) ){
				$consulta_update=$conexion->prepare(' UPDATE mascota SET  
					nombre_masco=:nombre_masco,
					tipo_mascota=:tipo_mascota,
					color=:color,
					raza=:raza,
					WHERE id_mascota=:id_mascota;'
				);
				$consulta_update->execute(array(
					':nombre_masco' =>$nombre_masco,
					':tipo_mascota' =>$tipo_mascota,
					':raza' =>$raza,
					':color' =>$color,
					':id_mascota' =>$id_mascota
				));
				header('Location: indexd.php');
			
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Vterinario</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	
	<div class="contenedor">
		<h1>EDITAR MASCOTA</h1>
		<form action="" method="post">
			<h4>Nombre</h4>
			<div class="form-group">
				<input type="text" name="nombre_masco" value="<?php if($resultado) echo $resultado['nombre_masco']; ?>" class="input__text">
			</div>
			<h4>Apellido</h4>
			<div class="form-group">
				<input type="text" name="tipo_mascota" value="<?php if($resultado) echo $resultado['tipo_mascota']; ?>" class="input__text">
			</div>
			<h4>raza</h4>
			<div class="form-group">
				<input type="text" name="raza" value="<?php if($resultado) echo $resultado['raza']; ?>" class="input__text">
			</div>
			<h4>Correo</h4>
			<div class="form-group">
				<input type="text" name="color" value="<?php if($resultado) echo $resultado['color']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexd.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
