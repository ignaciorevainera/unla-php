<main>
	<section class="container mb-5 text-center">
		<h1 class="display-1 fw-bold">Preguntas Frecuentes</h1>
		<p class="lead mb-4">Encuentra respuestas a todas tus dudas sobre nuestro servicio</p>
	</section>

	<section class="container mb-5">
		<div class="row g-4 text-center">
			<div class="col-md-3">
				<div class="p-3 bg-dark rounded-3 h-100">
					<i class="bi bi-cart-check fs-1 text-primary mb-3"></i>
					<h5>Proceso de Compra</h5>
				</div>
			</div>
			<div class="col-md-3">
				<div class="p-3 bg-dark rounded-3 h-100">
					<i class="bi bi-credit-card fs-1 text-primary mb-3"></i>
					<h5>Pagos</h5>
				</div>
			</div>
			<div class="col-md-3">
				<div class="p-3 bg-dark rounded-3 h-100">
					<i class="bi bi-ticket-perforated fs-1 text-primary mb-3"></i>
					<h5>Tickets</h5>
				</div>
			</div>
			<div class="col-md-3">
				<div class="p-3 bg-dark rounded-3 h-100">
					<i class="bi bi-arrow-counterclockwise fs-1 text-primary mb-3"></i>
					<h5>Reembolsos</h5>
				</div>
			</div>
		</div>
	</section>

	<section class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="accordion accordion-flush" id="faqAccordion">
					<!-- Proceso de Compra -->
					<div class="accordion-item bg-dark text-white border-secondary">
						<h2 class="accordion-header">
							<button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
								¿Cómo compro mis entradas?
							</button>
						</h2>
						<div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
							<div class="accordion-body bg-dark">
								<p>El proceso de compra es muy sencillo:</p>
								<ol class="text-light">
									<li>Selecciona el evento al que deseas asistir</li>
									<li>Elige la cantidad de entradas y ubicación</li>
									<li>Agrega al carrito y procede al pago</li>
									<li>Completa los datos de facturación</li>
									<li>Recibirás tus entradas por correo electrónico</li>
								</ol>
							</div>
						</div>
					</div>

					<!-- Pagos -->
					<div class="accordion-item bg-dark text-white border-secondary">
						<h2 class="accordion-header">
							<button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
								¿Qué métodos de pago aceptan?
							</button>
						</h2>
						<div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
							<div class="accordion-body bg-dark">
								<p>Aceptamos múltiples formas de pago para tu comodidad:</p>
								<ul class="text-light">
									<li>Tarjetas de crédito y débito (Visa, MasterCard, American Express)</li>
									<li>PayPal</li>
									<li>Transferencia bancaria</li>
									<li>Pago en efectivo en puntos autorizados</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Tickets -->
					<div class="accordion-item bg-dark text-white border-secondary">
						<h2 class="accordion-header">
							<button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
								¿Cómo recibo mis tickets?
							</button>
						</h2>
						<div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
							<div class="accordion-body bg-dark">
								<p>Una vez confirmado tu pago, recibirás tus tickets digitales de las siguientes maneras:</p>
								<ul class="text-light">
									<li>Por correo electrónico en formato PDF</li>
									<li>En tu cuenta de usuario en nuestra plataforma</li>
									<li>A través de nuestra aplicación móvil</li>
								</ul>
								<p>Puedes presentarlos en formato digital o impreso el día del evento.</p>
							</div>
						</div>
					</div>

					<!-- Reembolsos -->
					<div class="accordion-item bg-dark text-white border-secondary">
						<h2 class="accordion-header">
							<button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
								¿Cuál es la política de reembolso?
							</button>
						</h2>
						<div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
							<div class="accordion-body bg-dark">
								<p>Nuestra política de reembolso contempla los siguientes casos:</p>
								<ul class="text-light">
									<li>Cancelación del evento: reembolso automático del 100%</li>
									<li>Reprogramación: opción de reembolso o mantener el ticket</li>
									<li>Cambio de sede: opción de reembolso si la nueva ubicación está a más de 50km</li>
								</ul>
								<p>Los reembolsos se procesan en un plazo de 10-15 días hábiles.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<button
		class="btn btn-primary rounded-circle position-fixed bottom-0 end-0 m-4"
		onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
		style="width: 50px; height: 50px;">
		<i class="bi bi-arrow-up"></i>
	</button>
</main>
