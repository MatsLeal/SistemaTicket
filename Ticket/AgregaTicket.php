<?php
include "../Conexion.php";
session_start();
$IdUsuario=$_SESSION["IdUsuario"];
if(!$IdUsuario)
	{
		header("Location:../index.php");
	}
$sql="CALL NUEVOTICKET($IdUsuario,'".$_POST["descripcion"]."','".$_POST["mensaje"]."');";
echo $sql;
$Conexion->query($sql);
$Conexion->next_result();

$sql="select Ticket.IdTicket from Ticket order by IdTicket desc limit 1";
$Resultado=$Conexion->query($sql);
while($row=mysqli_fetch_row($Resultado))
{
	$idticket=$row[0];
}
$target_dir = "../documentos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql="update  Ticket set RutaArchivo='".$target_file."' where IdTicket=".$idticket;
        echo $sql;
        $Conexion->query($sql);
        $Conexion->next_result();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

header("Location:../Usuario/UsarSistema.php");





?>