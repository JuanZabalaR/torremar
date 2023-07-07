<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Reservas::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
$routes->get('contact', 'Reservas::contact');
$routes->get('login', 'Reservas::login');
$routes->get('aboutus', 'Reservas::aboutus');
$routes->post('access', 'Reservas::access');
$routes->get('dashboard', 'Users::dashboard');
$routes->get('roomsManage', 'Users::roomsManage');
$routes->get('createRoom', 'Users::createRoom');
$routes->post('saveRoom', 'Users::saveRoom');
$routes->get('logout', 'Users::logout');
$routes->post('search', 'Reservas::search');
$routes->get('deleteRoom/(:num)', 'Users::deleteRoom/$1');
$routes->get('aboutus', 'Reservas::aboutus');
$routes->post('roomVal', 'Reservas::roomVal');
$routes->post('saveReserve', 'Reservas::saveReserve');
$routes->get('aprobar/(:num)', 'Users::aprobar/$1');
$routes->get('rechazar/(:num)', 'Users::rechazar/$1');
