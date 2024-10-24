<?php
defined('BASEPATH') or exit('No direct script access allowed');

function heading1($title)
{
	echo '<h1 class="text-center fw-bold display-1 text-light mb-4">' . $title . '</h1>';
}

function heading2($title)
{
	echo '<h2 class="display-3 fw-bold mb-4">' . $title . '</h2>';
}

function title($title)
{
	echo '<h4 class="display-5 mb-4 fw-bold">' . $title . '</h4>';
}

function subtitle($subtitle)
{
	echo '<h5 class="mb-4">' . $subtitle . '</h5>';
}
