<?php
include '../Conexion.php';
echo $IdUsuario=$_POST["IdUsuario"];
echo $IdTicket=$_POST["IdTicket"];
echo $Estado=$_POST["Estado"];
    $Conexion->next_result();
    $sql="
 		select Estado.IdEstado  FROM  Estado,Ticket
		where Ticket.IdTicket=$IdTicket
		and  Estado.descripcion='$Estado'   
    ";
    echo $sql."<br>";
    $Resultado=$Conexion->query($sql);
    while($fila=mysqli_fetch_row($Resultado))
    {
    	    $sql="UPDATE Ticket 
    	set Ticket.IdEstado=$fila[0]
    		where Ticket.IdTicket=".$IdTicket;
    }
    echo $sql;
    $Conexion->query($sql);
    session_start();
    $_SESSION["IdUsuario"]=$IdUsuario;
    $_SESSION["IdTicket"]=$IdTicket;
    header("Location:../HTML/TicketEnEspecifico.php");



?>