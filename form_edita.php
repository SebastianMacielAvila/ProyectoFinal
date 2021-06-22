<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Formulario de edición de los libros</title>
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
//Consulta de los datos del libro con ese ID, para mostrarlos en el formulario.
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=Evolution") or die (pg_last_error());
if($con){
	$query = "select l.titulo_libro,l.edicion_libro,a.id_autor,a.nombre_autor,a.apepaterno_autor,a.apematerno_autor,e.id_editorial,e.nombre_editorial from libro as l INNER JOIN autor as a ON l.id_autor= a.id_autor INNER JOIN editorial as e ON l.id_editorial= e.id_editorial where id_libro='".$id."'";
	$query = pg_query($con,$query);
	$resultado = pg_fetch_assoc($query);
	//print_r($resultado);
?>
		<h1>Formulario de actualización de libros</h1>
		<p>Por favor ingrese los siguientes datos para registrar los libros:</p>
		<form name="editar" action="guarda_edicion.php" method="post">
			<label for="titulo">Titulo: </label>
			<input type="text" name="titulo" value="<?php echo $resultado['titulo_libro']; ?>"><br/>
			<label for="edicion">Edición: </label>
			<input type="text" name="edicion" value="<?php echo $resultado['edicion_libro']; ?>"><br/>
			<label for="id_autor">Id Autor: </label>
			<input type="text" name="id_autor" value="<?php echo $resultado['id_autor']; ?>"><br/>
			<label for="id_editorial">Id Editorial: </label>
			<input type="text" name="id_editorial" value="<?php echo $resultado['id_editorial']; ?>"><br/>
			<input type="hidden" name="id" value="<?php echo $id; ?>"><br/>	
			<input type="submit" value="Enviar">
		</form>
<?php
	}
}
else{
	header('Location: ingreso.php');	
}
?>
	</body>
</html>
			
