<?php
function InformacionUsuario($IdUsuario,$Conexion)
{
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

function RetornaTodosLosTickets($Conexion)
{

	$sql="call RetornaTodosLosTickets()";
	if($Tickets=$Conexion->query($sql))
	{
		$Conexion->next_result();
		return $Tickets;
	}
	return false;
}






?>