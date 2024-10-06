<section>
	<h1 class="text-center my-5"><?php echo ($title) ?></h1>
	<div class="table-responsive px-5">
		<table class="table table-bordered table-dark table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Celular</th>
					<th scope="col">Precio</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $product->id ?></td>
					<td><?php echo "$product->brand" . " " . "$product->model"; ?></td>
					<td><?php echo '$' . $product->price ?></td>
					<td>
						<a href="<?php echo base_url("products/edit/$product->id"); ?>" class="btn btn-warning">Editar</a>
						<form action="<?php echo base_url("products/delete/$product->id") ?>" method="post">
							<button type="submit" class="btn btn-danger">Borrar</button>
						</form>
					</td>

				</tr>
			</tbody>
		</table>
	</div>
</section>