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
	return App\Product::where('slug', $slug)->firstOrFail();
});
Route::bind('inventory', function($slug){
	return App\Inventory::where('slug', $slug)->firstOrFail();
});


// CLIENT ROUTE
Route::group(['prefix' => 'client', 'middleware' => ['auth']], function () {

	// user view
	Route::get('/', function () {
	    return redirect('/client/dashboard');
	})->name('user.dashboard');

	// user dashboard 
	Route::get('/dashboard', function () {
	    return view('user.dashboard');
    })->middleware('auth');

	// referred route
	Route::resource('/referred', 'ReferredController');
	
	// catalogue route
	Route::resource('/catalogue', 'CatalogueController');

	//cart route
	Route::group(['prefix' => 'cart'],	function ()	{

		// cart view
		Route::get('/', function () {
			return redirect('/client/cart/show');
		});

		// show cart route
		Route::get('/show', 'CartController@show')->name('cart.show');

		// add cart route
		Route::get('/add/{product}', 'CartController@add')->name('cart.add');

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
	Route::resource('/categories', 'AdministrationCategoryController');

	// products route
	Route::resource('/products', 'AdministrationProductController');

	Route::resource('/inventory', 'AdministrationInventoryController');

});

// USER ROUTE
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {

	// profile route
	Route::resource('/profile', 'ProfileController');
	
});

// AUTH ROUTE
Auth::routes();