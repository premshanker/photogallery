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

    Route::get('/', 'GalleryController@index');
    Route::resource('gallery', 'GalleryController');
    Route::get('/gallery/show/{id?}', 'GalleryController@show');
    Route::get('projects/create/(company_id?)', 'ProjectsController@create');
    Route::post('/projects/adduser', 'ProjectsController@adduser')->name('projects.adduser');
    Route::resource('photo', 'PhotoController');
    Route::get('/photo/show/{id?}', 'PhotoController@show');
    Route::resource('roles', 'RolesController');
    Route::resource('tasks', 'TasksController');
    Route::resource('users', 'UsersController');
    Route::resource('comments', 'CommentsController');
