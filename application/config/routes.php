<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Rutas RESTful reescritas sin método HTTP para compatibilidad con CI3
$route['api/tareas'] = 'api/tareas';
$route['api/tareas/(:num)'] = 'api/tarea/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
