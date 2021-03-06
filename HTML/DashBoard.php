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
			<li><i class="fa fa-user fa-lg"></i><p>
			<?php 
			include '../Graficas/ControladorGraficas.php';
			session_start();
			echo $_SESSION["IdUsuario"];
			?></p></li><!-- Nombre de usuario de la sesión actual -->
			<li><i class="fa fa-envelope fa-lg"></i><p>username@mail.com</p></li><!-- Correo electrónico de la seción actual -->
		</ul>
		<ul class="nav-bar">
			<li class="active"><a href="#"><i class="fa fa-home fa-lg"></i><p>Inicio</p></a></li>
			<li><a href="Ticket.php"><i class="fa fa-ticket fa-lg"></i><p>Tickets</p></a></li>
			<li><a href="RegistrarUsuario.php"><i class="fa fa-user-plus fa-lg"></i><p>Registrar usuario</p></a></li>
		</ul>
		<ul class="nav-bar bottom">
			<!-- Agregar enlace para salir/cerrar sesión -->
			<li><a href="#"><i class="fa fa-sign-out fa-lg"></i>Salir</a></li>
		</ul>
	</nav>
	<!-- Contenido de la página -->
	<section class="container">
		<!-- Gráficas -->
		<canvas id="chart1"></canvas>
	</section>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="js/master.js"></script>
	<script>
		var ctx = document.getElementById('chart1').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Pendiente", "Abierto", "Procesando", "Cerrado"],
				datasets: [{
					label: 'Numero de  Tickets',
					<?php  
					$Resultado=RetornaPorcentajeEstadoTicket();
					echo $Resultado;
					?>

					backgroundColor: [
						'rgba(255,0,0,0.3)',
						'rgba(255,255,0,0.3)',
						'rgba(0,255,0,0.3)',
						'rgba(255,0,255,0.3)'
					],
					borderColor: [
						'rgba(255,0,0,1)',
						'rgba(255,255,0,1)',
						'rgba(0,255,0,1)',
						'rgba(255,0,255,1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>