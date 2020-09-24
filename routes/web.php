<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	#Categorias
	Route::get('categoria','Categoria\CategoriaController@index')->name('categoria');
	Route::post('categoria','Categoria\CategoriaController@store');
	Route::put('categoria/{id}','Categoria\CategoriaController@update')->where('id', '[0-9]+');
	Route::delete('categoria/{id}','Categoria\CategoriaController@destroy')->where('id', '[0-9]+');

	#SubCategoria
	Route::get('subCategoria', 'SubCategoria\SubCategoriaController@index')->name('subCategoria');
	Route::post('subCategoria', 'SubCategoria\SubCategoriaController@store');
	Route::put('subCategoria/{id}', 'SubCategoria\SubCategoriaController@update')->where('id', '[0-9]+');
	Route::delete('subCategoria/{id}', 'SubCategoria\SubCategoriaController@destroy')->where('id', '[0-9]+');

	#Unidad de medidad
	Route::get('unidad', 'Unidad\UnidadController@index')->name('unidad');
	Route::get('unidad/{id}', 'Unidad\UnidadController@edit')->where('id', '[0-9]+');
	Route::post('unidad', 'Unidad\UnidadController@store');
	Route::put('unidad/{id}', 'Unidad\UnidadController@update')->where('id', '[0-9]+');
	Route::delete('unidad/{id}', 'Unidad\UnidadController@destroy')->where('id', '[0-9]+');

	#Empresa
	Route::get('empresa', 'Empresa\EmpresaController@index')->name('empresa');
	Route::post('empresa', 'Empresa\EmpresaController@store');
	Route::put('empresa/{id}', 'Empresa\EmpresaController@update')->where('id', '[0-9]+');
	Route::delete('empresa/{id}', 'Empresa\EmpresaController@destroy')->where('id', '[0-9]+');

	#Encargado
	Route::get('encargado', 'Encargado\EncargadoController@index')->name('encargado');
	Route::post('encargado', 'Encargado\EncargadoController@store');
	Route::put('encargado/{id}', 'Encargado\EncargadoController@update')->where('id', '[0-9]+');
	Route::delete('encargado/{id}', 'Encargado\EncargadoController@destroy')->where('id', '[0-9]+');

	#Prueba
	Route::get('prueba', 'Prueba\PruebaController@index')->name('prueba');
	Route::post('prueba', 'Prueba\PruebaController@store');
	Route::put('prueba/{id}', 'Prueba\PruebaController@update')->where('id', '[0-9]+');
	Route::delete('prueba/{id}', 'Prueba\PruebaController@destroy')->where('id', '[0-9]+');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


//Ruta empresa

