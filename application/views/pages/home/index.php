<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="container mb-5 text-center">
	<?php heading1($title); ?>
	<?php subtitle('Tu entrada al mundo del entretenimiento') ?>
	<div class="col-lg-6 mx-auto">
		<div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
			<a href="<?php echo base_url('shows'); ?>" class="btn btn-primary btn-lg px-4 me-sm-3">Ver espectáculos disponibles</a>
			<a href="<?php echo base_url('artists'); ?>" class="btn btn-outline-secondary btn-lg px-4 text-white">Nuestro artistas</a>
		</div>
	</div>

	<img src="assets/images/home1.webp" class="w-75 rounded-2 shadow-lg mb-4 ratio ratio-21x9" alt="Hero" loading="lazy">

</section>

<section class="container mb-5">
	<div class="row justify-content-center">
		<div class="col-lg-8 text-center">
			<?php heading2('Tu Plataforma de Confianza') ?>
			<?php subtitle('Facilitamos la conexión entre fanáticos y sus eventos favoritos') ?>
			<p class="mb-4">En TicketMaster nos dedicamos a hacer que la compra de entradas sea una experiencia sin complicaciones. Nuestro sistema seguro y fácil de usar te permite encontrar y adquirir tickets para los mejores eventos con solo unos clics.</p>
		</div>
	</div>
	<div class="d-flex gap-2 justify-content-center">
		<div class="col-md-4 text-center p-3 bg-dark rounded-2">
			<div class="mb-3">
				<i class="bi bi-shield-check display-4 text-primary"></i>
			</div>
			<h3 class="fw-bold">Compra Segura</h3>
			<p>Garantizamos la seguridad de todas tus transacciones con los más altos estándares de protección.</p>
		</div>
		<div class="col-md-4 text-center p-3 bg-dark rounded-2">
			<div class="mb-3">
				<i class="bi bi-ticket-perforated display-4 text-primary"></i>
			</div>
			<h3 class="fw-bold">Tickets Verificados</h3>
			<p>Todos nuestros tickets son 100% auténticos y verificados antes de cada venta.</p>
		</div>
		<div class="col-md-4 text-center p-3 bg-dark rounded-2">
			<div class="mb-3">
				<i class="bi bi-headset display-4 text-primary"></i>
			</div>
			<h3 class="fw-bold">Soporte 24/7</h3>
			<p>Nuestro equipo de atención al cliente está disponible en todo momento para ayudarte.</p>
		</div>
	</div>
</section>

<section class="container mb-5">
	<div class="row justify-content-center mb-4">
		<div class="col-lg-8 text-center">
			<?php heading2('Cómo Llegar'); ?>
			<?php subtitle('Encuentra la mejor ruta para llegar a nuestros eventos'); ?>
		</div>
	</div>
	<div class="row g-4">
		<div class="col-md-6">
			<div class="bg-dark p-4 rounded-2 h-100">
				<div class="mb-3">
					<i class="bi bi-geo-alt display-4 text-primary"></i>
				</div>
				<h3 class="fw-bold">Ubicación</h3>
				<p>Humboldt 450</p>
				<h4 class="fw-bold mt-4">Medios de Transporte</h4>
				<ul class="list-unstyled">
					<li class="mb-2">
						<i class="bi bi-bus-front me-2 text-primary"></i>
						Líneas de bus: 101, 102, 103
					</li>
					<li class="mb-2">
						<i class="bi bi-train-front me-2 text-primary"></i>
						Metro: Estación Central (Línea 1)
					</li>
					<li class="mb-2">
						<i class="bi bi-car-front me-2 text-primary"></i>
						Estacionamiento disponible
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-6">
			<div class="bg-dark p-4 rounded-2 h-100">
				<!-- Aquí iría el mapa, por ahora un placeholder -->
				<div class="ratio ratio-1x1 bg-secondary rounded-2">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13137.530711756035!2d-58.4477561!3d-34.5944836!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5eb6fb40a93%3A0x1fcab11b62b55896!2sMovistar%20Arena!5e0!3m2!1ses-419!2sar!4v1729739819400!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Sección Información Importante -->
<section class="container mb-5">
	<div class="row justify-content-center mb-4">
		<div class="col-lg-8 text-center">
			<?php heading2('Información Importante'); ?>
			<?php subtitle('Todo lo que necesitas saber antes de asistir al evento'); ?>
		</div>
	</div>
	<div class="row g-4">
		<div class="col-lg-6">
			<div class="bg-dark p-4 rounded-2 h-100">
				<h3 class="fw-bold mb-4">
					<i class="bi bi-check-circle text-primary me-2"></i>
					Elementos Permitidos
				</h3>
				<ul class="list-unstyled">
					<li class="mb-3">
						<i class="bi bi-camera me-2 text-primary"></i>
						Cámaras no profesionales
					</li>
					<li class="mb-3">
						<i class="bi bi-water me-2 text-primary"></i>
						Botellas de agua (selladas)
					</li>
					<li class="mb-3">
						<i class="bi bi-battery me-2 text-primary"></i>
						Baterías portátiles
					</li>
					<li class="mb-3">
						<i class="bi bi-bag me-2 text-primary"></i>
						Bolsos pequeños (máx. 30x30cm)
					</li>
				</ul>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="bg-dark p-4 rounded-2 h-100">
				<h3 class="fw-bold mb-4">
					<i class="bi bi-x-circle text-danger me-2"></i>
					Elementos Prohibidos
				</h3>
				<ul class="list-unstyled">
					<li class="mb-3">
						<i class="bi bi-camera2 me-2 text-danger"></i>
						Cámaras profesionales
					</li>
					<li class="mb-3">
						<i class="bi bi-cup-straw me-2 text-danger"></i>
						Bebidas alcohólicas
					</li>
					<li class="mb-3">
						<i class="bi bi-camera-video me-2 text-danger"></i>
						Equipos de grabación
					</li>
					<li class="mb-3">
						<i class="bi bi-basket me-2 text-danger"></i>
						Alimentos externos
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="container mb-5">
	<div class="row justify-content-center">
		<div class="col-lg-8 text-center">
			<?php heading2('Preguntas Frecuentes'); ?>
			<?php subtitle('Resolvemos tus dudas más comunes'); ?>
		</div>
	</div>
	<div class="accordion" id="faqAccordion">
		<div class="accordion-item bg-dark border-0 text-light">
			<h2 class="accordion-header">
				<button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
					¿Cuándo recibiré mis entradas?
				</button>
			</h2>
			<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
				<div class="accordion-body">
					Las entradas digitales se envían inmediatamente después de la compra al correo electrónico registrado.
				</div>
			</div>
		</div>

		<div class="accordion-item bg-dark border-0 text-light">
			<h2 class="accordion-header">
				<button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
					¿Puedo transferir mis entradas?
				</button>
			</h2>
			<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
				<div class="accordion-body">
					Sí, puedes transferir tus entradas a través de nuestra plataforma hasta 24 horas antes del evento.
				</div>
			</div>
		</div>

		<div class="accordion-item bg-dark border-0 text-light">
			<h2 class="accordion-header">
				<button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
					¿Qué pasa si el evento se cancela?
				</button>
			</h2>
			<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
				<div class="accordion-body">
					En caso de cancelación, se realizará el reembolso automático del 100% del valor de la entrada en un plazo de 5-10 días hábiles.
				</div>
			</div>
		</div>
	</div>
</section>

<section class="container">
	<div class="row align-items-center">
		<div class="col-lg-6">
			<?php title('Nuestra Historia'); ?>
			<?php subtitle('Todo comenzó con una simple idea: hacer que comprar entradas sea fácil y seguro.'); ?>
			<p class="mb-4">TicketMaster nació de la necesidad de crear una plataforma confiable donde los fanáticos de la música y el entretenimiento pudieran encontrar y comprar entradas para sus eventos favoritos de manera sencilla. Desde nuestro inicio, nos hemos comprometido a ofrecer la mejor experiencia de compra, con un sistema seguro y un servicio al cliente excepcional.</p>
			<p class="mb-4">A lo largo de los años, hemos crecido hasta convertirnos en una de las plataformas más confiables en la venta de tickets, manteniendo siempre nuestro compromiso con la satisfacción del cliente y la seguridad en cada transacción.</p>
		</div>
		<div class="col-lg-6">
			<img src="assets/images/home2.webp" class="img-fluid rounded-2 shadow" alt="Nuestra historia">
		</div>
	</div>
</section>

<button
	class="btn btn-primary rounded-circle position-fixed bottom-0 end-0 m-4"
	onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
	style="width: 50px; height: 50px;">
	<i class="bi bi-arrow-up"></i>
</button>