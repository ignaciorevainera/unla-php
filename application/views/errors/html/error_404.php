<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>404 Página no encontrada - TicketMaster</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

	<style>
		body {
			min-height: 100vh;
			display: flex;
			align-items: center;
			min-height: 100vh;
			background: #2c3034;
			color: #f5f5f5;
		}
	</style>
</head>

<body>
	<div class="container text-center py-5">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="display-1 text-primary mb-4">
					<i class="bi bi-exclamation-circle"></i>
				</div>

				<h1 class="display-4 fw-bold mb-4"><?php echo $heading; ?></h1>
				<p class="lead mb-4"><?php echo $message; ?></p>

			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>