<?php
include "../Conexion.php";
function RetornaTicketDeUsuario($Idusuario)
{
	global $Conexion;
	$sql="CALL RetornaTicketDeUsuario($Idusuario);";
	$Tickets=$Conexion->query($sql);
	$Conexion->next_result();
	if($Tickets)
		{
			return $Tickets;

		}
	else
	return NULL;
}

function InformacionUsuario($IdUsuario)
{
	global $Conexion;
	$sql="call InformacionUsuario($IdUsuario)";
	if($Resultado=$Conexion->query($sql))
	{
		$Conexion->next_result();
		while ($fila=mysqli_fetch_row($Resultado)) {
			return $fila;
		}
	}

	return false;
}

?>