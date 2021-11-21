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
$routes->get('', 'Home::index');
$routes->get('hubungi', 'Home::hubungi');

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('masuk', 'AuthController::masuk');
    $routes->post('login', 'AuthController::login');
    $routes->get('daftar', 'AuthController::daftar');
    $routes->post('signup', 'AuthController::signup');
});

$routes->group('buku', function ($routes) {
    $routes->get('katalog', 'BookController::katalog'); // Belom
    $routes->get('detail/(:num)', 'BookController::detail/$1'); // Belom
});

$routes->group('', ['filter' => 'user'], function ($routes) {
    $routes->get('logout', 'AuthController::logout');

    $routes->group('profil', function ($routes) {
        $routes->get('', 'ProfileController::index'); // Belom
        $routes->get('ubah', 'ProfileController::ubahProfil'); // Belom
        $routes->get('ubah-password', 'ProfileController::ubahPassword'); // Belom

        $routes->put('save-profile', 'ProfileController::saveProfile'); // Belom
        $routes->put('save-password', 'ProfileController::savePassword'); // Belom
    });

    $routes->group('buku', function ($routes) {
        $routes->post('pinjam', 'BookController::pinjam'); // Belom
        $routes->get('daftar-peminjaman', 'BookController::daftarPeminjaman'); // Belom
    });
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'admin'], function ($routes) {
    $routes->group('buku', function ($routes) {
        $routes->get('katalog', 'BookController::katalog'); // Belom
        $routes->get('tambah', 'BookController::tambahBuku');
        $routes->get('ubah/(:num)', 'BookController::ubahBuku/$1'); 
        $routes->post('add-book', 'BookController::addBook');
        $routes->put('change-book/(:num)', 'BookController::changeBook/$1'); // Nggak jalan
    });
});

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
