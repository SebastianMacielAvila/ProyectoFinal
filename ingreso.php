<html>
<head>
<font color="lime">
<h1>Inicio de sesión</h1>
</head
<body>
<?php
//$login = $_GET['login'];
//if($login == false){
//	echo "El usuario o el password son incorrectos";
//}
//else{
?>
	<body bgcolor="black">
	<font color="lime">
	<form name="login" action="login.php" method="post">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre"></br>
		<label for="pass">Contraseña:</label>
		<input type="password" name="pass"></br>
		<input type="submit" name="Enviar" value="Enviar">
	</form>
<?php
//}
?>
</body>
</html>
