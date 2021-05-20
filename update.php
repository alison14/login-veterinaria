<?php
	include_once 'conexion.php';

	if(isset($_GET['id_usuario'])){
		$id_usuario=(int) $_GET['id_usuario'];

		$buscar_id=$conexion->prepare('SELECT * FROM usuario WHERE id_usuario=:id_usuario LIMIT 1');
		$buscar_id->execute(array(
			':id_usuario'=>$id_usuario
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: indexc.php');
	}


	if(isset($_POST['guardar'])){
		$nombre_usu=$_POST['nombre_usu'];
		$apellido_usu=$_POST['apellido_usu'];
		$correo_usu=$_POST['correo_usu'];
		$telefono_usu=$_POST['telefono_usu'];
		$id_usuario=(int) $_GET['id_usuario'];

		if(!empty($nombre_usu) && !empty($apellido_usu) && !empty($correo_usu) && !empty($telefono_usu) ){
			if(!filter_var($correo_usu,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo_usu no valido');</script>";
			}else{
				$consulta_update=$conexion->prepare(' UPDATE usuario SET  
					nombre_usu=:nombre_usu,
					apellido_usu=:apellido_usu,
					correo_usu=:correo_usu,
					telefono_usu=:telefono_usu
					WHERE id_usuario=:id_usuario;'
				);
				$consulta_update->execute(array(
					':nombre_usu' =>$nombre_usu,
					':apellido_usu' =>$apellido_usu,
					':correo_usu' =>$correo_usu,
					':telefono_usu' =>$telefono_usu,
					':id_usuario' =>$id_usuario
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
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	
	<div class="contenedor">
		<h1>EDITAR CLIENTE</h1>
		<form action="" method="post">
			<h4>Nombre</h4>
			<div class="form-group">
				<input type="text" name="nombre_usu" value="<?php if($resultado) echo $resultado['nombre_usu']; ?>" class="input__text">
			</div>
			<h4>Apellido</h4>
			<div class="form-group">
				<input type="text" name="apellido_usu" value="<?php if($resultado) echo $resultado['apellido_usu']; ?>" class="input__text">
			</div>
			<h4>Correo</h4>
			<div class="form-group">
				<input type="text" name="correo_usu" value="<?php if($resultado) echo $resultado['correo_usu']; ?>" class="input__text">
			</div>
			<h4>Telefono</h4>
			<div class="form-group">
				<input type="text" name="telefono_usu" value="<?php if($resultado) echo $resultado['telefono_usu']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="indexc.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
