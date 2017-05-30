<?php
include '../Conexion.php';
function RetornaTicket($IdTicket)
{
$sql="call RetornaTicketEspecifico($IdTicket)";
//echo $sql."<br>";
global $Conexion;
$Ticket=$Conexion->query($sql);
$Conexion->next_result();
if($Ticket)
	return $Ticket;
else 
	return false;
}

function RetornaComentarios($IdTicket)
{
$sql="call RetornaComentarioTicketEspecifico($IdTicket)";
global $Conexion;
$Comentarios=$Conexion->query($sql);
$Conexion->next_result();
if($Comentarios)
	return $Comentarios;
else
	return false;
}

?>