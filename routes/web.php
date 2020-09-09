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
Auth::routes();

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/company/{id?}/{id2?}', 'CompanyController@company')->name('getcompany');

Route::post('/company/{id}', 'CompanyController@store');

//Route::post('/company/{id}{search}', 'CompanyController@store');

Route::get('/type', 'CompanyController@type');

Route::post('/saveconv', 'CompanyController@saveConv')->name('saveConv');

Route::put('/company/{id}', 'CompanyController@updateCompany')->name('updateCompany');

Route::put('/company/{companyId}/{contactId}', 'CompanyController@updateContact')->name('updateContact');

Route::get('/new', function () {
    return view('new');
});

Route::post('/search', 'CompanyController@search')->name('search');

Route::post('/new', 'CompanyController@newCompany')->name('newCompany');

Route::get('/history/{arrangement?}/{user?}/{date1?}/{date2?}', 'HistoryController@history')->name('history');

Route::get('/schedule/{arrangement?}', 'HistoryController@schedule')->name('schedule');

Route::get('/missed', function () {
    return view('missed');
});

Route::get('/upcoming', function () {
    return view('upcoming');
});



//Route::get('/', 'HomeController@index')->name('home');
