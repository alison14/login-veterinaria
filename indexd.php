<?php
	include_once 'conexion.php';

	$sentencia_select=$conexion->prepare('SELECT *FROM mascota ORDER BY id_mascota DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conexion->prepare('
			SELECT *FROM mascota WHERE nombre_masco LIKE :campo OR tipo_mascota LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/estilos.css">

</head>
<body>
	<div class="contenedor">

		<h1>MASCOTAS</h1>
		<center>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar Mascota" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar" style="background-color:#F74358;">
				<a href="insertm.php" class="btn btn__nuevo" style="background-color:#DAF7A6;">Nuevo</a>
			</form>
		</div>
		</center>
		<center>
		<table>
			<tr class="head">
				<td style="background-color:#026FEA;">ID</td>
				<td style="background-color:#026FEA;">ID Cliente</td>
				<td style="background-color:#026FEA;">Nombre</td>
				<td style="background-color:#026FEA;">Tipo Mascota</td>
				<td style="background-color:#026FEA;">Raza</td>
				<td style="background-color:#026FEA;">Color</td>
				<td colspan="2" style="background-color:#026FEA;">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id_mascota']; ?></td>
					<td><?php echo $fila['id_usuario']; ?></td>
					<td><?php echo $fila['nombre_masco']; ?></td>
					<td><?php echo $fila['tipo_mascota']; ?></td>
					<td><?php echo $fila['raza']; ?></td>
					<td><?php echo $fila['color']; ?></td>
					<td><a href="updatem.php?id_mascota=<?php echo $fila['id_mascota']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="deletem.php?id_mascota=<?php echo $fila['id_mascota']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
		</center>
		<center>
			<br><a class="btn btn-warning" href="principal.php" role="button">Volver</a><br><br>
		</center>
		
		
	</div>
</body> 
</html>