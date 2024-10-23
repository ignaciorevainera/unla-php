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
	<header class="d-flex flex-wrap align-items-center justify-content-between p-4 bg-dark mb-5">

		<ul class="nav justify-content-center align-items-center gap-4">
			<li>
				<a href="<?php echo base_url(); ?>" class="nav-link text-white p-0">Inicio</a>
			</li>
			<li>
				<a href="<?php echo base_url('faqs'); ?>" class="nav-link text-white p-0">FAQs</a>
			</li>
			<li>
				<a href="<?php echo base_url('shows'); ?>" class="nav-link text-white p-0">Espectáculos</a>
			</li>
			<li>
				<a href="<?php echo base_url('artists'); ?>" class="nav-link text-white p-0">Artistas</a>
			</li>
			<li>
				<a href="<?php echo base_url('purchases'); ?>" class="nav-link text-white p-0">Compras</a>
			</li>
			<li>
				<a href="<?php echo base_url('customers'); ?>" class="nav-link text-white p-0">Clientes</a>
			</li>
			<?php if ($this->session->userdata('user') && $this->session->userdata('role') == 1): ?>
				<li class="nav-item d-flex gap-1">
					<a href="<?php echo base_url('shows/create'); ?>" class="btn btn-success d-flex align-items-center">
						Agregar espectáculo
					</a>
					<a href="<?php echo base_url('artists/create'); ?>" class="btn btn-secondary d-flex align-items-center">
						Agregar artista
					</a>
				</li>
			<?php endif; ?>
		</ul>

		<div class="d-flex justify-content-center gap-2">
			<?php if ($this->session->userdata('user')): ?>
				<a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger">Cerrar sesión</a>
			<?php else: ?>
				<a href="<?php echo base_url('auth/login_form'); ?>" class="btn btn-primary">Iniciar sesión</a>
				<a href="<?php echo base_url('auth/signup_form'); ?>" class="btn btn-outline-secondary text-white">Registrarse</a>
			<?php endif; ?>
		</div>
	</header>

	<main class="d-flex flex-column">