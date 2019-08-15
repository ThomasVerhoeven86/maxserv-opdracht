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

Route::get('/', 'ToDoController@showList');

Route::get('/todo', 'ToDoController@showList');

Route::get('/home', 'ToDoController@showList');

Route::post('/updateToDoName', 'AjaxController@updateToDoName');

Route::post('/updateToDoContent', 'AjaxController@updateToDoContent');

Route::post('/updateFinished', 'AjaxController@updateFinished');

Route::post('/deleteItems', 'AjaxController@deleteItems');

Route::post('/addToDoItem', 'FormController@addToDoItem');

Route::get('loadForm', function () {
	return view('loadForm');
});


// Auth::routes();

// Authentication Routes...
Route::get('login', 'ToDoController@showList')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'ToDoController@showList')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

