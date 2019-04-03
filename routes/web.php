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
Route::get('hinnaparing', 'PriceRequestController@index');
Route::post('hinnaparing', 'PriceRequestController@post');

Auth::routes();

Route::get('admin', 'HomeController@index')->name('admin');
Route::get('/admin/company-data', 'HomeController@company_data')->name('company-data');
Route::post('/admin/company-data', 'DataInsertion@company_data')->name('company-data');

Route::get('/admin/change-password','ChangePasswordController@index')->name('changePassword');
Route::post('/admin/change-password','ChangePasswordController@updatePassword')->name('updatePassword');



Route::resource('admin/workrooms', 'WorkroomController');
Route::get('admin/requests/{id}', 'HomeController@requestsShow');
Route::post('admin/requests/{id}', 'HomeController@requestsPost');