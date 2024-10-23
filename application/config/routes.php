<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Page/home';
$route['home'] = 'Page/home';
$route['faqs'] = 'Page/faqs';
$route['shows'] = 'Show/index';
$route['shows/show/(:num)'] = 'Show/show/$1';
$route['shows/create'] = 'Show/create';
$route['shows/edit/(:num)'] = 'Show/edit/$1';
$route['shows/delete/(:num)'] = 'Show/delete/$1';
$route['shows/buy/(:num)'] = 'Show/buy/$1';
$route['artists'] = 'Artist/index';
$route['artists/create'] = 'Artist/create';
$route['artists/edit/(:num)'] = 'Artist/edit/$1';
$route['artists/show/(:num)'] = 'Artist/show/$1';
$route['artists/delete/(:num)'] = 'Artist/delete/$1';
$route['purchases'] = 'Purchase/index';
$route['customers'] = 'Customer/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
