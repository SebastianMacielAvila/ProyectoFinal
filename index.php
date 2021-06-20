<!DOCTYPE HTML>
<html>
	<body bgcolor="black">
	<font color="lime">
</html>
<?php
//index.php nombre de la página, tabla con los libros ordenados por autor empezando por apellido paterno, con enlace para editar o eliminar los libros.

//Abrir conexión al manejador de BD
$con = pg_connect("port=5432 dbname=biblioteca user=bibliotecario password=Evolution") or die (pg_last_error());
if($con){
	//Generar consulta
	$query ="select l.id_libro,l.titulo_libro,l.edicion_libro,a.nombre_autor,a.apepaterno_autor,a.apematerno_autor,e.nombre_editorial from libro as l INNER JOIN autor as a ON l.id_autor= a.id_autor INNER JOIN editorial as e ON l.id_editorial = e.id_editorial order by apepaterno_autor asc";
	$query = pg_query($con,$query) or die (pg_last_error());
	if($query){
		echo "<p>Lista de libros:</p>";
?>
<table>
	<thead>
		<tr>
			<th>ID</th>		
			<th>Titulo</th>
			<th>Edicion</th>
			<th>Nombre Autor</th>
			<th>Apellido Paterno Autor</th>
			<th>Apellido Materno Autor</th>
			<th>Editorial</th>
		</tr>
	</thead>
	<tbody>
<?php
	while($row = pg_fetch_array($query)){
		echo "<tr>";
		echo "<td>".$row['id_libro']."</td>";		
		echo "<td>".$row['titulo_libro']."</td>";
		echo "<td>".$row['edicion_libro']."</td>";		
		echo "<td>".$row['nombre_autor']."</td>";		
		echo "<td>".$row['apepaterno_autor']."</td>";		
		echo "<td>".$row['apematerno_autor']."</td>";		
		echo "<td>".$row['nombre_editorial']."</td>";
		echo "<td><a href='form_edita.php?id=".$row['id_libro']."' style='color:orange;'>Editar registro</a></td>";
		echo "<td><a href='form_elimina.php?id=".$row['id_libro']."' style='color:red;'>Eliminar registro</a></td>";
		echo "</tr>";
	}
?>
	</tbody>
</table>
<?php
		echo "<a href='creditos.php' style='color:aqua;'>Ver créditos</a><br/>";
	}
	else{
		echo "No se puede ejecutar la sentencia SQL";
	}
}
else{
	echo "Hubo un error al intentar conectar";
}
?>
