<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/users', 'Users::index');
$routes->get('/users/create', 'Users::create');
$routes->post('/users/store', 'Users::store');
$routes->get('/users/edit/(:num)', 'Users::edit/$1');
$routes->post('/users/update/(:num)', 'Users::update/$1');
$routes->get('/users/delete/(:num)', 'Users::delete/$1');

$routes->get('/products', 'Products::index');
$routes->get('/products/create', 'Products::create');
$routes->post('/products/store', 'Products::store');
$routes->get('/products/edit/(:num)', 'Products::edit/$1');
$routes->post('/products/update/(:num)', 'Products::update/$1');
$routes->get('/products/delete/(:num)', 'Products::delete/$1');