<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Formulario de eliminación de libros</title>
		<body bgcolor="black">
		<font color="lime">
	</head>
	<body>
<?php
//Recibir el valor que viaja en la URL
session_start();
if($_SESSION['auth'] == true){
$id = $_GET['id'];
//echo "El id del libro es: ".$id;
echo "IMPORTANTE: Una vez que el registro sea borrado, no se podrá recuperar, favor de verificar que el registro a eliminar sea el correcto.";
//Consulta de los datos del libro con ese ID, para mostrarlos en el formulario.
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=Evolution") or die (pg_last_error());
if($con){
	$query = "select l.id_libro,l.titulo_libro,l.edicion_libro,a.nombre_autor,a.apepaterno_autor,a.apematerno_autor,e.nombre_editorial from libro as l INNER JOIN autor as a ON l.id_autor= a.id_autor INNER JOIN editorial as e ON l.id_editorial = e.id_editorial where id_libro='".$id."'";
	$query = pg_query($con,$query);
	$resultado = pg_fetch_assoc($query);
	//print_r($resultado);
?>
<table>
	<tr>
		<th>Id Libro</th>
		<th>Título</th>
		<th>Edición</th>
		<th>Nombre Autor</th>
		<th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		<th>Nombre Editorial</th>
	</tr>
	<tr>
		<td><?php echo $resultado['id_libro']; ?></td>
		<td><?php echo $resultado['titulo_libro']; ?></td>
		<td><?php echo $resultado['edicion_libro']; ?></td>
		<td><?php echo $resultado['nombre_autor']; ?></td>
		<td><?php echo $resultado['apepaterno_autor']; ?></td>
		<td><?php echo $resultado['apematerno_autor']; ?></td>
		<td><?php echo $resultado['nombre_editorial']; ?></td>
	</tr>
</table>
	<form name="eliminar" action="elimina_libro.php" method="post">
	<input type="hidden" value="<?php echo $id; ?>" name="id">
	<input type="submit" value="Eliminar registro">
	</form>
	</body>
<?php
	}
}
else{
	header('Location: ingreso.php');	
}
?>
</html>

