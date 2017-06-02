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
			<menuitem>Username</menuitem>
			<menuitem>username@mail.com</menuitem>
			<menuitem class="right"><a href="#"><i class="fa fa-sign-out fa-lg"></i>Salir</a></menuitem>
			<menuitem class="right" style="border-right: 1px solid rgb(150, 150, 150);"><a href="UsarSistema.php"><i class="fa fa-arrow-left fa-lg"></i> Regresar</a></menuitem>
		</menu>
	</header>
	<!-- Contenido de la página -->
	<section class="user container">
		<h1 class="page-header">Generar nuevo ticket</h1>
		<div class="ticket">
			<!-- Agregar enlace para envíar el formulario -->
			<form action="#" method="post">
				<div class="message">
					<!-- Agregar nombre del área de texto -->
					<textarea name="[]" id="" cols="30" rows="10" class="form-control"></textarea>
				</div>
				<div class="leave-comment"><button class="btn btn-lg">Enviar ticket</button></div>
			</form>
		</div>
	</section>
</body>
</html>