<?php
session_start();
//comparar $_SESSION['id'] vs BD-Sesiones:
//$_SESSION['count'] += 1;
if($_SESSION['auth'] == true){
//$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=Evolution")or die(pg_last_error());
//if($con){
	//$query = "select l.id_libro,a.id_autor,a.nombre_autor,a.apepaterno_autor,a.apematerno_autor,e.id_editorial,e.nombre_editorial from libro as l INNER JOIN autor as a ON l.id_autor= a.id_autor INNER JOIN editorial as e ON l.id_editorial= e.id_editorial order by apepaterno_autor asc";
	//$query = pg_query($con,$query) or die(pg_last_error());
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Formulario de libros</title>
		<body bgcolor="black">
		<font color="lime">
	</head>
	<body>
		<h1>Formulario de alta de libros</h1>
		<p>Por favor ingrese los siguientes datos para registrar los libros:</p>
		<form name="alta "action="alta.php" method="post">
			<label for="titulo">Titulo: </label>
			<input type="text" name="titulo"><br/>
			<label for="edicion">Edición: </label>
			<input type="text" name="edicion"><br/>
			<label for="id_autor">Id Autor: </label>
			<input type="text" name="id_autor"><br/>
			<label for="id_editorial">Id Editorial: </label>
			<input type="text" name="id_editorial"><br/>
			<input type="submit" value="Enviar">
		</form>
</body>
</html>
<?php
/*	while($row=pg_fetch_array($query)){
		echo "<tr>";
		echo "<td>".$row['id_autor']."</td>";
		echo "<td>".$row['nombre_autor']."</td>";
		echo "<td>".$row['apepaterno_autor']."</td>";
		echo "<td>".$row['apematerno_autor']."</td>";
		echo "<td>".$row['id_editorial']."</td>";
		echo "<td>".$row['nombre_editorial']."</td>";
	}*/
}
else{
	header('Location: ingreso.php');
}
?>
