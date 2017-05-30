<?php
include "ActividadAdministrador.php";
include '../Conexion.php';
//Session variables reception and operation
session_start();
$IdUsuario= $_SESSION["IdUsuario"];
if(!$IdUsuario)
header("Location:../index.php");




header("Location:../HTML/Ticket.php");


$InformacionUsuario=InformacionUsuario($IdUsuario,$Conexion);
$i=0;

while ($fila=mysqli_fetch_row($InformacionUsuario)) {
	echo $fila[0];
}

$Tickets=RetornaTodosLosTickets($Conexion);


echo "<br>";
while ($fila=mysqli_fetch_row($Tickets)) {
	$i=0;
	while ($fila[$i]!=NULL) {
		echo $fila[$i];
		$i++;
	}
	echo "<br>";
	
}









?>