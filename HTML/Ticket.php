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
			<li><a href="DashBoard.html"><i class="fa fa-home fa-lg"></i><p>Inicio</p></a></li>
			<li class="active"><a href="#"><i class="fa fa-ticket fa-lg"></i><p>Tickets</p></a></li>
			<li><a href="RegistrarUsuario.php"><i class="fa fa-user-plus fa-lg"></i><p>Registrar usuario</p></a></li>
		</ul>
		<ul class="nav-bar bottom">
			<!-- Agregar enlace para salir/cerrar sesión -->
			<li><a href="#"><i class="fa fa-sign-out fa-lg"></i>Salir</a></li>
		</ul>
	</nav>
	<!-- Contenido de la página -->
	<section class="container">
		<div class="tickets-panel">
			<!-- 

			Cada ticket está dentro de un div con la clase "ticket". Dentro de cada uno de estos hay:
				> Un div con dos clases, este es para indicar el estado. La primera clase es "state"
				  y la segunda puede ser una de las siguientes:
					>> "danger": color rojo.
					>> "warning": color amarillo.
					>> "success": color verde.
				> Un div clase "email" para poner el correo electrónico de quien generó el ticket.
				> Un div clase "brief-description" para poner un fragmento del mensaje de ticket. La
				  extensión de dicho fragmento lo dejo a tu consideración, principalmente porque sería
				  más sencillo "fragmentar" el mensaje desde PHP que con CSS/JS/JQuery.
				> Un enlace (a) que abre en una nueva pestaña la página del ticket seleccionado.

				Código sin texto extra de cada ticket:

				<div class="ticket">
					<div class="state []"></div>
					<div class="info">
						<div class="username">[]</div>
						<div class="email">[]</div>
						<div class="brief-description">[]</div>
					</div>
					<a href="TicketEnEspecifico.html" target="_blank" class="btn btn-block">Ver Completo</a>
				</div>

			 -->
			 <?php
			 include "../Administrador/ActividadAdministrador.php";
			 include '../Conexion.php';
			 	session_start();
			 	$IdUsuario= $_SESSION["IdUsuario"];
			 	$InformacionUsuario=InformacionUsuario($IdUsuario,$Conexion);
			 	$Tickets=RetornaTodosLosTickets($Conexion);
			 	while ($ticket=mysqli_fetch_row($Tickets)) {
			 		$i=0;
			 		echo 
			 		'
			 		<div class="ticket">
				<div class=';
				if(strcmp($ticket[2],"Abierto")==0)
					echo "'state warning'";
				if(strcmp($ticket[2],"Pendiente")==0)
					echo "'state danger'";
				if(strcmp($ticket[2],"Cerrado")==0)
					echo "'state success'";

				echo 
				'></div>
				<div class="info">
					<div class="username">'.$ticket[1].'</div>
					<div class="email">'.$ticket[3].'</div>
					<div class="brief-description">'.$ticket[4].'</div>
				</div>
				
				<form action=TicketEnEspecifico.php method="POST">
				<input type="hidden" name="IdTicket" value="'; echo $ticket[0] ; echo '">
				<input type="hidden" name="IdUsuario" value="'; echo $IdUsuario ; echo '">
				<input type="submit" value="Ver Completo">
				</input>
				</form>
			</div>
			 		';
			 		while($ticket[$i]!=NULL)
			 			{
			 			echo $ticket[$i];
			 			$i++;
			 			}
			 		
			 	}
	


			 ?>
		</div>
	</section>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="js/master.js"></script>>
</body>
</html>