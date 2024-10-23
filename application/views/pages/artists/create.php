<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section>
	<?php title($title); ?>
	<div class="flex-grow-1 d-flex flex-column container-sm align-items-center justify-content-center">
		<form action="<?php echo base_url('artists/store') ?>" method="post" class="w-75">
			<div class="mb-3">
				<label for="name" class="form-label">Nombre:</label>
				<input type="text" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="name" name="name" placeholder="Ingrese el nombre">
			</div>
			<div class="mb-3">
				<label for="genre" class="form-label">Género:</label>
				<input type="text" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="genre" name="genre" placeholder="Ingrese el género musical">
			</div>
			<div class="mb-3">
				<label for="country" class="form-label">País:</label>
				<input type="text" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="country" name="country" placeholder="Ingrese el país de origen">
			</div>
			<div class="d-flex justify-content-center p-2">
				<button type="submit" class="btn btn-primary px-4 py-2">Agregar artista a la lista</button>
			</div>
		</form>
	</div>
</section>