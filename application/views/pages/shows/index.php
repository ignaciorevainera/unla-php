<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section>
	<div class="container">
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
			<?php if (!empty($shows)): ?>
				<?php foreach ($shows as $show): ?>
					<div class="col">
						<div class="card h-100 bg-dark text-light border-secondary rounded-2">
							<!-- <img src="<?php echo base_url('uploads/shows/' . $show->image); ?>" class="card-img-top" alt="<?php echo $show->name; ?>" style="height: 200px; object-fit: cover;"> -->

							<div class="card-body d-flex flex-column">
								<div class="flex-grow-1 mb-3">
									<h5 class="card-title display-6 fw-bold"><?php echo $show->artist_name; ?></h5>
									<p class="card-text fst-italic"><?php echo $show->name; ?></p>
								</div>

								<ul class="list-unstyled">
									<li class="mb-4 fs-5"><?php echo date('d/m/Y', strtotime($show->date)) . " • " . date('H:i', strtotime($show->time)); ?></li>
									<li class="card-price fs-3 fw-normal text-end">Desde <strong class="text-success"><?php echo "$" . $show->price; ?></strong></li>
									<li class="small text-end"><?php echo $show->available_quantity; ?> disponibles</li>
								</ul>
							</div>

							<div class="card-footer p-4 d-flex justify-content-between flex-wrap row-gap-2 gap-1">
								<div class="d-flex gap-2 align-items-center">
									<?php if ($show->status == 'available' && $this->session->userdata('user') && $this->session->userdata('role') != 1): ?>
										<form action="<?php echo base_url("shows/buy/$show->show_id"); ?>" method="post">
											<button type="submit" class="btn btn-success">Comprar</button>
										</form>
									<?php else: ?>
										<button type="button" class="btn btn-secondary" disabled>Comprar</button>
									<?php endif; ?>
									<?php if ($show->status == 'available'): ?>
										<span class="badge bg-success">Activo</span>
									<?php elseif ($show->status == 'sold_out'): ?>
										<span class="badge bg-warning">Agotado</span>
									<?php else: ?>
										<span class="badge bg-danger">No Disponible</span>
									<?php endif; ?>
								</div>
								<div class="d-flex gap-2">
									<?php echo view_button($show->show_id); ?>
									<?php if ($this->session->userdata('role') == 1): ?>
										<?php echo edit_button($show->show_id); ?>
										<?php echo delete_button($show->show_id); ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="col-12">
					<div class="alert alert-warning text-center" role="alert">
						No hay shows para mostrar.
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<script>
	function confirmDelete() {
		return confirm('¿Estás seguro de que deseas eliminar este show? Esta acción no se puede deshacer.');
	}
</script>
