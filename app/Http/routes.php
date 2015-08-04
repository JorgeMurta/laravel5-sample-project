<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// First Page (Generally called Index)
Route::get('/', 'ContactsController@getIndex');

// Routes to Add a Contact (GET and POST)
Route::get('/add', 'ContactsController@getAdd');
Route::post('/create','ContactsController@postCreate');

// Routes to Edit the Contact
Route::get('/edit/{id}', 'ContactsController@getEdit')
->where(['id' => '[0-9]+']);
Route::post('/update/{id}', 'ContactsController@postUpdate')
->where(['id' => '[0-9]+']);


Route::get('/delete/{id}', 'ContactsController@getDelete')
->where(['id' => '[0-9]+']);

// About the Project
Route::get('/about', 'StaticController@getAbout');
