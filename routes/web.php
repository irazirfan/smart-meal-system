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


//Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', ['uses'=>'LoginController@verify']);
Route::get('/register', 'HomeController@register')->name('register');
Route::post('/register', 'HomeController@signup')->name('signup');
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/home', 'HomeController@index')->name('home.index');