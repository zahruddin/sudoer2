<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');
$routes->get('/logout', 'Login::logout');
$routes->group('', ['filter' => 'login'], function ($routes) {
  $routes->get('/login', 'Login::index');
});
$routes->group('', ['filter' => 'login'], function ($routes) {
  $routes->get('/register', 'Register::index');
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
  $routes->get('/dashboard', 'Dashboard::index');
});
$routes->group('', ['filter' => 'auth'], function ($routes) {
  $routes->get('/datauser', 'Dashboard::datauser');
});
$routes->group('', ['filter' => 'auth'], function ($routes) {
  $routes->get('/kalender', 'Dashboard::kalender');
});
$routes->group('', ['filter' => 'auth'], function ($routes) {
  $routes->get('/pengaturan', 'Dashboard::pengaturan');
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
  $routes->post('/datauser/add', 'Dashboard::add');
});


$routes->setAutoRoute(true);
