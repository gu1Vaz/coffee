<?php

use Illuminate\Support\Facades\Route;


Route::get('/','App\Http\Controllers\ProdutoController@index');
Route::get('/cafes','App\Http\Controllers\ProdutoController@allCafes');

Route::get('/loginFornecedor', 'App\Http\Controllers\Auth\LoginController@showFornecedorLoginForm');
Route::get('/registerFornecedor', 'App\Http\Controllers\Auth\RegisterController@showFornecedorRegisterForm');

Route::post('loginFornecedor',  ['as' => 'loginFornecedor', 'uses' =>'App\Http\Controllers\Auth\LoginController@loginFornecedor']);
Route::post('registerFornecedor', ['as' => 'registerFornecedor', 'uses' =>'App\Http\Controllers\Auth\RegisterController@createFornecedor']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('homeFornecedor', ['as' => 'homeFornecedor', 'uses' => 'App\Http\Controllers\HomeFornecedorController@index']);

Route::resource('produto','App\Http\Controllers\ProdutoController')->middleware('fornecedor');
Route::get('verProduto/{id}','App\Http\Controllers\ProdutoController@show');

Route::resource('compra','App\Http\Controllers\ComprasController')->middleware('auth');
Route::resource('venda','App\Http\Controllers\VendasController')->middleware('fornecedor');
Route::resource('busca','App\Http\Controllers\BuscaController');
