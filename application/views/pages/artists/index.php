<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section>
	<div class="container">
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
			<?php if (!empty($artists)): ?>
				<?php foreach ($artists as $artist): ?>
					<div class="col">
						<div class="card h-100 bg-dark text-light border-secondary rounded-2">
							<!-- <img src="<?php echo base_url('uploads/shows/' . $artist->image); ?>" class="card-img-top" alt="<?php echo $artist->name; ?>" style="height: 200px; object-fit: cover;"> -->

							<div class="card-body">
								<h4 class="card-title display-6 fw-bold"><?php echo $artist->name; ?></h>
									<h5><?php echo $artist->genre; ?></h5>
									<h6 class="card-text fst-italic"><?php echo $artist->country; ?></h6>
							</div>

							<?php if ($this->session->userdata('role') == 1): ?>
								<div class="card-footer p-2 d-flex justify-content-end">

									<div class="d-flex gap-2">
										<?php echo artist_edit_button($artist->artist_id); ?>
										<?php echo artist_delete_button($artist->artist_id); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-12 w-100">
					<div class="alert alert-danger text-center" role="alert">
						No hay artistas para mostrar.
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<script>
		function confirmDelete() {
			return confirm('¿Estás seguro de que deseas eliminar este show? Esta acción no se puede deshacer.');
		}
	</script>