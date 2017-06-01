
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="Ticket";
$Conexion = new mysqli($servername, $username, $password,$db);
if ($Conexion->connect_error) {
     die("Connection failed: " . $Conexion->connect_error);
}
echo "Connected successfully";
?> 
