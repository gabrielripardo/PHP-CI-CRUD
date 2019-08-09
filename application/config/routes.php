<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'products';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['products'] = "products/index";
$route['productsCreate']['post'] = "products/store";
$route['productsEdit/(:any)'] = "products/edit/$1";
$route['productsUpdate/(:any)']['put'] = "products/update/$1";
$route['productsDelete/(:any)']['delete'] = "products/delete/$1";
$route['edit'] = "products/edit";