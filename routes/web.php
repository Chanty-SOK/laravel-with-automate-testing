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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['permission:view user']], function () {
        Route::resource('users', 'Admin\\UserController');
    });

    Route::group(['middleware' => ['permission:view role']], function () {
        Route::resource('roles', 'Admin\\RoleController');
    });

    Route::group(['middleware' => ['permission:update permission']], function () {
        Route::resource('permissions', 'Admin\\PermissionController')->except(['index', 'edit', 'destroy', 'update']);
    });
});

