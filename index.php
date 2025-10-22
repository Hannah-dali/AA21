<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Formulario simple</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<main class="container">
			<?php
			// Validar si se envió el formulario usando $_POST
			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				// Prevención básica de XSS
				$nombre = htmlspecialchars($_POST['nombre'] ?? '');
				$edad = htmlspecialchars($_POST['edad'] ?? '');
				$hobby = htmlspecialchars($_POST['hobby'] ?? '');

				// Lógica para mostrar mensaje según edad
				if ($edad >= 60) {
					$mensaje = "Perfil Senior";
				} elseif ($edad >= 18) {
					$mensaje = "Perfil Adulto";
				} else {
					$mensaje = "Perfil en Desarrollo";
				}
				?>

				<!-- Tarjeta de presentación -->
				<div class="card">
					<h2><?php echo $nombre; ?></h2>
					<p><strong>Edad:</strong> <?php echo $edad; ?></p>
					<p><strong>Hobby:</strong> <?php echo $hobby ?: "No ingresado"; ?></p>
					<p><strong>Mensaje:</strong> <?php echo $mensaje; ?></p>
				</div>

			<?php } ?>
			<h1>Captura de usuario</h1>

			<form id="userForm" class="form" novalidate>
				<div class="field">
					<label for="nombre">Nombre</label>
					<input id="nombre" name="nombre" type="text" placeholder="Nombre" required />
				</div>

				<div class="field">
					<label for="edad">Edad</label>
					<input id="edad" name="edad" type="number" min="0" max="120" placeholder="Edad" required />
				</div>

				<div class="field">
					<label for="hobby">Hobby</label>
					<input id="hobby" name="hobby" type="text" placeholder="Hobby" />
				</div>

				<div class="actions">
					<button type="submit">Guardar</button>
					<button type="reset" class="secondary">Limpiar</button>
				</div>
			</form>
		</main>
	</body>
</html>
