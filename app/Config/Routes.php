<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// hotel
$routes->get('/hotel', 'HotelController::index');
$routes->get('/hotel/create', 'HotelController::create');
$routes->get('/hotel/(:segment)', 'HotelController::show/$1');
$routes->get('/hotel/(:segment)/edit', 'HotelController::edit/$1');
$routes->post('/hotel', 'HotelController::store');
$routes->put('/hotel/(:segment)', 'HotelController::update/$1');
$routes->delete('/hotel/(:segment)', 'HotelController::destroy/$1');

// room
$routes->post('/room', 'RoomController::store');
$routes->get('/room/(:segment)/edit', 'RoomController::edit/$1');
$routes->put('/room/(:segment)', 'RoomController::update/$1');
$routes->delete('/room/(:segment)', 'RoomController::destroy/$1');

// booking
$routes->get('/booking', 'BookingController::index');


// api
$routes->get('/api/hotel', 'Api\HotelController::index');
$routes->get('/api/hotel/(:segment)', 'Api\HotelController::show/$1');
$routes->get('/api/room/(:segment)', 'Api\RoomController::show/$1');
$routes->post('/api/booking', 'Api\BookingController::store');
$routes->get('/api/booking/(:segment)', 'Api\BookingController::show/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
