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
    return view('welcome');
})->name('home');

Route::get('finder', 'FinderController@index');
Route::get('show/{id}', 'FinderController@show');


Auth::routes();

Route::get('admin', 'HomeController@index')->name('admin');
Route::get('/admin/company-data', 'HomeController@company_data')->name('company-data');
Route::post('/admin/company-data', 'DataInsertion@company_data')->name('company-data');


Route::resource('admin/workrooms', 'WorkroomController');
