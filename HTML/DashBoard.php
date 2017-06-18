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
			include "../Usuario/Usuario.php";
			 $IdUsuario= $_SESSION["IdUsuario"];
			 if(!$IdUsuario)
			 	{
 					header("Location: ../index.php");
 				}
 			$InfoUsuario=InformacionUsuario($IdUsuario);

			?></p></li><!-- Nombre de usuario de la sesión actual -->
			<li><i class="fa fa-envelope fa-lg"></i><p><?php echo $InfoUsuario[1]; ?></p></li><!-- Correo electrónico de la seción actual -->
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
	<section class="container-fluid">
		<!-- Gráficas -->
		<div class="row" style="margin: 25vh; height: 50vh;">
			<div class="col-sm-4">
				<canvas id="chart1"></canvas>
			</div>
			<div class="col-sm-8">
				<canvas id="chart2"></canvas>
			</div>
		</div>
	</section>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="js/master.js"></script>
	<script>
		var ctx1 = document.getElementById('chart1').getContext('2d');
		var ctx2 = document.getElementById('chart2').getContext('2d');

		var myPieChart = new Chart(ctx1,{
			type: 'doughnut',
			data: {
				datasets: [{
					<?php  
					$Resultado=RetornaPorcentajeEstadoTicket();
					echo $Resultado;
					?>
					backgroundColor: [
						'rgba(255,0,0,1)',
						'rgba(105,105,0,.8)',
						'green',
						'rgba(25,50,100,1)'
					],
				}],
				labels: [
					'Pendiente',
					'Abierto',
					'Procesando',
					'Cerrado'
				],
			}
		});

		var myChart = new Chart(ctx2, {
			type: 'bar',
			data: {
				labels: ["Pendiente", "Abierto", "Procesando", "Cerrado"],
				datasets: [{
					label: 'Numero de  Tickets',
					<?php  
					$Resultado=RetornaPorcentajeEstadoTicketBarra();
					echo $Resultado;
					?>

					backgroundColor: [
						'rgba(255,0,0,0.3)',
						'rgba(105,105,0,.8)',
						'rgba(0,255,0,0.3)',
						'rgba(25,50,100,1)'
					],
					borderColor: [
						'rgba(255,0,0,1)',
						'rgba(105,105,0,.8)',
						'rgba(0,255,0,1)',
						'rgba(25,50,100,1)'
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