<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section>
	<?php title($title); ?>
	<div class="card bg-dark text-light p-4">
		<h2>Nombre: <?php echo $artist->name; ?></h2>
		<p>País de Origen: <?php echo $artist->country; ?></p>
		<p>Género Musical: <?php echo $artist->genre; ?></p>
		<a href="<?php echo base_url('artists'); ?>" class="btn btn-secondary">Volver</a>
	</div>
</section>
