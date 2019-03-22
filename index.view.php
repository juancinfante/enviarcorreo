<!DOCTYPE html>
<html>
<head>
	<title>Formulario Contacto</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="estilos.css">

</head>
<body>

	<div class="wrap">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			
			<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php if(!$enviado && isset($nombre)) echo $nombre ?>"> <!-- value es para que no se borre el nombre -->
			
			<input type="text" name="correo" class="form-control" id="correo" placeholder="Correo" value="<?php if(!$enviado && isset($correo)) echo $correo ?>">

			<textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje" value="<?php if(!$enviado && isset($mensaje)) echo $mensaje ?>"></textarea>

			<?php if (!empty($errores)): ?> <!-- convinamos la condicion de PHP con HTML -->
				<!-- EJECUTAMOS EL CODIGO DE ACUERDO A LA CONDICION -->
				<div class="alert error"> 
					<?php echo $errores ?>
				</div>

				<?php elseif ($enviado): ?>
					<div class="alert success"> 
					<p>Enviado correctamente!</p>
					</div>

			<?php endif ?>
			 
			
			<!--
			<div class="alert success"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			</div>
			-->
			<input type="submit" name="submit" class="btn btn-primary" value="Enviar">

		</form>
	</div>


</body>
</html>