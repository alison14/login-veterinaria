<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre_masco=$_POST['nombre_masco'];
		$tipo_masco=$_POST['tipo_masco'];
		$raza=$_POST['raza'];
		$color=$_POST['color'];

		if(!empty($nombre_masco) && !empty($tipo_masco) && !empty($raza) && !empty($color)){
				$consulta_insert=$conexion->prepare('INSERT INTO mascota(id_usuario,nombre_masco,tipo_masco,raza, color) VALUES(:id_usuario,:nombre_masco,:tipo_masco,:raza,:color)');
				$consulta_insert->execute(array(
					':id_usuario' =>$id_usuario,
					':nombre_masco' =>$nombre_masco,
					':tipo_masco' =>$tipo_masco,
					':raza' =>$raza,
					':color' =>$color
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
	<title>Nueva Mascota</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="contenedor">
		<h1>AGREGAR MASCOTA</h1><br>
		<form action="" method="post">
			<h4>Nombre</h4>
			<div class="form-group">
				<input type="text" name="nombre_masco" placeholder="Nombre" class="input__text">
			</div>
			<h4>Tipo Mascota</h4>
			<div class="form-group">
				<input type="text" name="tipo_masco" placeholder="Tipo Mascota" class="input__text">
			</div>
			<h4>Raza</h4>
			<div class="form-group">
				<input type="text" name="raza" placeholder="Raza" class="input__text">
			</div>
			<h4>Color</h4>
			<div class="form-group">
				<input type="text" name="color" placeholder="Color" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexd.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>