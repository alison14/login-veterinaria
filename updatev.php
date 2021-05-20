<?php
	include_once 'conexion.php';

	if(isset($_GET['id_doctor'])){
		$id_doctor=(int) $_GET['id_doctor'];

		$buscar_id=$conexion->prepare('SELECT * FROM doctor WHERE id_doctor=:id_doctor LIMIT 1');
		$buscar_id->execute(array(
			':id_doctor'=>$id_doctor
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: indexv.php');
	}


	if(isset($_POST['guardar'])){
		$nombre_doc=$_POST['nombre_doc'];
		$apellido_doc=$_POST['apellido_doc'];
		$especialidad=$_POST['especialidad'];
		$correo_doc=$_POST['correo_doc'];
		$telefono_doc=$_POST['telefono_doc'];
		$id_doctor=(int) $_GET['id_doctor'];

		if(!empty($nombre_doc) && !empty($apellido_doc) && !empty($especialidad) && !empty($correo_doc) && !empty($telefono_doc) ){
			if(!filter_var($correo_doc,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo_doc no valido');</script>";
			}else{
				$consulta_update=$conexion->prepare(' UPDATE doctor SET  
					nombre_doc=:nombre_doc,
					apellido_doc=:apellido_doc,
					especialidad=:especialidad,
					correo_doc=:correo_doc,
					telefono_doc=:telefono_doc
					WHERE id_doctor=:id_doctor;'
				);
				$consulta_update->execute(array(
					':nombre_doc' =>$nombre_doc,
					':apellido_doc' =>$apellido_doc,
					':especialidad' =>$especialidad,
					':correo_doc' =>$correo_doc,
					':telefono_doc' =>$telefono_doc,
					':id_doctor' =>$id_doctor
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
	<title>Editar Vterinario</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	
	<div class="contenedor">
		<h1>EDITAR VETERINARIO</h1>
		<form action="" method="post">
			<h4>Nombre</h4>
			<div class="form-group">
				<input type="text" name="nombre_doc" value="<?php if($resultado) echo $resultado['nombre_doc']; ?>" class="input__text">
			</div>
			<h4>Apellido</h4>
			<div class="form-group">
				<input type="text" name="apellido_doc" value="<?php if($resultado) echo $resultado['apellido_doc']; ?>" class="input__text">
			</div>
			<h4>Especialidad</h4>
			<div class="form-group">
				<input type="text" name="especialidad" value="<?php if($resultado) echo $resultado['especialidad']; ?>" class="input__text">
			</div>
			<h4>Correo</h4>
			<div class="form-group">
				<input type="text" name="correo_doc" value="<?php if($resultado) echo $resultado['correo_doc']; ?>" class="input__text">
			</div>
			<h4>Telefono</h4>
			<div class="form-group">
				<input type="text" name="telefono_doc" value="<?php if($resultado) echo $resultado['telefono_doc']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexv.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
