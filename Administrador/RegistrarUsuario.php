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
echo $corre=$_POST["correo"];
$sql='
call AltaUsuario("$name","$lastname","$username","$password","$Estado","$department","$correo") |
';
$Conexion->query($sql);
header("Location:../HTML/RegistrarUsuario.php");


?>