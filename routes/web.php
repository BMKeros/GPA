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

// Route User
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');

// Route Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('user/profile', 'ProfileController');

Route::resource('admin/users', 'AdministrationUserController');

Route::resource('admin/categories', 'AdministrationCategoriesController');

Auth::routes();
