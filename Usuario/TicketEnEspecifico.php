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
		<div class="ticket">
			<!-- Agregar enlace para envíar el formulario -->
			<form action="#" method="post">
				<h1 class="page-header">Username</h1><!-- Nombre de usuario de quien generó el ticket -->
				<!-- Cambia los valores del select -->
				<span class="ticket-state">Estado del ticket</span>
				<div class="info">
					<p>username@mail.com</p><!-- Correo electrónico de quien generó el ticket -->
					<p>Departamento</p><!-- ??? Venía en la documentación -->
				</div>
				<div class="message">
					<!-- Mensaje completo del ticket -->
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.</p>
				</div>
				<div class="comments">
					<!-- Comentario de quien generó el ticket -->
					<div class="they">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
					</div>
					<!-- Comentario del administrador -->
					<div class="me">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
					</div>
				</div>
				<div class="leave-comment">
					<!-- Campo de texto para agregar un nuevo commentario, está dentro del mismo form que el select
					de la prioridad del ticket. -->
					<textarea name="comment" id="" cols="30" rows="10" class="form-control"></textarea>
					<button class="btn btn-lg">Enviar</button>
				</div>
			</form>
		</div>
	</section>
</body>
</html>