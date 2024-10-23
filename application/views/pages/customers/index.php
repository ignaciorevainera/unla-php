<section>
	<h1 class="my-5 text-light text-center"><?php echo $title; ?></h1>

	<div class="table-responsive px-5">
		<table class="table table-bordered table-dark table-striped">
			<thead>
				<tr>
					<th scope="col">Email</th>
					<th scope="col">Fecha de Creación</th>
					<th scope="col">Total de Compras</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($customers as $customer): ?>
					<?php if ($customer->role_id != 1): ?>
						<tr>
							<td><?php echo $customer->email; ?></td>
							<td><?php echo date('d/m/Y', strtotime($customer->created_at)); ?></td>
							<td><?php echo $customer->total_purchases; ?></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
