<section>
	<div class="container">
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
			<?php if (!empty($artists)): ?>
				<?php foreach ($artists as $artist): ?>
					<div class="col">
						<div class="card h-100 bg-dark text-light border-secondary rounded">
							<!-- <img src="<?php echo base_url('uploads/shows/' . $artist->image); ?>" class="card-img-top" alt="<?php echo $artist->name; ?>" style="height: 200px; object-fit: cover;"> -->

							<div class="card-body">
								<h4 class="card-title fw-bold"><?php echo $artist->name; ?></h>
									<h5 class="card-text fst-italic"><?php echo $artist->country; ?></h5>
									<h6><?php echo $artist->genre; ?></h6>
							</div>

							<?php if ($this->session->userdata('role') == 1): ?>
								<div class="card-footer p-4 d-flex justify-content-end">

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
				<div class="col-12">
					<div class="alert alert-warning text-center" role="alert">
						No hay artistas para mostrar.
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
