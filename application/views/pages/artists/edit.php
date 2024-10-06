<section>
	<h1 class="my-5"><?php echo $title; ?></h1>
	<form action="<?php echo base_url("artist/edit/{$artist->artist_id}"); ?>" method="post" class="bg-dark text-light p-4 rounded-4 border border-light">
		<div class="mb-3">
			<label for="name" class="form-label">Nombre:</label>
			<input type="text" class="form-control bg-white text-dark" id="name" name="name" value="<?php echo $artist->name; ?>">
		</div>
		<div class="mb-3">
			<label for="genre" class="form-label">Género:</label>
			<input type="text" class="form-control bg-white text-dark" id="genre" name="genre" value="<?php echo $artist->genre; ?>">
		</div>
		<div class="mb-3">
			<label for="country" class="form-label">País:</label>
			<input type="text" class="form-control bg-white text-dark" id="country" name="country" value="<?php echo $artist->country; ?>" placeholder="Ingrese el país de origen">
		</div>
		<button type="submit" class="btn btn-primary">Editar Artista</button>
	</form>
</section>