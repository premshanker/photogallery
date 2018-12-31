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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', ['middleware' =>'guest', function(){
    return view('auth.login');
  }]);
  
Route::middleware(['auth'])->group(function () {
    Route::get('/', 'GalleryController@index');
    Route::resource('gallery', 'GalleryController');
    Route::get('/gallery/show/{id?}', 'GalleryController@show');
    Route::resource('photo', 'PhotoController');
    Route::get('/photo/create/{id?}', 'PhotoController@create');
    Route::get('/photo/details/{id?}', 'PhotoController@details');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
