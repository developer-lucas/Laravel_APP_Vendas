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

	# Rota de todas as vendas
	Route::get( '/', 'VendasController@index' );
	
	# Rota de vendas por vendedor
	Route::get( '/{id}', 'VendasController@individual' );
	
	# Lançamento de novas vendas
	Route::get( '/lancar', 'VendasController@lancar' );

} );


