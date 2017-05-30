<?php 
include "../Conexion.php";

function UsuarioExiste($NombreUsuario,$Contrasena,$Conexion)
{
	$sql="Call UsuarioExiste('$NombreUsuario','$Contrasena'); ";
	if($Resultado=$Conexion->query($sql)) //Si la conuslta se generó con éxito
		 {
		 	$Conexion->next_result();//Permite seguir ejecutando procedimientos almacenados
		 	while ($row=mysqli_fetch_row($Resultado)) { //Verificamos que exista un contenido en la tabla
		 		$Resultado->close();//Cerramos el resultado
		 		RETURN $IdUsuario=$row[0];
		 	}
		 }
		 else
		 {
		 	$Conexion->next_result();
		 	$Resultado->close();
		 	return NULL;
		 }

}

function UsuarioEsAdministrador($IdUsuario,$Conexion)
{

		$sql="call UsuarioEsAdministrador($IdUsuario);";
		if($Resultado=$Conexion->query($sql)) //SI la conuslta se generó con éxito
			 {
			 	$Conexion->next_result();
			 	while ($row=mysqli_fetch_row($Resultado)) 
				 	{ 
				 		RETURN true;
				 	}
			 }
		 else
			 {
			 	$Conexion->next_result();
			 	$Resultado->close();
			 	return false;
			 }

}


?>