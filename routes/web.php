<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Admin Route
// Route::get('/admin/login', 'Admin\AuthController@showLogin');
Route::get('/', 'Admin\AuthController@showLogin');

Route::post('/admin/login', 'Admin\AuthController@login');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'RedirectIfNotAdmin'], function () {
    Route::get('/', 'PageController@dashboard');
    Route::get('/logout', 'AuthController@logout');
    Route::resource('/programming', 'ProgrammingController');
    Route::resource('/article', 'ArticleController');
});
