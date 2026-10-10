<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');

$routes->get('/login', 'AuthController::login');
$routes->post('/login/action', 'AuthController::attemptLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    // Products Explicit Routes
    $routes->get('products', 'ProductController::index');
    $routes->get('products/new', 'ProductController::new');
    $routes->post('products', 'ProductController::create');
    $routes->get('products/(:num)/edit', 'ProductController::edit/$1');
    $routes->put('products/(:num)', 'ProductController::update/$1');
    $routes->delete('products/(:num)', 'ProductController::delete/$1');

    // Customers Explicit Routes
    $routes->get('customers', 'CustomerController::index');
    $routes->get('customers/new', 'CustomerController::new');
    $routes->post('customers', 'CustomerController::create');
    $routes->get('customers/(:num)/edit', 'CustomerController::edit/$1');
    $routes->put('customers/(:num)', 'CustomerController::update/$1');
    $routes->delete('customers/(:num)', 'CustomerController::delete/$1');

    // Users Explicit Routes
    $routes->get('users', 'UserController::index');
    $routes->get('users/new', 'UserController::new');
    $routes->post('users', 'UserController::create');
    $routes->get('users/(:num)/edit', 'UserController::edit/$1');
    $routes->put('users/(:num)', 'UserController::update/$1');
    $routes->delete('users/(:num)', 'UserController::delete/$1');

    // Sales Routes
    $routes->get('sales', 'SalesController::index');
    $routes->get('sales/new', 'SalesController::create');
    $routes->post('sales', 'SalesController::store');
});