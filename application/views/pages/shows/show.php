<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="container">
	<?php title($title); ?>
	<h2 class="text-center mb-4"><?php echo $show->name; ?></h2>

	<div class="card bg-dark text-light border-secondary mb-4">
		<div class="row g-0">
			<div class="col-md-4">
				<!-- <img src="<?php echo base_url('uploads/shows/' . $show->image); ?>" class="img-fluid rounded-start" alt="<?php echo $show->name; ?>" style="height: 100%; object-fit: cover;"> -->
			</div>

			<div class="col-md-8">
				<div class="card-body">
					<div class="d-flex gap-2 align-items-center">
						<h5 class="card-title">Detalles del Show</h5>

					</div>
					<p><?php echo $show->description; ?></p>

					<ul class="list-unstyled mb-4">
						<li><?php echo date('d/m/Y', strtotime($show->date)) . " • " . date('H:i', strtotime($show->time)); ?></li>
						<li class="card-price fs-3 fw-normal text-end">Desde <strong class="text-success"><?php echo "$" . $show->price; ?></strong></li>
						<li class="small text-end"><?php echo $show->total_quantity; ?> en total</li>
						<li class="small text-end"><?php echo $show->available_quantity; ?> disponibles</li>
					</ul>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center gap-2">
							<?php if ($show->status == 'available' && $this->session->userdata('user') && $this->session->userdata('role') != 1): ?>
								<form action="<?php echo base_url("shows/buy/$show->show_id"); ?>" method="post">
									<button type="submit" class="btn btn-success">Comprar</button>
								</form>
							<?php else: ?>
								<button class="btn btn-secondary" disabled>Comprar</button>
							<?php endif; ?>
							<?php if ($show->status == 'available'): ?>
								<span class="badge bg-success">Activo</span>
							<?php elseif ($show->status == 'sold_out'): ?>
								<span class="badge bg-warning">Agotado</span>
							<?php else: ?>
								<span class="badge bg-danger">No Disponible</span>
							<?php endif; ?>
						</div>
						<?php if ($this->session->userdata('role') == 1): ?>
							<div class="d-flex gap-2">
								<?php echo edit_button($show->show_id); ?>
								<?php echo delete_button($show->show_id); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center">
		<a href="<?php echo base_url('shows'); ?>" class="btn btn-outline-light">Volver a la Lista de Shows</a>
	</div>
</section>
