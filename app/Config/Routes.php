<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

// ---------------------------------------------------------------------------------------------------------------------
// get => adalah metode request
// kalau mau akses menggunakan url maka gunakan metode request get
// kalau mau bekerja dengan form gunakan metode request post
// kalau mau menghapus data dari database gunakan metode request delete
// sekarang di CI4 ada http spoofing

// perilaku routes: closure (gk menggunakan controller & method) //
// $routes->get('/', function(){
// 	echo 'Hello World!';
// });

// mengirimkan data dari url ke controller //
// segmen ketiga dst adalah data yg akan dimasukkan ke method (controller/method/data/data)
// dideklarasi method, berikan parameter yg akan menampung data, kemudian panggil parameternya didalam isi method
// data di url harus diisi, bila tidak diisi, berikan parameter default di method-nya

// memberikan placeholder pada routes agar dapat menampung data dari url //
// dengan begitu maka routes akan dituliskan lebih pendek, dan akan diarahkan ke controller Coba method about
// kemudian data yg dimasukkan di url (:any) akan ditangkap oleh $1
// $routes->get('/coba/(:any)', 'Coba::about/$1')
// jika data yg dimasukkan lebih dari satu maka tambahkan /(:any) dan /$2
// sesuaikan (:any) dengan jenis data yg dimasukkan. dapat dilihat di documentation CI4
// ---------------------------------------------------------------------------------------------------------------------

$routes->get('/', 'Pages::index');
// routes method request delete (dari http method spoofing) 
$routes->delete('/komik/(:num)', 'Komik::delete/$1');
// segement nya berisi slug dari database
$routes->get('/komik/(:any)', 'Komik::detail/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}