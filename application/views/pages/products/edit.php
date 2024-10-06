<section>
	<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
	<h1 class="my-5"><?php echo ($title) ?></h1>
	<form action="<?php echo base_url("products/update/$product->id") ?>" method="post" class="text-light bg-dark rounded-4 border border-light p-4">
		<div class="mb-3">
			<label for="name" class="form-label">brand:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" value="<?php echo $product->brand ?>" name="brand" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">model:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" value="<?php echo $product->model ?>" name="model" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">operating_system:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" value="<?php echo $product->operating_system ?>" name="operating_system" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">storage_capacity:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" value="<?php echo $product->storage_capacity ?>" name="storage_capacity" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">ram_capacity:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" value="<?php echo $product->ram_capacity ?>" name="ram_capacity" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">screen_size:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" value="<?php echo $product->screen_size ?>" name="screen_size" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">battery_capacity:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" value="<?php echo $product->battery_capacity ?>" name="battery_capacity" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="name" class="form-label">camera_resolution:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" value="<?php echo $product->camera_resolution ?>" name="camera_resolution" placeholder="Ingrese el nombre">
		</div>
		<div class="mb-3">
			<label for="price" class="form-label">stock:</label>
			<input type="text" class="form-control bg-white text-dark border" id="price" value="<?php echo $product->stock ?>" name="stock" placeholder="Ingrese el precio">
		</div>
		<div class="mb-3">
			<label for="price" class="form-label">price:</label>
			<input type="text" class="form-control bg-white text-dark border" id="price" name="price" value="<?php echo $product->price ?>" placeholder="Ingrese el precio">
		</div>
		<div class="d-flex justify-content-center p-2">
			<button type="submit" class="btn btn-primary">Actualizar producto</button>
		</div>
	</form>
</section>