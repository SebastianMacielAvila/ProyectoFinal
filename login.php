<!DOCTYPE HTML>
<html>
	<body bgcolor="black">
	<font color="lime">
</html>
<?php
include "conexionbd.php";
//Recibir usuario y contraseña:
$usuario = $_POST['nombre'];
$pass = $_POST['pass'];
$pass_cifrado = md5($pass);
//echo "El usuario: ".$usuario;
//echo "El hash: ".$pass_cifrado;
//Comparar con los valores existentes en BD:
$query = "select username_usuario,pass_usuario from usuarios where username_usuario='".$usuario."'";
//echo "La query: ".$query; 
$query = pg_query($con,$query);
$resultado = pg_fetch_assoc($query);
//var_dump($resultado);
//Comparación de lo que llega vs BD:
//echo "El pass almacenado: ".$resultado['pass_usuario'];
if($pass_cifrado == $resultado['pass_usuario']){
	//echo "Si coinciden";
	session_start();
	$_SESSION['auth']=true;
	//$_SESSION['count']='';
	header('Location: form_libros.php');
}
else{
	//echo "Hubo un error o no coinciden";
	header('Location: ingreso.php?login=false');
}
?>
