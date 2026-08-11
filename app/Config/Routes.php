<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/topics', 'Topics::index');
$routes->post('/topics/add', 'Topics::add');
$routes->get('/topics/toggle/(:num)', 'Topics::toggle/$1');
$routes->get('/topics/delete/(:num)', 'Topics::delete/$1');