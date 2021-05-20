<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre_doc=$_POST['nombre_doc'];
		$apellido_doc=$_POST['apellido_doc'];
		$especialidad=$_POST['especialidad'];
		$correo_doc=$_POST['correo_doc'];
		$telefono_doc=$_POST['telefono_doc'];

		if(!empty($nombre_doc) && !empty($apellido_doc) && !empty($especialidad) && !empty($correo_doc) && !empty($telefono_doc)){
			if(!filter_var($correo_doc,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$conexion->prepare('INSERT INTO doctor(nombre_doc,apellido_doc,especialidad,correo_doc, telefono_doc) VALUES(:nombre_doc,:apellido_doc,:especialidad,:correo_doc,:telefono_doc)');
				$consulta_insert->execute(array(
					':nombre_doc' =>$nombre_doc,
					':apellido_doc' =>$apellido_doc,
					':especialidad' =>$especialidad,
					':correo_doc' =>$correo_doc,
					':telefono_doc' =>$telefono_doc
				));
				header('Location: indexv.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Veterinario</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="contenedor">
		<h1>AGREGAR VETERINARIO</h1><br>
		<form action="" method="post">
			<h4>Nombre</h4>
			<div class="form-group">
				<input type="text" name="nombre_doc" placeholder="Nombre" class="input__text">
			</div>
			<h4>Apellido</h4>
			<div class="form-group">
				<input type="text" name="apellido_doc" placeholder="Apellidos" class="input__text">
			</div>
			<h4>Especialidad</h4>
			<div class="form-group">
				<input type="text" name="especialidad" placeholder="Profesion" class="input__text">
			</div>
			<h4>Correo</h4>
			<div class="form-group">
				<input type="text" name="correo_doc" placeholder="Correo" class="input__text">
			</div>
			<h4>Telefono</h4>
			<div class="form-group">
				<input type="text" name="telefono_doc" placeholder="Teléfono" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexv.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>