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

Route::get('/', function () {
    return view('login');
});


Route::get('chargeFileExcel','FileExcelController@index');
Route::post('submit','FileExcelController@store');
Route::get('indexs','FileExcelController@indexx');
Route::post('store_type','TypeController@store_type');
Route::get('importExcel','SiteController@index_site') ;
Route::get('add_type','TypeController@typeindex') ;
Route::get('deletetype/{id}','TypeController@deletetype');
Route::get('new_zone','ZoneController@indexzone');
Route::post('new_zone','ZoneController@store') ;
Route::get('deletezone/{id}','ZoneController@deletezone');
Route::get('new_gestionnaire','GestionnaireController@index_gestionnaire');
Route::post('new_gestionnaire','GestionnaireController@store') ;
Route::get('new_compte','ZoneController@index_register');
Route::get('deleteUser/{id}','ZoneController@deleteuser');
Route::get('logins',function (){
    return view('login');
}) ;
Route::get('sites','SiteController@listesite');
Route::get('deletesite/{id}','SiteController@deletesites');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
