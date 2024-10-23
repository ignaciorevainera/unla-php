<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="container">
	<?php title($title); ?>
	<h2 class="text-center mb-4"><?php echo $show->name; ?></h2>

	<div class="card bg-dark text-light border-secondary mb-4">
		<div class="row g-0">
			<div class="col-md-4">
				<?php if (!empty($show->image)): ?>
					<img src="<?= base_url($show->image); ?>" alt="<?= $show->name; ?>" class="img-fluid">
				<?php else: ?>
					<img src="<?= base_url('assets/images/shows/default.webp'); ?>" alt="Imagen no disponible" class="img-fluid">
				<?php endif; ?>
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
								<form action="<?php echo base_url("show/buy/$show->show_id"); ?>" method="post">
									<button type="submit" class="btn btn-success">Comprar</button>
								</form>
							<?php else: ?>
								<button class="btn btn-secondary" disabled>Comprar</button>
							<?php endif; ?>
							<?php echo show_status_badge($show->status, $show->date); ?>
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