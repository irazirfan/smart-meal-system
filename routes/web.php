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

Route::get('/search', 'HomeController@getEmail');

//Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', ['uses'=>'LoginController@verify']);
Route::get('/logout', 'LogoutController@index')->name('logout.index');
Route::get('/register', 'HomeController@register')->name('register');
Route::post('/register', 'HomeController@signup')->name('signup');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');

Route::group(['middleware'=>['authorize']], function(){

	Route::get('/home', 'HomeController@index')->name('home.index');
	Route::get('/expense', 'ExpenseController@expense')->name('expense.expense');
    Route::post('/expense', 'ExpenseController@add');
    Route::get('/mess', 'MessController@mess')->name('mess.mess');
    Route::get('mess/create', 'MessController@create')->name('mess.create');
    Route::post('mess/create', 'MessController@add');
    Route::get('/mess/{id}', 'MessController@viewMember')->name('mess.viewMember');
    Route::get('/mess/invitation/{id}', 'MessController@invitation')->name('mess.invitation');
    Route::get('mess/accept/{id}', 'MessController@accept')->name('mess.accept');
    Route::get('/meal', 'MealController@meal')->name('meal.meal');
    Route::post('/meal', 'MealController@update')->name('meal.update');

});
