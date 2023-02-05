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
$routes->get('/', 'Login::index');

$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');

$routes->get('/siswa', 'Siswa::index');
$routes->get('/siswa/tambah', 'Siswa::halamanTambah');
$routes->get('/siswa/edit/(:num)', 'Siswa::halamanEdit/$1');
$routes->post('/siswa/tambah', 'Siswa::aksiTambah');
$routes->post('/siswa/edit/(:num)', 'Siswa::aksiEdit/$1');
$routes->get('/siswa/hapus/(:num)', 'Siswa::aksiHapus/$1');

$routes->get('/petugas', 'Petugas::index');
$routes->get('/petugas/tambah', 'Petugas::halamanTambah');
$routes->get('/petugas/edit/(:num)', 'Petugas::halamanEdit/$1');
$routes->post('/petugas/tambah', 'Petugas::aksiTambah');
$routes->post('/petugas/edit/(:num)', 'Petugas::aksiEdit/$1');
$routes->get('/petugas/hapus/(:num)', 'Petugas::aksiHapus/$1');

$routes->get('/kelas', 'Kelas::index');
$routes->get('/kelas/tambah', 'Kelas::halamanTambah');
$routes->get('/kelas/edit/(:num)', 'Kelas::halamanEdit/$1');
$routes->post('/kelas/tambah', 'Kelas::aksiTambah');
$routes->post('/kelas/edit/(:num)', 'Kelas::aksiEdit/$1');
$routes->get('/kelas/hapus/(:num)', 'Kelas::aksiHapus/$1');

$routes->get('/spp', 'Spp::index');
$routes->get('/spp/tambah', 'Spp::halamanTambah');
$routes->get('/spp/edit/(:num)', 'Spp::halamanEdit/$1');
$routes->post('/spp/tambah', 'Spp::aksiTambah');
$routes->post('/spp/edit/(:num)', 'Spp::aksiEdit/$1');
$routes->get('/spp/hapus/(:num)', 'Spp::aksiHapus/$1');

// $routes->get('/pembayaran', 'Spp::index');
$routes->get('/pembayaran/(:num)', 'Pembayaran::halamanBayar/$1');
// $routes->get('/pembayaran/tambah', 'Spp::halamanTambah');
// $routes->get('/pembayaran/edit/(:num)', 'Spp::halamanEdit/$1');
// $routes->post('/pembayaran/tambah', 'Spp::aksiTambah');
// $routes->post('/pembayaran/edit/(:num)', 'Spp::aksiEdit/$1');
// $routes->get('/pembayaran/hapus/(:num)', 'Spp::aksiHapus/$1');

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
