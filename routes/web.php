<?php

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

Route::get('/' , 'StaticPageController@home')->name('welcome');
Route::get('/advancedResearch' , 'StaticPageController@advancedResearch')->name('advancedResearch');
Route::get('/advancedResearch/restaurants/payment' , 'OrderController@index')->name('payment');
Route::resource('/restaurants', 'RestaurantController');
Route::resource('/advancedResearch/restaurants', 'RestaurantController');
Route::resource('/advancedResearch/restaurants/orders', 'OrderController');


Auth::routes();

/**ADMIN ROUTE HOME CONTROLLER */
// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function() {
        //home admin
        Route::get('/', 'HomeController@index')->name('dashboard');

        //rotte post CRUD
        Route::resource('plate', 'PlateController');
    });
