<?php
$nombre = trim($_POST['nombre'] ?? '');
$notas = $_POST['notas'] ?? [];
$errores = [];

if ($nombre === '') {
	$errores[] = 'Ingresa el nombre del estudiante.';
}

if (!is_array($notas) || count($notas) !== 4) {
	$errores[] = 'Debes ingresar exactamente cuatro notas.';
} else {
	foreach ($notas as $nota) {
		if (!is_numeric($nota) || $nota < 0 || $nota > 20) {
			$errores[] = 'Cada nota debe ser un número entre 0 y 20.';
			break;
		}
	}
}

$promedio = 0;
$situacion = '';

if (count($errores) === 0) {
	$suma = 0;

	foreach ($notas as $indice => $nota) {
		$notas[$indice] = (float) $nota;
		$suma += $notas[$indice];
	}

	$promedio = $suma / count($notas);

	if ($promedio < 11) {
		$situacion = 'Desaprobado';
	} elseif ($promedio <= 13) {
		$situacion = 'Regular';
	} elseif ($promedio <= 17) {
		$situacion = 'Bueno';
	} else {
		$situacion = 'Excelente';
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resultado académico</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<main class="contenedor">
		<section class="resultado">
			<?php if (count($errores) > 0): ?>
				<p class="etiqueta">DATOS INCOMPLETOS</p>
				<h1>No se pudo calcular</h1>
				<div class="mensaje-error">
					<?php foreach ($errores as $error): ?>
						<p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
					<?php endforeach; ?>
				</div>
				<a class="enlace" href="index.php">Volver al formulario</a>
			<?php else: ?>
				<p class="etiqueta">RESULTADO ACADÉMICO</p>
				<h1><?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?></h1>
				<p class="introduccion">Estas son las notas registradas:</p>

				<div class="notas-resultado">
					<?php foreach ($notas as $indice => $nota): ?>
						<div class="nota-item">
							<span>Nota <?= $indice + 1 ?></span>
							<strong><?= number_format($nota, 2) ?></strong>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="promedio">
					<span>Promedio obtenido</span>
					<strong><?= number_format($promedio, 2) ?></strong>
				</div>

				<p class="situacion">Situación académica: <strong><?= $situacion ?></strong></p>
				<a class="enlace" href="index.php">Registrar otro estudiante</a>
			<?php endif; ?>
		</section>
	</main>
</body>
</html>
