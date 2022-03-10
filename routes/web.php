<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/resetPassword', 'HomeController@cambiarPassword')->name('resetPassword');
Route::post('/resetPassword', 'HomeController@resetPass')->name('resetPass');




Route::get('profile/{id}', 'UsersController@profile')->name('profile');



Route::resource('/usuarios','UsersController');
Route::resource('/clientes','ClientesController');
Route::resource('/ordenes','OrdenesController');
Route::resource('/roles','RolesController');


Route::get('usuarios/activate/{id}', 'UsersController@activate')->name('usuarios.activate');
Route::get('usuarios/deactivate/{id}', 'UsersController@deactivate')->name('usuarios.deactivate');


Route::get('clientes/activate/{id}', 'ClientesController@activate')->name('clientes.activate');
Route::get('clientes/deactivate/{id}', 'ClientesController@deactivate')->name('clientes.deactivate');





//Rutas de la API.
Route::prefix('api')->group(function () {
	//Route::resource('/rutas','ApiController@index')->name('rutas');
	Route::post('createProduct', 'ApiController@createProduct')->name('create_product');
    Route::get('searchArticle', 'ApiController@searchArticle')->name('search_article');

    Route::get('permissions', 'ApiController@permissions')->name('permissions');
    Route::get('getRoleInfo', 'ApiController@getRoleInfo')->name('getRoleInfo');
    Route::get('getCliente', 'ApiController@getCliente')->name('get_cliente');
    Route::get('getOrden', 'ApiController@getOrden')->name('get_orden');
    Route::get('allClientes', 'ApiController@allClientes')->name('all_clientes');
    Route::post('editCliente', 'ApiController@editCliente')->name('edit_cliente');
    Route::post('addCliente', 'ApiController@addCliente')->name('add_cliente');


    
	
});

// //Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

// //Clear Cache facade value:
Route::get('/clear-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return '<h1>Cache facade value cleared</h1>';
});

// //View Clear facade value:
Route::get('/view-clear', function() {
     $exitCode = Artisan::call('view:clear');
     return '<h1>View facade value cleared</h1>';
});

// //View cache facade value:
Route::get('/view-cache', function() {
     $exitCode = Artisan::call('view:cache');
     return '<h1>View facade value cache</h1>';
});
