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


Route::get('click/{advertisement}', 'AdvertisementController')->name('record_advertisement');


Route::get('/', 'MainController@index')->name('frontpage');
Route::get('region/{region}', 'MainController@region')->name('region.workrooms');

Route::post('toggleMap', 'MainController@toggleMap')->name('toggleMap');
Route::post('contacts/{workroom}', 'MainController@saveContactClick')->name('contact_click');

// Route::get('finder', 'FinderController@index');
Route::get('tookoda/{slug}', 'MainController@show')->name('workroom.show');
Route::get('hinnaparing', 'PriceRequestController@index');
Route::post('hinnaparing', 'PriceRequestController@post');

Route::get('meist', 'MainController@aboutUs');

Route::get('tagasiside-antud', 'MainController@thanksForReview')->name('thanksForReview');

Route::get('tagasiside/{token}', 'MainController@writeReview');
Route::post('tagasiside/{token}', 'MainController@sendReview');

Auth::routes();

Route::get('admin', 'HomeController@index')->name('admin');
Route::get('/admin/company-data', 'HomeController@company_data')->name('company-data');
Route::post('/admin/company-data', 'DataInsertion@company_data')->name('company-data');

Route::get('/admin/change-password','ChangePasswordController@index')->name('changePassword');
Route::post('/admin/change-password','ChangePasswordController@updatePassword')->name('updatePassword');

Route::get('/admin/reviews', 'ReviewsController@index')->name('reviewsIndex');
Route::post('/admin/reviews', 'ReviewsController@sendReviewRequest')->name('reviewsPost');

Route::resource('admin/workrooms', 'WorkroomController');
Route::get('admin/requests/{id}', 'HomeController@requestsShow');
Route::post('admin/requests/{id}', 'HomeController@requestsPost');
