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


// USER ROUTE
Route::group(['prefix' => 'user'],	function ()	{

	// user view
	Route::get('/', function () {
	    return redirect('/user/dashboard');
	})->name('user.dashboard');

	// user dashboard 
	Route::get('/dashboard', function () {
	    return view('user.dashboard');
	});

	// profile route
	Route::resource('/profile', 'ProfileController');

	// cart route
	// Route::group(['prefix' => 'cart'],	function ()	{
	// 	Route::get('/', function () {
	// 		return redirect('/show');
	// 	});

	// 	Route::get('/show', 'CartController@show');

	// });

});

// ADMIN ROUTE
Route::group(['prefix' => 'admin'],	function ()	{

	// user view
	Route::get('/', function () {
	    return redirect('/admin/dashboard');
	})->name('admin.dashboard');

	// user dashboard 
	Route::get('/dashboard', function () {
	    return view('admin.dashboard');
	});

	// users route
	Route::resource('/users', 'AdministrationUserController');

	// category route
	Route::resource('/categories', 'AdministrationCategoriesController');

	// products route
	Route::bind('/products', function($slug){
		return App\Products::where('slug', $slug)->first();
	});

	Route::resource('admin/products', 'ProductsController');

});

// AUTH ROUTE
Auth::routes();