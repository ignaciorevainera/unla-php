<section>
	<h1 class="my-5"><?php echo $title; ?></h1>
	<div class="container">
		<p><strong>Nombre:</strong> <?php echo $artist->name; ?></p>
		<p><strong>Género:</strong> <?php echo $artist->genre; ?></p>
		<p><strong>País:</strong> <?php echo $artist->country; ?></p>
		<a href="<?php echo base_url('artist'); ?>" class="btn btn-secondary">Volver</a>
	</div>
</section>