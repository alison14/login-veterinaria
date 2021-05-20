<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre_usu=$_POST['nombre_usu'];
		$apellido_usu=$_POST['apellido_usu'];
		$correo_usu=$_POST['correo_usu'];
		$telefono_usu=$_POST['telefono_usu'];

		if(!empty($nombre_usu) && !empty($apellido_usu) && !empty($correo_usu) && !empty($telefono_usu)){
			if(!filter_var($correo_usu,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$conexion->prepare('INSERT INTO usuario(nombre_usu,apellido_usu,correo_usu, telefono_usu) VALUES(:nombre_usu,:apellido_usu,:correo_usu,:telefono_usu)');
				$consulta_insert->execute(array(
					':nombre_usu' =>$nombre_usu,
					':apellido_usu' =>$apellido_usu,
					':correo_usu' =>$correo_usu,
					':telefono_usu' =>$telefono_usu
				));
				header('Location: indexc.php');
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
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="contenedor">
		<br><h1><br>AGREGAR CLIENTE</h1><br>
		<form action="" method="post">
			<h4>Nombre</h4>
			<div class="form-group">
				<input type="text" name="nombre_usu" placeholder="Nombre" class="input__text">
			</div>
			<h4>Apellido</h4>
			<div class="form-group">
				<input type="text" name="apellido_usu" placeholder="Apellidos" class="input__text">
			</div>
			<h4>Correo</h4>
			<div class="form-group">
				<input type="text" name="correo_usu" placeholder="Correo" class="input__text">
			</div>
			<h4>Telefono</h4>
			<div class="form-group">
				<input type="text" name="telefono_usu" placeholder="Teléfono" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexc.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>