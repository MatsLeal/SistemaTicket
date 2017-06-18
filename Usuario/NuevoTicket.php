<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../HTML/css/bootstrap.min.css">
	<link rel="stylesheet" href="../HTML/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="../HTML/css/master.css">
</head>
<body>
	<!-- Barra lateral de navegación. No tocar, es frágil. :( -->
	<header>
		<menu>
		<?php
			session_start();
			include "../Usuario/Usuario.php";
			 $IdUsuario= $_SESSION["IdUsuario"];
			 if(!$IdUsuario)
			 	{
 					header("Location: ../index.php");
 				}
 			$InfoUsuario=InformacionUsuario($IdUsuario);
 		echo "
			<menuitem>$InfoUsuario[0]</menuitem>
			<menuitem>$InfoUsuario[1]</menuitem>
			<menuitem class='right'><a href='../index.php'><i class='fa fa-sign-out fa-lg'></i>Salir</a></menuitem>
			";
			?>
		</menu>
	</header>
	<!-- Contenido de la página -->
	<section class="user container">
		<h1 class="page-header">Generar nuevo ticket</h1>
		<div class="ticket">
			<!-- Agregar enlace para envíar el formulario -->
			<form action="../Ticket/AgregaTicket.php" method="post" enctype="multipart/form-data">
				<div class="message">
					<!-- Agregar nombre del área de texto -->
					<textarea name="descripcion" id="" cols="1" rows="1" class="form-control" placeholder="Breve Descripcion" required></textarea>
					<textarea name="mensaje" id="" cols="30" rows="10" class="form-control" placeholder="Mensaje completo del Ticket" required></textarea>
				</div>
				<input type="file" name="fileToUpload" id="fileToUpload">
				<div class="leave-comment"><button class="btn btn-lg">Enviar ticket</button></div>
			</form>
		</div>
	</section>
</body>
</html>