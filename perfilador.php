<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Perfilador Dinámico</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<main class="container">
			<?php
			$saludo = htmlspecialchars($_GET['saludo'] ?? '');
			
			if (!empty($saludo)) {
				echo "<div class='alert alert-success'>
						<svg width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2'>
							<path d='M22 11.08V12a10 10 0 1 1-5.93-9.14'></path>
							<polyline points='22 4 12 14.01 9 11.01'></polyline>
						</svg>
						¡Hola, {$saludo}! Bienvenido/a al Perfilador
					</div>";
			}

			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				$nombre = htmlspecialchars($_POST['nombre'] ?? '');
				$edad = htmlspecialchars($_POST['edad'] ?? '');
				$hobby = htmlspecialchars($_POST['hobby'] ?? '');

				if (!empty($nombre) && !empty($edad)) {
					if ($edad >= 60) {
						$mensaje = "Perfil Senior";
						$inicial = strtoupper(substr($nombre, 0, 1));
						$clase = "senior";
					} elseif ($edad >= 18) {
						$mensaje = "Perfil Adulto";
						$inicial = strtoupper(substr($nombre, 0, 1));
						$clase = "adulto";
					} else {
						$mensaje = "Perfil en Desarrollo";
						$inicial = strtoupper(substr($nombre, 0, 1));
						$clase = "desarrollo";
					}
					?>

					<div class="card <?php echo $clase; ?>">
						<div class="card-header">
							<div class="avatar <?php echo $clase; ?>"><?php echo $inicial; ?></div>
							<h2><?php echo $nombre; ?></h2>
						</div>
						<div class="card-body">
							<div class="info-row">
								<span class="label">Edad:</span>
								<span class="value"><?php echo $edad; ?> años</span>
							</div>
							<div class="info-row">
								<span class="label">Hobby:</span>
								<span class="value"><?php echo $hobby ?: "No especificado"; ?></span>
							</div>
							<div class="badge <?php echo $clase; ?>">
								<?php echo $mensaje; ?>
							</div>
						</div>
						<div class="card-footer">
							<a href="perfilador.php" class="btn-back">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<polyline points="15 18 9 12 15 6"></polyline>
								</svg>
								Volver al Formulario
							</a>
						</div>
					</div>

				<?php } else { ?>
					<div class="alert alert-error">
						⚠️ Por favor completa todos los campos requeridos
					</div>
				<?php }
			} else { ?>

			<div class="form-container">
				<h1>
					<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
						<circle cx="12" cy="7" r="4"></circle>
					</svg>
					Captura de Usuario
				</h1>

				<form method="POST" action="" id="userForm" class="form">
					<div class="field">
						<label for="nombre">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
								<circle cx="12" cy="7" r="4"></circle>
							</svg>
							Nombre Completo
						</label>
						<input 
							id="nombre" 
							name="nombre" 
							type="text" 
							placeholder="Ingresa tu nombre" 
							required 
						/>
					</div>

					<div class="field">
						<label for="edad">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y10="10"></line>
							</svg>
							Edad
						</label>
						<input 
							id="edad" 
							name="edad" 
							type="number" 
							min="0" 
							max="120" 
							placeholder="Tu edad" 
							required 
						/>
					</div>

					<div class="field">
						<label for="hobby">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
							</svg>
							Hobby Favorito
						</label>
						<input 
							id="hobby" 
							name="hobby" 
							type="text" 
							placeholder="¿Qué te gusta hacer?" 
						/>
					</div>

					<div class="actions">
						<button type="submit" class="btn-primary">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
								<polyline points="17 21 17 13 7 13 7 21"></polyline>
								<polyline points="7 3 7 8 15 8"></polyline>
							</svg>
							Guardar Perfil
						</button>
						<button type="reset" class="btn-secondary">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<polyline points="1 4 1 10 7 10"></polyline>
								<path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
							</svg>
							Limpiar
						</button>
					</div>
				</form>
			</div>

			<?php } ?>
		</main>
	</body>
</html>
