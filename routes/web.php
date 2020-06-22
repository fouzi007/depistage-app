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

use App\Services\SMS;

Auth::routes(['register' => true]);

Route::middleware('medecin')->get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){
	Route::name('patients.')->prefix('patients')->group(function(){
		Route::get('/creer','PatientsController@create')->name('create');
		Route::post('/store','PatientsController@store')->name('store');
		Route::get('/{patient}','PatientsController@show')->name('show');
		Route::get('/{patient}/delete','PatientsController@delete')->name('delete');
	});

	Route::name('sbau.')->prefix('sbau')->group(function(){
		Route::get('{patient}/{field}/{action}','SbauController@update');
	});

	Route::name('tr.')->prefix('tr')->group(function(){
		Route::get('{patient}/{field}/{action}','TRController@update');
	});

	Route::middleware('admin')->name('users.')->prefix('users')->group(function(){
		Route::get('/','UsersController@index')->name('index');
		Route::post('/store','UsersController@store')->name('store');
	});

	Route::name('laboratoire.')->prefix('laboratoire')->group(function(){
		Route::get('/','LaboratoireController@index');
		Route::get('/get-form/{patient}','LaboratoireController@getForm');
		Route::post('/update/{rapport}','LaboratoireController@update');
	});

	Route::get('mes-informations','UsersController@profile')->name('mes-informations');
	Route::post('mes-informations','UsersController@requestEdit')->name('requestEdit');
	Route::get('/stats','StatsController@index')->name('stats');
});
Route::get('/test',function(){
	return factory(\App\User::class,3)->create();
});


Route::get('/sms','PatientsController@sendSmsVerification');