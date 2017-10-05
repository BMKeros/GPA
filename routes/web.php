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
    return redirect('login');
});

Route::get('login', function () {
    return view('auth.login');
});

// Route User
Route::get('/user', function () {
    return view('user.home');
});

// Route Admin
Route::get('/admin', function () {
    return view('admin.home');
});

Route::resource('profiles', 'ProfileController');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
