<section>
	<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
	<h1 class="my-5"><?php echo ($title) ?></h1>
	<form action="<?php echo base_url('products/store') ?>" method="post" class="text-light bg-dark rounded-4 border border-light p-4">
		<div class="mb-3">
			<label for="name" class="form-label">brand:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" name="brand" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">model:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" name="model" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">operating_system:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" name="operating_system" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">storage_capacity:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" name="storage_capacity" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">ram_capacity:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" name="ram_capacity" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">screen_size:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" name="screen_size" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">battery_capacity:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" name="battery_capacity" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">camera_resolution:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" name="camera_resolution" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="price" class="form-label">stock:</label>
			<input type="text" class="form-control bg-white text-dark border" id="price" name="stock" placeholder="Ingrese el precio">
		</div>
		<div class="mb-3">
			<label for="price" class="form-label">price:</label>
			<input type="text" class="form-control bg-white text-dark border" id="price" name="price" placeholder="Ingrese el precio">
		</div>
		<div class="d-flex justify-content-center p-2">
			<button type="submit" class="btn btn-primary">Crear producto</button>
		</div>
	</form>
</section>