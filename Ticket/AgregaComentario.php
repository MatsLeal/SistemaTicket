<?php
include '../Conexion.php';
session_start();
$IdUsuario= $_POST["IdUsuario"];
$IdTicket= $_POST["IdTicket"];
$Comentario= $_POST["comment"];
//$_SESSION["IdUsuario"]=$IdUsuario;
//$_SESSION["IdTicket"]=$IdTicket;
$sql="INSERT INTO Comentario values(null,$IdTicket,'$Comentario',curdate(),$IdUsuario)";
$Conexion->query($sql);
$_SESSION["IdTicket"]=$IdTicket;
header("Location:../HTML/TicketEnEspecifico.php");




?>