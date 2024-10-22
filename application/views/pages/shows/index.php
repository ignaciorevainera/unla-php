<section>
	<div class="container">
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
			<?php if (!empty($shows)): ?>
				<?php foreach ($shows as $show): ?>
					<div class="col">
						<div class="card h-100 bg-dark text-light border-light">
							<!-- <img src="<?php echo base_url('uploads/shows/' . $show->image); ?>" class="card-img-top" alt="<?php echo $show->name; ?>" style="height: 200px; object-fit: cover;"> -->

							<div class="card-body">
								<h5 class="card-title fw-bold"><?php echo $show->artist_name; ?></h5>
								<p class="card-text fst-italic"><?php echo $show->name; ?></p>

								<ul class="list-unstyled">
									<li><?php echo date('d/m/Y', strtotime($show->date)) . " • " . date('H:i', strtotime($show->time)); ?></li>
									<li class="card-price text-end">Desde <strong class="text-success"><?php echo "$" . $show->price; ?></strong></li>
									<li class="card-tickets-remaining text-end"><?php echo $show->available_quantity; ?> disponibles</li>
								</ul>
							</div>

							<div class="card-footer p-4 d-flex justify-content-between">
								<?php echo view_button($show->show_id); ?>

								<?php if ($this->session->userdata('role') == 1): ?>
									<div class="d-flex gap-2">
										<?php echo edit_button($show->show_id); ?>
										<?php echo delete_button($show->show_id); ?>
									</div>
								<?php endif; ?>
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
