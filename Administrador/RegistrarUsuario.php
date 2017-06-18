<?php
include '../Conexion.php';
session_start();
echo $_SESSION["IdUsuario"]; 
if(!$_SESSION["IdUsuario"])
 header("../index.php");


echo $username=$_POST["username"];
echo $name=$_POST["name"];
echo $lastname=$_POST["lastname"];
echo $password=$_POST["password"];
echo $Estado=$_POST["Estado"];
echo $department=$_POST["department"];
echo $usertype=$_POST["usertype"];
echo $correo=$_POST["correo"];
$sql="
call AltaUsuario('$name','$lastname','$username','$password','$Estado','$department','$correo') ;";
$Conexion->query($sql);
$Conexion->next_result();
echo $sql;
if($usertype=="Administrador")
	{
		$sql="select Usuario.IdUsuario from Usuario where correo='$correo'";
		$Result=$Conexion->query($sql);
		while($row=mysqli_fetch_row($Result))
		{
			$IdUsuarioAgrega=$row[0];
		}

	$sql="INSERT INTO Administrador VALUES ($IdUsuarioAgrega)";
	$Conexion->query($sql);
	echo "<br>".$sql;
	}
header("Location:../HTML/RegistrarUsuario.php");


?>