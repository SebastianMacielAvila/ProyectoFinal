<!DOCTYPE HTML>
<html>
	<body bgcolor="black">
	<font color="lime">
</html>
<?php
/*alta.php
 *Recibe los datos de form_libros.php, los procesa e inserta en la BD.
 */
//Recibe los datos:
//print_r($_POST);
//$id =$_POST['id_libro'];
$titulo =$_POST['titulo'];
$edicion =$_POST['edicion'];
$id_autor =$_POST['id_autor'];
$id_editorial =$_POST['id_editorial'];
//$editorial =$_POST['nombre_editorial'];
//$nombre =$_POST['nombre_autor'];
//$apepaterno =$_POST['apepaterno_autor'];
//$apematerno =$_POST['apematerno_autor'];
//Abrir conexión al manejador:
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=Evolution") or die (pg_last_error());
if($con){
	//echo "se abre la conexión a la BD";
	//Genera la consulta:
	$query ="insert into libro (titulo_libro,edicion_libro,id_autor,id_editorial)values('".$titulo."','".$edicion."','".$id_autor."','".$id_editorial."')";
	$query = pg_query($con,$query) or die (pg_last_error());
	if($query){
		echo "<p>Se registro el libro</p>";
		echo "<a href='index.php' style='color:orange;'>Volver al inicio</a><br/>";
		echo "<a href='form_libros.php' style='color:aqua;'>Volver al formulario de registro</a>";
	}
	else{
		echo "No se pudo ejecutar la sentencia SQL";
	}
}
else{
	echo "Hubo un error al intentar conectar";
}
?>
