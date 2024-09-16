<section>
	<h1>Lista de Productos</h1>
	<?php foreach ($products as $product): ?>
		<article>
			<img src="#" alt="<?php echo $product->brand . ' ' . $product->model; ?>">
			<h4><?php echo "$product->model"; ?></h4>
			<h5><?php echo "$product->brand"; ?></h5>
			<div>
				<p><?php echo "$product->price"; ?></p>
			</div>
		</article>
	<?php endforeach ?>
</section>
