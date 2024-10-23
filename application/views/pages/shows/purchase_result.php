<section class="container bg-dark rounded-2 border border-secondary p-4">
	<h1 class="text-success fw-bold"><?php echo $success ? 'Compra exitosa' : 'Error en la compra'; ?></h1>

	<p><?php echo $message; ?></p>

	<?php if ($success): ?>
		<a href="<?php echo base_url("shows/show/$show->show_id"); ?>" class="btn btn-primary">Ver detalles del show</a>
	<?php else: ?>
		<a href="<?php echo base_url('shows'); ?>" class="btn btn-secondary">Volver a la lista de shows</a>
	<?php endif; ?>
</section>
