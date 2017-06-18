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
			<li ><a href="DashBoard.php"><i class="fa fa-home fa-lg"></i><p>Inicio</p></a></li>
			<li><a href="Ticket.php"><i class="fa fa-ticket fa-lg"></i><p>Tickets</p></a></li>
			<li><a href="RegistrarUsuario.php"><i class="fa fa-user-plus fa-lg"></i><p>Registrar usuario</p></a></li>
		</ul>
		<ul class="nav-bar bottom">
			<li><a href="#"><i class="fa fa-sign-out fa-lg"></i>Salir</a></li>
		</ul>
	</nav>
	<!-- Contenido de la página -->
	<section class="container">
		<div class="ticket">
			<!-- Agregar enlace para envíar el formulario -->
			<form action="../Ticket/AgregaComentario.php" method="post">
			<?php
			include '../Ticket/ActividadTicketEspecifico.php';
			include '../Conexion.php';
			session_start();
			echo $IdUsuario=$_SESSION["IdUsuario"];
			if(!$IdUsuario)
				header("Location:../index.php");
			$IdTicket=$_POST["IdTicket"];
			if(!$IdTicket)
			{
				$Id_Ticket=$_SESSION["IdTicket"];
			}
			if(!$IdTicket)
				$IdTicket=$_SESSION["IdTicket"];
			$Ticket=RetornaTicket($IdTicket);
			if(!$Ticket)
			{
				echo "Error";
			}
			echo "<script>
			function CambiaEstado()
			{
				var e = document.getElementById('EstadoSeleccionado');
				var strUser = e.options[e.selectedIndex].text;
				document.getElementById('Estado').value=strUser;
				var boton=document.getElementById('BotonCambioEstado');
				boton.click();

			}
			</script>
			";
			while($ticket=mysqli_fetch_row($Ticket))
			{
			echo '
			<h1 class="page-header">'.$ticket[1].'</h1><!-- Nombre de usuario de quien generó el ticket -->
				<!-- Cambia los valores del select -->
				<select name="estado" id="EstadoSeleccionado" onchange=javascript:CambiaEstado()><!-- Prioridad del ticket. Mantener esto en el valor actual del ticket en cuestión. -->
					<option value="baja" >'.$ticket[2].'</option>
					<option value="baja" >Abierto</option>
					<option value="baja" >Cerrado</option>
					<option value="baja" >Procesando</option>
					<option value="baja" >Pendiente</option>
					';

					echo '
				</select>
				<div class="info">
				';
				if($ticket[7]!="")
					echo '
					<label font-color="Blue">
					<a href="'.$ticket[7].'" target="_blank">Archivo</a><!-- Correo electrónico de quien generó el ticket -->
					</label>
					';
					echo '
					<p>'.$ticket[3].'</p><!-- ??? Venía en la documentación -->
				</div>
				<!-- Mensaje completo del ticket -->
				<div class="message">
				'.$ticket[4].'
				</div>
				<div class="message">
				'.$ticket[5].'
				</div>
			';
			$IDT=$ticket[0];
			$EST=$ticket[2];

			}

			//Busca y muestra comentarios
			echo '
							<div class="comments">
					<!-- Comentario de quien generó el ticket -->
					';
			$Comentarios=RetornaComentarios($IdTicket);

			while($Comentario=mysqli_fetch_row($Comentarios))
				{

					echo '
							<div class="
							';
							if($Comentario[0]==null)
								echo 'they';//Usuario
							else
								echo 'me'; //Admin
							echo '">
							'.$Comentario[1].'
							<br>
							'.$Comentario[3].'
							<br>
							'.$Comentario[2].'
							</div>
							';
				}
			 echo '
				</div>
			';

			?>
				
				
					

				<div class="leave-comment">
					<!-- Campo de texto para agregar un nuevo commentario, está dentro del mismo form que el select
					de la prioridad del ticket. -->

					<textarea name="comment" id="" cols="30" rows="10" class="form-control" required></textarea>
					<input type="text" name="IdUsuario" value="<?php echo $IdUsuario; ?>" hidden >
					<input type="text" name="IdTicket" value="<?php echo $IdTicket; ?> " hidden>
					<button class="btn btn-lg">Enviar</button>
				</div>
			</form>
			<?php 
			echo "<form action='../GestoresDeCambio/CambioEstado.php' method='post'>
				<input type='hidden' name='IdUsuario' value=".$IdUsuario.">
				<input type='hidden' name='IdTicket' value=".$IDT.">
				<input type='hidden' name='Estado' id='Estado' value=".$EST.">
				<input type='submit' id='BotonCambioEstado' value='CambiaEstado' hidden>
				</form>";

			?>
		</div>
	</section>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="js/master.js"></script>
</body>
</html>