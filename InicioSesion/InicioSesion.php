<?php
include "ActividadInicioSesion.php";

$NombreUsuario=$_POST["NombreUsuario"];
$Contrasena=$_POST["Contrasena"];

$IdUsuario=UsuarioExiste($NombreUsuario,$Contrasena,$Conexion);
 if($IdUsuario!=NULL)
 	{
 		echo "<br>Usuario está registrado<br>";
 		session_start();
  		$_SESSION["IdUsuario"]=$IdUsuario;
 		if(UsuarioEsAdministrador($IdUsuario,$Conexion))
 			header("Location:../Administrador/AdministrarSistema.php");
 		else
 			header("Location:../Usuario/UsarSistema.php");

 	}
else
echo header("Location:../index.php?error=nr");

?>