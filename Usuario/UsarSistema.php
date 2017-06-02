<?php
session_start();
// echo $_SESSION["IdUsuario"];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>	Sistema Usuario</title>
	<link rel="stylesheet" href="../HTML/css/bootstrap.min.css">
	<link rel="stylesheet" href="../HTML/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="../HTML/css/master.css">
</head>
<body>
	<header>
		<menu>
			<menuitem>Username</menuitem>
			<menuitem>username@mail.com</menuitem>
			<menuitem class="right"><a href="#"><i class="fa fa-sign-out fa-lg"></i>Salir</a></menuitem>
		</menu>
	</header>
	<section class="user container">
		<div class="tickets-panel">
			<div class="ticket">
				<div class="state danger"></div>
				<div class="info">
					<div class="username">Username</div>
					<div class="email">username@domain.com</div>
					<div class="brief-description">
						Lorem ipsum dolor sit amet
					</div>
				</div>
				<a href="TicketEnEspecifico.php" class="btn btn-block">Ver Completo</a>
			</div>
			<div class="ticket">
				<div class="state warning"></div>
				<div class="info">
					<div class="username">Username</div>
					<div class="email">username@domain.com</div>
					<div class="brief-description">
						Lorem ipsum dolor sit amet
					</div>
				</div>
				<a href="TicketEnEspecifico.php" class="btn btn-block">Ver Completo</a>
			</div>
			<div class="ticket">
				<div class="state success"></div>
				<div class="info">
					<div class="username">Username</div>
					<div class="email">username@domain.com</div>
					<div class="brief-description">
						Lorem ipsum dolor sit amet
					</div>
				</div>
				<a href="TicketEnEspecifico.php" class="btn btn-block">Ver Completo</a>
			</div>
			<div class="add-ticket" onclick="location.href='NuevoTicket.php'">
				<i class="fa fa-plus fa-3x"></i>
			</div>
		</div>
	</section>
	<footer></footer>
</body>
</html>