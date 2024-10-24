<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section>
	<?php heading1($title); ?>
	<div class="table-responsive px-5">
		<table class="table table-bordered table-dark table-striped">
			<thead>
				<tr>
					<th scope="col">Email del Usuario</th>
					<th scope="col">Fecha de Compra</th>
					<th scope="col">Show</th>
					<th scope="col">Artista</th>
					<th scope="col">Cantidad</th>
					<th scope="col">Precio Total</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($purchases)): ?>
					<?php foreach ($purchases as $purchase): ?>
						<tr>
							<td><?php echo $purchase->email; ?></td>
							<td><?php echo date('d/m/Y', strtotime($purchase->purchase_date)); ?></td>
							<td><?php echo $purchase->show_name; ?></td>
							<td><?php echo $purchase->artist_name; ?></td>
							<td><?php echo $purchase->quantity; ?></td>
							<td><?php echo "$" . number_format($purchase->total_price, 2); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="6" class="text-center">No hay compras registradas</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</section>
