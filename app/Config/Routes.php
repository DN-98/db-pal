<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');

$routes->get('/get-data-total', 'Home::get_data_total');
$routes->get('/get-data-today', 'Home::get_data_today');
$routes->get('/get-status-machine', 'Home::get_status_machine');

$routes->get('/test-ajax', 'Home::test_ajax');


$routes->get('/file-manager', 'FileManager::laporan_rusak');
$routes->get('/file-manager/images', 'FileManager::index');
$routes->get('/file-manager/laporan_rusak', 'FileManager::laporan_rusak');
$routes->get('/file-manager/laporan-edit', 'FileManager::laporan_edit');
$routes->get('/file-manager/laporan-baru', 'FileManager::laporan_baru');
$routes->post('/file-manager/laporan-baru/proses-laporan-baru', 'FileManager::proses_laporan_baru');
$routes->post('/file-manager/laporan-edit/proses-edit-laporan', 'FileManager::proses_edit_laporan');
$routes->post('/file-manager/proses-delete-laporan', 'FileManager::proses_delete_laporan');
$routes->post('/file-manager/upload_image_laporan', 'FileManager::upload_image_laporan');
$routes->post('/file-manager/proses-approval-laporan', 'FileManager::proses_approval_laporan');

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
