<section>
	<h1 class="text-center my-5"><?php echo ($title) ?></h1>
	<div class="table-responsive px-5">
		<table class="table table-bordered table-dark table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">País de Origen</th>
					<th scope="col">Género Musical</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($artists as $artist): ?>
					<tr>
						<td><?php echo $artist->artist_id ?></td>
						<td><?php echo $artist->name ?></td>
						<td><?php echo $artist->country ?></td>
						<td><?php echo $artist->genre ?></td>
						<td>
							<a href="<?php echo base_url("artists/show/$artist->artist_id"); ?>" class="btn btn-info">Ver</a>
							<a href="<?php echo base_url("artists/edit/$artist->artist_id"); ?>" class="btn btn-warning">Editar</a>
							<form action="<?php echo base_url("artists/delete/$artist->artist_id"); ?>" method="post" style="display:inline-block;">
								<button type="submit" class="btn btn-danger">Eliminar</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
