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
	</header>
	<!-- Contenido de la página -->
	<section class="user container">
		<div class="ticket">
			<!-- Agregar enlace para envíar el formulario -->
			<form action="AgregaComentarioUsuario.php" method="post">
							<?php
			include '../Ticket/ActividadTicketEspecifico.php';
			include '../Conexion.php';
			session_start();

			echo $IdUsuario=$_SESSION["IdUsuario"];
			if(!$IdUsuario)
				header("Location:../index.php");

			$IdTicket=$_POST["IdTicket"];
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
			<h1 class="page-header">Ticket #'.$ticket[0].'</h1><!-- Nombre de usuario de quien generó el ticket -->
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
					<label font-color="Blue">
					<a href="'.$ticket[7].'" target="_blank">Archivo</a><!-- Correo electrónico de quien generó el ticket -->
					</label>
					<p>'.$ticket[3].'</p><!-- ??? Venía en la documentación -->
				</div>
				<!-- Mensaje completo del ticket -->
				<div class="message">
				'.$ticket[4].'
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
		</div>
	</section>
</body>
</html>