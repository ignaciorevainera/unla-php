<section>
	<h1 class="text-center my-5"><?php echo $title; ?></h1>
	<div class="table-responsive px-5">
		<table class="table table-bordered table-dark table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Género</th>
					<th>País</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($artists as $artist) : ?>
					<tr>
						<td><?php echo $artist->artist_id; ?></td>
						<td><?php echo $artist->name; ?></td>
						<td><?php echo $artist->genre; ?></td>
						<td><?php echo $artist->country; ?></td>
						<td>
							<a href="<?php echo base_url("artist/show/$artist->artist_id"); ?>" class="btn btn-info">Ver</a>
							<a href="<?php echo base_url("artist/edit/$artist->artist_id"); ?>" class="btn btn-warning">Editar</a>
							<form action="<?php echo base_url("artist/delete/$artist->artist_id"); ?>" method="post" style="display:inline-block;">
								<button type="submit" class="btn btn-danger">Eliminar</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>