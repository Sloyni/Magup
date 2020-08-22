<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('dashboard/', 'DashboardController@index')->name('dashboard');
Route::get('dashboard/{option}', 'DashboardController@index')->where('option', '.*');
Route::get('logout', 'DashboardController@logout')->name('logout');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'UserController@resetPasswordConfirm')->name('password.update');

Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');

Route::resource('stores','StoreController');
Route::get('/store/{store}', 'StoreController@show');

Route::prefix('ajax')->group(function () {
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::post('avatar', 'UserController@update_avatar');
    Route::post('password/reset', 'UserController@resetPassword');
});

Route::get('/home', 'HomeController@index')->name('home');
