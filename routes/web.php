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
Route::group(['middleware'=>'web'], function($app){
    Route::get('/', 'Home@index');
    Route::get('/logout', 'Logout@index');
    Route::get('/dashboard', 'Dashboard@index');
    Route::get('/dcss/dashboard', 'dcss\dashboard@index');
    Route::post('/sendmessage', 'Sendmessage@index');

    //admin
    Route::group(['prefix'=>'admin'], function($app){
       Route::get('/', 'Admin\HomeController@index')->name('home');
       Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
       Route::post('/login', 'Auth\LoginController@login')->name('login');
       Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
       Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');

       Route::get('/configs', 'Admin\ConfigsController@index')->name('configs');
       Route::get('/buttons', 'Admin\ButtonsController@index')->name('buttons');

       //Currency Admin
       Route::resource('currencies', 'Admin\CurrenciesController');
       Route::get('/currencies/{currency}/remove', 'Admin\CurrenciesController@remove')->name('currencies.remove');
       Route::resource('categories', 'Admin\CategoriesController');
       Route::get('/categories/{category}/remove', 'Admin\CategoriesController@remove')->name('categories.remove');
       Route::resource('configs', 'Admin\ConfigsController')->except(['destroy', 'create', 'store']);
       Route::resource('buttons', 'Admin\ButtonsController');
       Route::get('/buttons/{button}/remove', 'Admin\ButtonsController@remove')->name('buttons.remove');
    });
});
