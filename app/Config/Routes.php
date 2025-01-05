<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('profile-test', 'Home::profile_test');

$routes->get('/home', 'Home::index'); // DEFAULT PAGE SEMENTARA

$routes->get('/', 'Home::index');
$routes->get('/shop', 'Home::shop', ['filter' => 'auth']);
$routes->post('/add-to-cart', 'Home::addToCart', ['filter' => 'auth']);
    
// Auth routes
$routes->get('login', 'LoginUsers::index');
$routes->get('register', 'LoginUsers::register');
$routes->post('login', 'LoginUsers::attemptLogin');
$routes->post('register', 'LoginUsers::attemptRegister');
$routes->get('logout', 'LoginUsers::logout');

// Admin routes (with admin filter)
$routes->group('admin', ['filter' => 'admin'] , function($routes){
    
    $routes->get('', 'DashboardAdminController::userManageRead'); // DEFAULT PAGE SEMENTARA


    $routes->get('profile', 'LoginUsers::profile');


    $routes->get('dashboard', 'DashboardAdminController::userManageRead');
    $routes->get('users', 'DashboardAdminController::userManageRead');
    $routes->post('users/add', 'DashboardAdminController::addUser');
    $routes->get('users/delete/(:num)', 'DashboardAdminController::delete/$1');
    $routes->post('users/update', 'DashboardAdminController::update');
    $routes->get('layout-static', 'DashboardAdminController::static');

    $routes->get('products', 'ProductController::index');
    $routes->get('products/create', 'ProductController::create');
    $routes->post('products/store', 'ProductController::store');
    $routes->get('products/edit/(:num)', 'ProductController::edit/$1');
    $routes->put('products/update/(:num)', 'ProductController::update/$1');
    $routes->delete('products/delete/(:num)', 'ProductController::delete/$1');
    $routes->post('products/delete-image/(:num)', 'ProductController::deleteImage/$1');
    $routes->get('products/get-images/(:num)', 'ProductController::getImages/$1');

    // Transaction routes
    $routes->get('transactions', 'TransactionController::index');
    $routes->post('transactions/store', 'TransactionController::store');
    $routes->post('transactions/update/(:num)', 'TransactionController::update/$1');
    $routes->get('transactions/delete/(:num)', 'TransactionController::delete/$1');
    $routes->get('transactions/edit/(:num)', 'TransactionController::edit/$1');

    $routes->get('cart-user', 'DashboardAdminController::cart');
    $routes->post('carts/update', 'DashboardAdminController::update_carts');
    $routes->post('carts/add', 'DashboardAdminController::add_carts');
    $routes->get('carts/delete/(:num)', 'DashboardAdminController::delete_carts/$1'); // Rute untuk menghapus cart

});

// Protected routes (require login)
// $routes->group('', ['filter' => 'auth'], function($routes) {
//     $routes->get('/user/profile', 'LoginUsers::profile', ['filter' => 'auth']);
// });
    // $routes->get('/user/profile', 'LoginUsers::profile', ['filter' => 'auth']);

    $routes->get('/contact', 'Home::contact');
    $routes->get('/about', 'Home::about');
    $routes->get('/blog', 'Home::blog');


    $routes->get('profile', 'LoginUsers::profile', ['filter' => 'auth']);
    $routes->post('updateProfile', 'LoginUsers::updateProfile', ['filter' => 'auth']);
    // $routes->get('keranjang', 'LoginUsers::keranjang', ['filter' => 'auth']);
    $routes->get('keranjang', 'KeranjangController::keranjang', ['filter' => 'auth']);
    
    $routes->get('transaksi', 'LoginUsers::transaksi', ['filter' => 'auth']);
    $routes->post('transaction/save', 'KeranjangController::save', ['filter' => 'auth']);
    $routes->post('keranjang/delete/(:num)', 'KeranjangController::delete/$1', ['filter' => 'auth']);
    $routes->post('keranjang/cancel/(:num)', 'LoginUsers::cancelTransaksi/$1', ['filter' => 'auth']);


// RAJA ONGKIR
$routes->get('rajaongkir/provinces', 'RajaOngkir::provinces');
$routes->get('rajaongkir/cities/(:num)', 'RajaOngkir::cities/$1');
$routes->post('rajaongkir/ongkir/(:any)/(:any)/(:any)', 'RajaOngkir::ongkir/$1/$2/$3');
$routes->get('rajaongkir/ongkir/(:any)/(:any)/(:any)', 'RajaOngkir::ongkir/$1/$2/$3');