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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route for Stock
Route::get('/Stock/createStock/', 'ChicController@createStock')->name('createStock');
Route::post('/Stock/createStock/', 'ChicController@storeStock')->name('storeStock');
Route::get('/Stock/index/', 'ChicController@indexStock')->name('indexStock');
Route::get('/Stock/show/{id}', 'ChicController@showStock')->name('showStock');
Route::get('/Stock/edit/{id}', 'ChicController@editStock')->name('editStock');
Route::post('/Stock/edit/{id}', 'ChicController@updateStock')->name('updateStock');
Route::delete('/Stock/index/{id}', 'ChicController@destroyStock')->name('deleteStock');

// Route::get('/edit/{id}', 'BusinessController@edit')->name('edit');
// Route::post('/edit/{id}', 'BusinessController@update')->name('update');



//Route for Cost
Route::get('/Cost/createCost/', 'ChicController@createCost')->name('createCost');
Route::post('/Cost/createCost/', 'ChicController@storeCost')->name('storeCost');
Route::get('/Cost/index/', 'ChicController@indexCost')->name('viewCost');
Route::get('/Cost/show/{id}', 'ChicController@viewCost')->name('showCost');
Route::get('/Cost/edit/{id}', 'ChicController@editCost')->name('editCost');
Route::post('/Cost/edit/{id}', 'ChicController@updateCost')->name('updateCost');
Route::delete('/Cost/index/{id}', 'ChicController@destroyCost')->name('deleteCost');




//Route for Product
Route::get('/Product/createProduct/', 'ChicController@createProduct')->name('createProduct');
Route::post('/Product/createProduct/', 'ChicController@storeProduct')->name('storeProduct');
Route::get('/Product/index/', 'ChicController@indexProduct')->name('indexProduct');
Route::get('/Product/show/{id}', 'ChicController@viewProduct')->name('showProduct');
Route::get('/Product/edit/{id}', 'ChicController@editProduct')->name('editProduct');
Route::post('/Product/edit/{id}', 'ChicController@updateProduct')->name('updateProduct');
Route::delete('/Product/index/{id}', 'ChicController@destroyProduct')->name('deleteProduct');







//Route for optimizer
Route::get('/Optimizer/optimizer/', 'ChicController@optimizer')->name('optimizer');