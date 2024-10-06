<section>
	<h1 class="text-center my-5"><?php echo isset($title) ? $title : 'Mi Sitio Web' ?></h1>
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
				<?php if (!empty($products)): ?>
					<?php foreach ($products as $product): ?>
						<tr>
							<th scope="row"><?php echo $product->id; ?></th>
							<td><?php echo "$product->brand" . " " . "$product->model"; ?></td>
							<td><?php echo "$" . "$product->price"; ?></td>
							<td>
								<a href="<?php echo base_url("products/show/$product->id"); ?>" class="btn btn-info">Ver</a>
								<a href="<?php echo base_url("products/edit/$product->id"); ?>" class="btn btn-warning">Editar</a>
								<form action="<?php echo base_url("products/delete/$product->id") ?>" method="post">
									<button type="submit" class="btn btn-danger">Borrar</button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="4" class="text-center">No hay productos para mostrar</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</section>