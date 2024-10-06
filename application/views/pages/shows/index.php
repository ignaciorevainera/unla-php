<section>
	<h1 class="text-center my-5"><?php echo isset($title) ? $title : 'Mi Sitio Web' ?></h1>
	<div class="table-responsive px-5">
		<table class="table table-bordered table-dark table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre del Show</th>
					<th scope="col">Descripción</th>
					<th scope="col">Fecha</th>
					<th scope="col">Hora</th>
					<th scope="col">Precio</th>
					<th scope="col">Cantidad Total</th>
					<th scope="col">Cantidad Disponible</th>
					<th scope="col">Estado</th>
					<th scope="col">Artista</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($shows)): ?>
					<?php foreach ($shows as $show): ?>
						<tr>
							<th scope="row"><?php echo $show->show_id; ?></th>
							<td><?php echo $show->name; ?></td>
							<td><?php echo $show->description; ?></td>
							<td><?php echo date('d/m/Y', strtotime($show->date)); ?></td>
							<td><?php echo date('H:i', strtotime($show->time)); ?></td>
							<td><?php echo "$" . "$show->price"; ?></td>
							<td><?php echo $show->total_quantity; ?></td>
							<td><?php echo $show->available_quantity; ?></td>
							<td><?php echo ucfirst($show->status); ?></td>
							<td><?php echo $show->artist_name; // Suponiendo que ya está relacionado con la tabla Artist 
								?></td>
							<td class="d-flex align-items-center justify-items-center gap-4">
								<a href="<?php echo base_url("shows/show/$show->show_id"); ?>" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
										<path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
									</svg></a>
								<a href="<?php echo base_url("shows/edit/$show->show_id"); ?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
										<path d="M13.5 6.5l4 4" />
									</svg></a>
								<form action="<?php echo base_url("shows/delete/$show->show_id") ?>" method="post" style="display:inline-block;">
									<button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M4 7l16 0" />
											<path d="M10 11l0 6" />
											<path d="M14 11l0 6" />
											<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
											<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
										</svg></button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="11" class="text-center">No hay shows para mostrar</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</section>