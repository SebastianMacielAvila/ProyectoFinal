<!DOCTYPE HTML>
<html>
	<body bgcolor="black">
	<font color="lime">
</html>
<?php
$id=$_POST['id'];
//echo "id_libro: ".$id;
//$eliminar=$_POST['eliminar'];
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=Evolution") or die (pg_last_error());
if($con){
		$query ="delete from libro where id_libro=".$id."";
		//echo "Consulta: ".$query;
		$query = pg_query($con,$query)or die(pg_last_error());
		if($query){
			echo "<p>Se eliminó el registro del libro</p>";
			echo "<a href='index.php' style='color:orange;'>Volver al inicio</a><br/>";
			echo "<a href='form_libros.php' style='color:aqua;'>Volver al formulario de registro</a>";
		}
		else{
			echo "No se pudo ejecutar la sentencia de SQL";
		}
	}
else{
	echo "Hubo un error al intentar conectar";
}
?>
