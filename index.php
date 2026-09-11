<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de notas</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<main class="contenedor">
		<section class="formulario">
			<p class="etiqueta">EJERCICIO 02</p>
			<h1>Registro de notas</h1>
			<p class="introduccion">Ingresa los datos del estudiante y sus cuatro notas para conocer su promedio.</p>

			<form action="calcular.php" method="POST">
				<label for="nombre">Nombre del estudiante</label>
				<input type="text" id="nombre" name="nombre" required maxlength="100">

				<fieldset>
					<legend>Notas del estudiante</legend>
					<div class="notas-grid">
						<div>
							<label for="nota1">Nota 1</label>
							<input type="number" id="nota1" name="notas[]" min="0" max="20" step="0.01" required>
						</div>
						<div>
							<label for="nota2">Nota 2</label>
							<input type="number" id="nota2" name="notas[]" min="0" max="20" step="0.01" required>
						</div>
						<div>
							<label for="nota3">Nota 3</label>
							<input type="number" id="nota3" name="notas[]" min="0" max="20" step="0.01" required>
						</div>
						<div>
							<label for="nota4">Nota 4</label>
							<input type="number" id="nota4" name="notas[]" min="0" max="20" step="0.01" required>
						</div>
					</div>
				</fieldset>

				<button type="submit">Calcular promedio</button>
			</form>
		</section>
	</main>
</body>
</html>