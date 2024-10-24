<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section>
	<?php heading1($title); ?>
	<section class="container bg-dark rounded-2 border border-secondary p-4">
		<div class="d-flex justify-content-between gap-4">
			<div class="flex-grow-1">
				<form id="purchaseForm" name="purchaseForm" action="<?php echo base_url('show/confirm_purchase'); ?>" method="post">
					<input type="hidden" name="show_id" value="<?php echo $show->show_id; ?>">

					<div class="mb-3">
						<label for="quantity" class="form-label">Cantidad de entradas:</label>
						<input type="number" class="form-control bg-white text-dark border" id="quantity" name="quantity" min="1" max="<?php echo $show->available_quantity; ?>" required oninput="updateTotalPrice(<?php echo $show->price; ?>)">
					</div>
					<div>
						<span class="text-secondary">Entradas disponibles: <?php echo $show->available_quantity ?></span>
					</div>
				</form>
			</div>

			<div class="text-end">
				<p class="card-price fs-3 fw-normal">Precio por entrada: <strong class="text-success"><?php echo "$" . $show->price; ?></strong></p>
				<p>Total a pagar: $<span id="totalPrice">0</span></p>
			</div>
		</div>

		<div class="d-flex justify-content-end gap-2">
			<a href="<?php echo base_url("shows/show/$show->show_id") ?>" class="btn btn-primary">Volver</a>
			<button type="button" class="btn btn-success" form="purchaseForm" onclick="validateAndConfirmPurchase(<?php echo $show->price; ?>, <?php echo $show->available_quantity; ?>)">Confirmar compra</button>
		</div>
	</section>
</section>

<script>
	// Función para actualizar el precio total en tiempo real
	function updateTotalPrice(pricePerTicket) {
		const quantity = document.getElementById('quantity').value;
		const totalPrice = pricePerTicket * quantity;
		document.getElementById('totalPrice').innerText = totalPrice;
	}

	// Validar cantidad de entradas y confirmar compra
	function validateAndConfirmPurchase(pricePerTicket, availableQuantity) {
		const quantity = document.getElementById('quantity').value;

		// Verificar si la cantidad seleccionada es mayor a la cantidad disponible
		if (quantity > availableQuantity) {
			alert(`No puedes comprar más de ${availableQuantity} entradas. Por favor, elige una cantidad válida.`);
			return; // Evita que se envíe el formulario si hay más entradas seleccionadas de las disponibles
		}

		// Calcular el precio total
		const totalPrice = pricePerTicket * quantity;

		// Mensaje de confirmación
		const confirmationMessage = `Vas a comprar ${quantity} entrada(s) por un total de $${totalPrice}. ¿Estás seguro de proceder?`;

		// Mostrar el mensaje de confirmación
		if (confirm(confirmationMessage)) {
			document.getElementById('purchaseForm').submit(); // Enviar el formulario si el usuario confirma
		}
	}
</script>
