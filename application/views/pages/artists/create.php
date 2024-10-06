<section>
	<h1 class="my-5"><?php echo $title; ?></h1>
	<form action="<?php echo base_url('artist/create'); ?>" method="post" class="bg-dark text-light p-4 rounded-4 border border-light">
		<div class="mb-3">
			<label for="name" class="form-label">Nombre:</label>
			<input type="text" class="form-control bg-white text-dark" id="name" name="name" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="genre" class="form-label">Género:</label>
			<input type="text" class="form-control bg-white text-dark" id="genre" name="genre" placeholder="Ingrese el género musical">
		</div>
		<div class="mb-3">
			<label for="country" class="form-label">País:</label>
			<input type="text" class="form-control bg-white text-dark" id="country" name="country" placeholder="Ingrese el país de origen">
		</div>
		<button type="submit" class="btn btn-primary">Crear Artista</button>
	</form>
</section>