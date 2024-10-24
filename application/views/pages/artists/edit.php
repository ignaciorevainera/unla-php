<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section>
	<?php heading1($title); ?>
	<div class="flex-grow-1 d-flex flex-column container-sm align-items-center justify-content-center">
		<form action="<?php echo base_url("artist/update/$artist->artist_id"); ?>" method="post" class="w-75">
			<div class="mb-3">
				<label for="name" class="form-label">Nombre:</label>
				<input type="text" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="name" name="name" value="<?php echo $artist->name; ?>">
			</div>
			<div class="mb-3">
				<label for="genre" class="form-label">Género:</label>
				<input type="text" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="genre" name="genre" value="<?php echo $artist->genre; ?>">
			</div>
			<div class="mb-3">
				<label for="country" class="form-label">País:</label>
				<input type="text" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="country" name="country" value="<?php echo $artist->country; ?>">
			</div>
			<div class="d-flex justify-content-center p-2">
				<button type="submit" class="btn btn-primary px-4 py-2">Actualizar artista</button>
			</div>
		</form>
	</div>
</section>
