<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
*/


#$route['posts/edit/(:num)'] = 'posts/edit/$1';
#$route['posts/delete/(:num)'] = 'posts/delete/$1';
$route['posts/create'] = 'posts/create';
$route['posts/update/(:num)'] = 'posts/update/$1';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['categories/create'] = 'categories/create';
$route['categories/update/(:num)'] = 'categories/update/$1';
$route['categories/(:any)'] = 'categories/view/$1';
$route['categories'] = 'categories/index';

$route['comments/create/(:any)'] = 'comments/create/$1';

$route['users/signup'] = 'users/create';
$route['register'] = 'users/register';
$route['login'] = 'users/login';

$route['(:any)'] = 'pages/view/$1';

#-- default routes -- 
$route['default_controller'] = 'pages/view'; #welcome
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


