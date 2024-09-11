<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/svg+xml" href=<?php echo base_url('/assets/favicon/favicon.svg'); ?>>
	<link rel="icon" type="image/png" href=<?php echo base_url('/assets/favicon/favicon.png'); ?>>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/global.css'); ?>">
	<?php if (isset($css_file)): ?>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/pages' . $css_file); ?>">
	<?php endif; ?>
	<title>
		<?php echo isset($title) ? $title : 'Mi Sitio Web'; ?>
	</title>
</head>

<body>
	<header>
		<h1>Bienvenido a Mi Sitio Web</h1>
		<nav>
			<ul>
				<li>
					<a href="<?php echo base_url(); ?>">Inicio</a>
				</li>
				<li>
					<a href="<?php echo base_url('catalog'); ?>">Catálogo</a>
				</li>
				<li>
					<a href="<?php echo base_url('about'); ?>">Sobre Nosotros</a>
				</li>
				<li>
					<a href="<?php echo base_url('contact'); ?>">Contacto</a>
				</li>
			</ul>
		</nav>
	</header>
	<main>