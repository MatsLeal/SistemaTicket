<?php
include '../Conexion.php';

function RetornaPorcentajeEstadoTicket()
{
	global $Conexion;
	$data="data: [";
	$sql="call RetornaPorcentajeEstadoTicket()";
	$Porcentajes=$Conexion->query($sql);
	$i=0;
	while ($fila=mysqli_fetch_row($Porcentajes) ) {
		$data=$data.$fila[0]*3;
		if($i<4)
			$data=$data.",";

		$i++;
	}
	$data=$data."],";
	$Conexion->next_result();
	return $data;
}



?>