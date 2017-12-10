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
Route::group(['prefix' => 'client', 'middleware' => ['role:USER|SOCIO']], function () {

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

	// profile route
	Route::resource('/profile', 'ProfileController');
	
	// catalogue route
	Route::resource('/catalogue', 'CatalogueController');

	// order route
	Route::resource('/order', 'OrderController');

	//request route

	Route::resource('/purchase-requests','PurchaseRequestController');

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

		// del cart route
		Route::get('/delete/{product}', 'CartController@delete')->name('cart.delete');

		// trash cart route
		Route::get('/trash', 'CartController@trash')->name('cart.trash');

		// uptate cart route
		Route::get('/update/{product}/{quantity?}', 'CartController@update')->name('cart.update');
	
	});

	//payment route
	Route::resource('/payment', 'PaymentController');
});

// ADMIN ROUTE
Route::group(['prefix' => 'admin', 'middleware' => ['role:ADMIN']], function () {

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

	//orders
	Route::resource('/order', 'AdministrationOrdersController');
	
	//purchase requests
	Route::resource('/purchase-requests', 'AdministrationPurchaseRequestController');

	//payment route
	Route::resource('/payment', 'AdministrationPaymentController');
});

//ERROR ROUTE
Route::get('/error-403', function () {
	return view('layouts.page_403');
})->name('error.403');

Route::get('/error-404', function () {
	return view('layouts.page_404');
})->name('error.404');

// AUTH ROUTE
Auth::routes();