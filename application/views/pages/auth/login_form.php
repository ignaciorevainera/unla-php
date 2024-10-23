<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $errors = $this->session->flashdata('errors'); ?>

<section class="flex-grow-1 d-flex container-sm align-items-center justify-content-center">
	<form action="<?php echo base_url('auth/login'); ?>" method="post" class="w-75">
		<div class="mb-3">
			<label for="email" class="form-label fw-bold">Correo electrónico:</label>
			<input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="name@example.com" required>
		</div>

		<div class="mb-3">
			<label for="password" class="form-label fw-bold">Contraseña:</label>
			<input type="password" class="form-control form-control-lg" id="password" name="password" required>
		</div>
		<button type="submit" class="btn btn-primary">Ingresar</button>
	</form>
</section>

<?php if (isset($errors)): ?>
	<?php foreach ($errors as $error): ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $error; ?>
		</div>
	<?php endforeach; ?>
<?php endif ?>
