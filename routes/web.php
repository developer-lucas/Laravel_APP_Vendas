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

# Rota do dashboard
Route::get( '/', 'DashboardController@index' );

# Rota de vendedores
Route::group( [ 'prefix' => 'vendedores' ], function () {

	Route::get( '/', 'VendedoresController@index' );
	Route::get( '/cadastrar', 'VendedoresController@cadastrar' );

} );

# Rota de vendas
Route::group( [ 'prefix' => 'vendas' ], function () {

	Route::get( '/{id}', 'VendasController@index' );
	Route::get( '/lancar', 'VendasController@lancar' );

} );


