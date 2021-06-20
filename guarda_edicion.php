<!DOCTYPE HTML>
<html>
	<body bgcolor="black">
	<font color="lime">
</html>
<?php
/*guarda_edicion.php
 *Recibe los datos de form_edita.php, los procesa e inserta en la BD.
 */
//Recibe los datos:
//print_r($_POST);
$id = $_POST['id'];
$titulo =$_POST['titulo'];
$edicion =$_POST['edicion'];
$id_autor =$_POST['id_autor'];
$id_editorial =$_POST['id_editorial'];
//$editorial =$_POST['editorial'];
//$nombre =$_POST['nombre'];
//$apepaterno =$_POST['apepaterno'];
//$apematerno =$_POST['apematerno'];
//Abrir conexión al manejador:
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=Evolution") or die (pg_last_error());
if($con){
	//echo "se abre la conexión a la BD";
	//Genera la consulta de actualización de datos:
	$query ="update libro set titulo_libro='".$titulo."',edicion_libro='".$edicion."',id_autor='".$id_autor."',id_editorial='".$id_editorial."'  where id_libro='".$id."'";
	$query = pg_query($con,$query) or die (pg_last_error());
	if($query){
		echo "<p>Se actualizó el registro de los libros</p>";
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
