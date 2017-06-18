<?php 
include '../Conexion.php';
session_start();
$IdUsuario= $_POST["IdUsuario"];
$IdTicket= $_POST["IdTicket"];
$sql="call EliminaTicket($IdTicket);";
echo $sql;
$Conexion->query($sql);
$Conexion->next_result();
header("Location:../HTML/Ticket.php");

 ?>