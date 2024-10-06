<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/svg+xml" href=<?php echo base_url('/assets/favicon/favicon.svg'); ?>>
	<link rel="icon" type="image/png" href=<?php echo base_url('/assets/favicon/favicon.png'); ?>>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/global.css'); ?>">
	<?php if (isset($css_file)): ?>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/pages' . $css_file); ?>">
	<?php endif; ?>
	<title>
		<?php echo isset($title) ? $title : 'Mi Sitio Web'; ?>
	</title>
</head>

<body>
	<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-4 px-4 mb-4 bg-dark text-reset">

		<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
			<li><a href="<?php echo base_url('artists'); ?>" class="nav-link px-2">Artistas</a></li>
			<li><a href="<?php echo base_url('shows'); ?>" class="nav-link px-2">Espectáculos</a></li>
			<li><a href="<?php echo base_url('shows/create'); ?>" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
						<path stroke="none" d="M0 0h24v24H0z" fill="none" />
						<path d="M12 5l0 14" />
						<path d="M5 12l14 0" />
					</svg></a></li>
		</ul>

		<div class="col-md-3 text-end">
			<button type="button" class="btn btn-outline-light me-2">Iniciar Sesión</button>
			<button type="button" class="btn btn-success">Registrarse</button>
		</div>
	</header>
	<main>