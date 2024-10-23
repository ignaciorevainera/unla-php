<?php
defined('BASEPATH') or exit('No direct script access allowed');

function show_status_badge($status, $event_date)
{
	$badges = '';
	$current_date = date('Y-m-d');

	// Verificar si al evento le quedan menos de 2 meses.
	$event_datetime = new DateTime($event_date);
	$current_datetime = new DateTime($current_date);
	$interval = $current_datetime->diff($event_datetime);

	// Estado del show.
	switch ($status) {
		case 'available':
			$badges .= '<span class="badge bg-success">Activo</span>';
			break;
		case 'sold_out':
			$badges .= '<span class="badge bg-warning text-dark">Agotado</span>';
			break;
		default:
			$badges .= '<span class="badge bg-danger">No Disponible</span>';
			break;
	}

	// Añadir badge "Próximo" si faltan menos de 2 meses.
	if ($interval->invert == 0 && $interval->m < 2 && $interval->days > 0) {
		$badges .= '<span class="badge bg-info text-dark">Próximo</span>';
	}

	return $badges;
}
