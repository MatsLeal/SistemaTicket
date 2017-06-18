<?php
include '../Conexion.php';

function RetornaPorcentajeEstadoTicketBarra()
{
	global $Conexion;
	$data="data: [";
	$sql="call RetornaPorcentajeEstadoTicket()";
	$Porcentajes=$Conexion->query($sql);
	$i=0;
	while ($fila=mysqli_fetch_row($Porcentajes) ) {
		$data=$data.($fila[0]*100);
		if($i<4)
			$data=$data.",";
		$i++;
	}
	$data=$data."],";
	$Conexion->next_result();
	return $data;
}

function RetornaPorcentajeEstadoTicket()
{
	global $Conexion;
	$data="data: [";
	$sql="call RetornaPorcentajeEstadoTicket()";
	$Porcentajes=$Conexion->query($sql);
	$i=0;
	while ($i<4) {
		$fila=mysqli_fetch_row($Porcentajes) ;
		$data=$data.($fila[0]*100);
		if($i<3)
			$data=$data.",";
		$i++;
	}
	$data=$data."],";
	$Conexion->next_result();
	return $data;
}


?>