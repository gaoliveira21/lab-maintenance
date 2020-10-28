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

Auth::routes([
    'register' => false,
    'confirm' => false,
    'reset' => false
]);

Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/logout', 'Auth\\LoginController@logout')->name('logout');

Route::resource('labs', 'LaboratoryController')->except(['show']);

Route::resource('problems', 'ProblemController')->except(['destroy']);

Route::resource('reports', 'ReportController')->except(['destroy']);

Route::resource('users', 'UserController')->except(['edit', 'update', 'show']);

Route::get('/user/edit', 'UserController@edit')->name('users.edit');
Route::put('/user/update', 'UserController@update')->name('users.update');
Route::put('/user/change-password', 'UserController@changePassword')->name('users.changePassword');
