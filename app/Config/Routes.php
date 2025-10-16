<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::authenticate');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
// Semua user yang login bisa akses dashboard
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);

// User management (setting)
$routes->group('setting', ['filter' => 'auth'], function($routes){
    $routes->get('', 'UserController::index');               // /setting
    $routes->get('create', 'UserController::create');       // /setting/create
    $routes->post('store', 'UserController::store');        // /setting/store
    $routes->get('edit/(:num)', 'UserController::edit/$1'); // /setting/edit/1
    $routes->post('update/(:num)', 'UserController::update/$1'); // /setting/update/1
    $routes->get('delete/(:num)', 'UserController::delete/$1');  // /setting/delete/1
});

// CRUD Master Item
$routes->group('items', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Master\ItemsController::index');               // /items          -> tampil list
    $routes->get('create', 'Master\ItemsController::create');       // /items/create   -> form tambah
    $routes->post('store', 'Master\ItemsController::store');        // /items/store    -> simpan item
    $routes->get('edit/(:num)', 'Master\ItemsController::edit/$1'); // /items/edit/1  -> form edit
    $routes->post('update/(:num)', 'Master\ItemsController::update/$1'); // /items/update/1 -> update
    $routes->get('delete/(:num)', 'Master\ItemsController::delete/$1');  // /items/delete/1 -> hapus
});

// CRUD Master Supplier
$routes->group('suppliers', ['filter' => 'auth'], function($routes){
    $routes->get('', 'Master\SuppliersController::index');               // /suppliers
    $routes->get('create', 'Master\SuppliersController::create');       // /suppliers/create
    $routes->post('store', 'Master\SuppliersController::store');        // /suppliers/store
    $routes->get('edit/(:num)', 'Master\SuppliersController::edit/$1'); // /suppliers/edit/1
    $routes->post('update/(:num)', 'Master\SuppliersController::update/$1'); // /suppliers/update/1
    $routes->get('delete/(:num)', 'Master\SuppliersController::delete/$1');  // /suppliers/delete/1
});

// CRUD Master Customer
$routes->group('customers', ['filter' => 'auth'], function($routes){
    $routes->get('', 'Master\CustomersController::index');               
    $routes->get('create', 'Master\CustomersController::create');       
    $routes->post('store', 'Master\CustomersController::store');        
    $routes->get('edit/(:num)', 'Master\CustomersController::edit/$1'); 
    $routes->post('update/(:num)', 'Master\CustomersController::update/$1'); 
    $routes->get('delete/(:num)', 'Master\CustomersController::delete/$1');  
});
// CRUD Master purchase order
$routes->group('po', ['filter' => 'auth'], function($routes){
    $routes->get('', 'Transactions\PurchaseOrdersController::index');
    $routes->get('create', 'Transactions\PurchaseOrdersController::create');
    $routes->post('', 'Transactions\PurchaseOrdersController::store');
    $routes->put('(:num)/approve', 'Transactions\PurchaseOrdersController::approve/$1');
    $routes->put('(:num)/reject', 'Transactions\PurchaseOrdersController::reject/$1');
});

// CRUD Master Goods Receipt
$routes->group('grn', ['filter'=>'auth'], function($routes){
    $routes->get('', 'Transactions\GoodsReceiptsController::index'); // daftar GRN
    $routes->get('po_list', 'Transactions\GoodsReceiptsController::poList'); // daftar PO Approved untuk GRN
    $routes->get('create/(:num)', 'Transactions\GoodsReceiptsController::create/$1'); // form GRN per PO
    $routes->post('', 'Transactions\GoodsReceiptsController::store'); // simpan GRN
    $routes->put('(:num)/approve', 'Transactions\GoodsReceiptsController::approve/$1'); // approve GRN
    $routes->put('(:num)/reject', 'Transactions\GoodsReceiptsController::reject/$1'); // reject GRN
});


