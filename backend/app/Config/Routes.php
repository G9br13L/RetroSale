<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');

$routes->get('/moodboard', 'Users::moodboard');

$routes->get('/roadmap', 'Users::roadmap');

$routes->get('/admin/dashboard', 'Admin::showDashboardPage');

$routes->get('/admin/services', 'Admin::showServicesPage');

$routes->get('/admin/accounts', 'Admin::showAccountsPage');

$routes->get('/admin/inquiries', 'Admin::showInquiriesPage');

$routes->get('/login', 'Auth::showLoginPage');
$routes->post('/login', 'Auth::login');
$routes->post('/logout', 'Auth::logout');
$routes->get('/signup', 'Auth::showSignupPage');
$routes->post('/signup', 'Auth::signup');

$routes->post('/admin/accounts/create', 'Admin::createAccount');
