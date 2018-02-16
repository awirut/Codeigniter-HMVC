<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';

$route['(.*)/welcome'] = 'welcome';
$route['(.*)/dashboard'] = 'dashboard';
$route['(.*)/users'] = 'users';

$route['(.*)/users/login'] = 'users/login';

$route['404_override'] = 'dashboard';
$route['translate_uri_dashes'] = FALSE;
