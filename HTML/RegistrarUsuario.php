<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="css/master.css">
</head>
<body>
	<!-- Barra lateral de navegación. No tocar, es frágil. :( -->
	<nav class="closed" id="navigationBar">
		<div class="control"><i class="fa fa-bars fa-2x" id="navButton"></i></div>
		<ul class="user-info">
			<li><i class="fa fa-user fa-lg"></i><p>Username</p></li><!-- Nombre de usuario de la sesión actual -->
			<li><i class="fa fa-envelope fa-lg"></i><p>username@mail.com</p></li><!-- Correo electrónico de la seción actual -->
		</ul>
		<ul class="nav-bar">
			<li><a href="DashBoard.php"><i class="fa fa-home fa-lg"></i><p>Inicio</p></a></li>
			<li><a href="Ticket.php"><i class="fa fa-ticket fa-lg"></i><p>Tickets</p></a></li>
			<li class="active"><a href="#"><i class="fa fa-user-plus fa-lg"></i><p>Registrar usuario</p></a></li>
		</ul>
		<ul class="nav-bar bottom">
			<!-- Agregar enlace para salir/cerrar sesión -->
			<li><a href="#"><i class="fa fa-sign-out fa-lg"></i>Salir</a></li>
		</ul>
	</nav>
	<!-- Contenido de la página -->
	<section class="container">
		<h1 class="page-header">Registrar usuario</h1>
		<!-- Agregar enlace para envíar el formulario -->
		<form action="../Administrador/RegistrarUsuario.php" method="post">
			<!--

			Nombre de cada campo en orden de aparición:
				1.- username
				2.- name
				3.- lastname
				4.- password
				5.- passwordConfirm
				6.- department

			Falta hacer la validación de contraseña.

			-->
			<label for="#username">Nombre de usuario:</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
				<input type="text" class="form-control" id="username" name="username" required>
			</div>
			<label for="#name">Nombre(s):</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
			<label for="#lastname">Apellidos:</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
				<input type="text" class="form-control" id="lastname" name="lastname" required>
			</div>

			<label for="#mail">Correo:</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
				<input type="text" class="form-control" id="correo" name="correo" required>
			</div>

			<label for="#password">Contraseña:</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>
			<label for="#passwordConfirm">Contraseña:</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
				<input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" required>
			</div>
			<label for="#Estado">Estado:</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
				<input type="text" class="form-control" id="Estado" name="Estado" required>
			</div>
			<label for="#department">Departamento:</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
				<select name="department" id="department" name="department" class="form-control">
					<?php 
					include '../Conexion.php';
					session_start();
					echo $_SESSION["IdUsuario"]."-----------------------------------";
					if(!$_SESSION["IdUsuario"])
						header("Location:index.html");
					$Conexion->next_result();
					$Resultado=$Conexion->query("call RetornaDepartamento()");
					while($fila=mysqli_fetch_row($Resultado))
					{
						echo "<option >".$fila[0]."</option>";
					}
					?>
					
				</select>
			</div>
			<label for="#usertype">Tipo de Usuario:</label>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
				<select name="usertype" id="usertype" class="form-control">
					<option>Administrador</option>
					<option>Usuario</option>
				</select>
			</div>

			<br>
			<button class="btn btn-block">Registrar usuario</button>
		</form>
	</section>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="js/master.js"></script>>
</body>
</html>