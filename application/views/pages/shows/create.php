<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section>
	<?php title($title); ?>
	<div class="flex-grow-1 d-flex flex-column container-sm align-items-center justify-content-center">
		<form action="<?php echo base_url('show/store') ?>" method="post" class="w-75">
			<div class="row mb-4">
				<div class="col-md-6">
					<label for="name" class="form-label">Nombre del espectáculo:</label>
					<input type="text" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="name" name="name" placeholder="Ingrese el nombre del show" required>
				</div>
				<div class="col-md-6">
					<label for="date" class="form-label">Fecha:</label>
					<input type="date" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="date" name="date" required>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col-md-6">
					<label for="time" class="form-label">Hora:</label>
					<input type="time" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="time" name="time" required>
				</div>
				<div class="col-md-6">
					<label for="price" class="form-label">Precio:</label>
					<input type="text" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="price" name="price" placeholder="Ingrese el precio" required>
				</div>
			</div>
			<div class="mb-4">
				<label for="description" class="form-label">Descripción:</label>
				<textarea class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="description" name="description" rows="3" placeholder="Ingrese la descripción" required></textarea>
			</div>
			<div class="row mb-4">
				<div class="col-md-6">
					<label for="total_quantity" class="form-label">Cantidad total:</label>
					<input type="number" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="total_quantity" name="total_quantity" placeholder="Ingrese la cantidad total" required min="1" max="15000">
				</div>
				<div class="col-md-6">
					<label for="available_quantity" class="form-label">Cantidad disponible:</label>
					<input type="number" class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="available_quantity" name="available_quantity" placeholder="Ingrese la cantidad disponible" required min="1" max="15000">
				</div>
			</div>
			<div class="mb-4">
				<label for="status" class="form-label">Estado:</label>
				<select class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="status" name="status" required>
					<option value="available">Disponible</option>
					<option value="sold_out">Agotado</option>
					<option value="expired">Vencido</option>
				</select>
			</div>
			<div class="mb-4">
				<label for="artist_id" class="form-label">Artista:</label>
				<select class="form-control form-control-lg bg-white text-dark border border-2 rounded-2" id="artist_id" name="artist_id" required>
					<option value="" disabled selected>Seleccione un artista</option>
					<?php foreach ($artists as $artist): ?>
						<option value="<?php echo $artist->artist_id; ?>"><?php echo $artist->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="d-flex justify-content-center p-2">
				<button type="submit" class="btn btn-primary px-4 py-2">Agregar espectáculo a la lista</button>
			</div>
		</form>
	</div>
</section>
