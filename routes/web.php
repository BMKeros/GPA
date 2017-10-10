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

// products route
Route::bind('product', function($slug){
	return App\Products::where('slug', $slug)->firstOrFail();
});


// USER ROUTE
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {

	// user view
	Route::get('/', function () {
	    return redirect('/user/dashboard');
	})->name('user.dashboard');

	// user dashboard 
	Route::get('/dashboard', function () {
	    return view('user.dashboard');
    })->middleware('auth');

	// profile route
	Route::resource('/profile', 'ProfileController');


	// referred route
	Route::resource('/referred', 'ReferredController');
	
	// catalogue route
	Route::resource('/catalogue', 'CatalogueController');

	//cart route
	Route::group(['prefix' => 'cart'],	function ()	{

		// cart view
		Route::get('/', function () {
			return redirect('/user/cart/show');
		});

		// show cart route
		Route::get('/show', 'CartController@show');

		// add cart route
		Route::get('/add/{product}', 'CartController@add');

	});

});

// ADMIN ROUTE
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

	// admin view
	Route::get('/', function () {
	    return redirect('/admin/dashboard');
	})->name('admin.dashboard');

	// admin dashboard 
	Route::get('/dashboard', function () {
	    return view('admin.dashboard');
    })->middleware('auth');

	// users route
	Route::resource('/users', 'AdministrationUserController');

	// category route
	Route::resource('/categories', 'AdministrationCategoriesController');

	// products route
	Route::resource('/products', 'AdministrationProductsController');

<<<<<<< HEAD
	//inventory route
=======
	// inventory route
>>>>>>> 592103dac8c2a531aa52776158543f542edd3192
	Route::resource('/inventory', 'AdministrationInventoryController');

});

// AUTH ROUTE
Auth::routes();