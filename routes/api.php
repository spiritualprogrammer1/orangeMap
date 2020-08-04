<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('logouts','VilleController@logouts');
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('site','SiteController@index');

Route::post('saveSite','SiteController@store');
Route::patch('updatesite/{id}','SiteController@update');
Route::delete('deletesite/{id}','SiteController@deletesite');
Route::get('searchsite/{search}','SiteController@searchSite');
Route::get('zone','ZoneController@index');
Route::get('type','TypeController@index');
Route::get('gestionnaire','GestionnaireController@index');
Route::group(['middleware'=>'auth:api'],function (){

    Route::post('/logout', 'UserController@logout');

    Route::get('ville','VilleController@ville');
    Route::get('findVille/{id}','VilleController@findById');
    Route::post('saveVille','VilleController@store');
    Route::put('updateVille/{id}','VilleController@update');
    Route::get('deleteville/{id}','VilleController@deletecountry');
    Route::get('file/country_list','VilleController@fileList');
    Route::post('file/country_list','VilleController@saveFile');
    /*************site*******/

    Route::get('findSite/{id}','SiteController@findById');





});