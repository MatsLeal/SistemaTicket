
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
	<section class="user container">
		<div class="tickets-panel">
		<?php
 			$Tickets=RetornaTicketDeUsuario($IdUsuario);
 			while($Ticket=mysqli_fetch_row($Tickets))
 			{
			echo "
 				<div class='ticket'>
				<div class=";
				if(strcmp($Ticket[2],"Abierto")==0)
					echo "'state warning'";
				if(strcmp($Ticket[2],"Pendiente")==0)
					echo "'state danger'";
				if(strcmp($Ticket[2],"Cerrado")==0)
					echo "'state success'";
				echo "></div>
				<div class='info'>
					<div class='username'>$InfoUsuario[0]</div>
					<div class='email'>$InfoUsuario[1]</div>
					<div class='brief-description'>
						$Ticket[4]
					</div>
				</div>
				<form action=TicketEnEspecifico.php method='POST'>
				<input type='hidden' name='IdTicket' value='"; echo $Ticket[0] ; echo "'>
				<input type='hidden' name='IdUsuario' value='"; echo $IdUsuario ; echo "'>
				<input type='submit' value='Ver Completo'>
				</form>					
			</div>		
			";
 			}
		?>

			<div class="add-ticket" onclick="location.href='NuevoTicket.php'">
				<i class="fa fa-plus fa-3x"></i>
			</div>
		</div>
	</section>
	<footer></footer>
</body>
</html>