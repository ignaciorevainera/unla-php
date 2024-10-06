<section>
	<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
	<h1 class="my-5"><?php echo ($title) ?></h1>
	<form action="<?php echo base_url("shows/update/$show->show_id") ?>" method="post" class="text-light bg-dark rounded-4 border border-light p-4">
		<div class="mb-3">
			<label for="name" class="form-label">Nombre del Show:</label>
			<input type="text" class="form-control bg-white text-dark border" id="name" value="<?php echo $show->name ?>" name="name" placeholder="Ingrese el nombre del show" required>
		</div>
		<div class="mb-3">
			<label for="description" class="form-label">Descripción:</label>
			<textarea class="form-control bg-white text-dark border" id="description" name="description" placeholder="Ingrese la descripción" required><?php echo $show->description ?></textarea>
		</div>
		<div class="mb-3">
			<label for="date" class="form-label">Fecha:</label>
			<input type="date" class="form-control bg-white text-dark border" id="date" value="<?php echo $show->date ?>" name="date" required>
		</div>
		<div class="mb-3">
			<label for="time" class="form-label">Hora:</label>
			<input type="time" class="form-control bg-white text-dark border" id="time" value="<?php echo $show->time ?>" name="time" required>
		</div>
		<div class="mb-3">
			<label for="price" class="form-label">Precio:</label>
			<input type="text" class="form-control bg-white text-dark border" id="price" value="<?php echo $show->price ?>" name="price" placeholder="Ingrese el precio" required>
		</div>
		<div class="mb-3">
			<label for="total_quantity" class="form-label">Cantidad Total:</label>
			<input type="number" class="form-control bg-white text-dark border" id="total_quantity" value="<?php echo $show->total_quantity ?>" name="total_quantity" placeholder="Ingrese la cantidad total" required>
		</div>
		<div class="mb-3">
			<label for="available_quantity" class="form-label">Cantidad Disponible:</label>
			<input type="number" class="form-control bg-white text-dark border" id="available_quantity" value="<?php echo $show->available_quantity ?>" name="available_quantity" placeholder="Ingrese la cantidad disponible" required>
		</div>
		<div class="mb-3">
			<label for="status" class="form-label">Estado:</label>
			<select class="form-control bg-white text-dark border" id="status" name="status" required>
				<option value="available" <?php echo $show->status == 'available' ? 'selected' : ''; ?>>Disponible</option>
				<option value="sold_out" <?php echo $show->status == 'sold_out' ? 'selected' : ''; ?>>Agotado</option>
				<option value="expired" <?php echo $show->status == 'expired' ? 'selected' : ''; ?>>Vencido</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="artist_id" class="form-label">Artista:</label>
			<input type="number" class="form-control bg-white text-dark border" id="artist_id" value="<?php echo $show->artist_id ?>" name="artist_id" placeholder="Ingrese el ID del artista" required>
		</div>
		<div class="d-flex justify-content-center p-2">
			<button type="submit" class="btn btn-primary">Actualizar show</button>
		</div>
	</form>
</section>