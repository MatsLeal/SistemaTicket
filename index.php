<?php 

header("Location:HTML/index.html");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Prueba</title>
</head>
<body>

<form action="InicioSesion/InicioSesion.php" method="POST">
<input type="text" name="NombreUsuario">
<input type="password" name="Contrasena">
	<input type="submit" name="" value="Iniciar Sesion">
</form>
</body>
</html>
<?php

$error=$_GET["error"];
if($error=="nc")
echo "No conectado";
if($error=="nr")
echo "No registrado";

?>
