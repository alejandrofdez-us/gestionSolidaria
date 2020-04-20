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

Route::get('/home', 'HomeController@index')->name('home');

//rutas sólo para demandantes
Route::group(['middleware' => 'App\Http\Middleware\PetitionerMiddleware'], function()
{
    Route::get('/myDemands', 'DemandController@indexPetitioner')->name('myDemands');
    Route::resource('demands', 'DemandController');

    /*Route::post('/demands/create', 'DemandController@create')->name('demands.create');
    Route::get('/demands/{id}/edit', 'DemandController@edit')->name('demands.edit');
    Route::put('/demands/{id}', 'DemandController@update')->name('demands.update');
    Route::delete('/demands', 'DemandController@destroy')->name('demands.destroy');*/

});

//rutas sólo para voluntarios
Route::group(['middleware' => 'App\Http\Middleware\VolunteerMiddleware'], function()
{
    Route::get('/myCPDemands', 'DemandController@indexVolunteer')->name('myCPDemands');
    Route::get('/aceptar/{id}', 'DemandController@aceptar')->name('aceptar');
});

// rutas sin restricciones
