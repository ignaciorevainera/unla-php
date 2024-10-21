<?php $errors = $this->session->flashdata('errors'); ?>
<?php if (isset($errors)): ?>
	<?php foreach ($errors as $error): ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $error; ?>
		</div>
	<?php endforeach; ?>
<?php endif ?>
<form action="<?php echo base_url('auth/login'); ?>" method="post">
	<div class="mb-3">
		<label for="email" class="form-label">Email:</label>
		<input type="email" class="form-control" id="email" name="email" required>
	</div>
	<div class="mb-3">
		<label for="password" class="form-label">Password:</label>
		<input type="password" class="form-control" id="password" name="password" required>
	</div>
	<button type="submit" class="btn btn-primary">Login</button>
</form>
