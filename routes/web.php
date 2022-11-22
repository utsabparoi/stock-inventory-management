<?php

use Illuminate\Support\Facades\Route;
// use App\Htpp\Controllers\CategoriesController;

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
    // return view('welcome');
    return redirect('/login');
});

// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
//User
Route::get('/logout', 'UsersController@logout')->name('users.logout');

Route::middleware(['auth:sanctum'])->group(function(){
    //Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //User
    Route::resource('users', UsersController::class);
    
    //Category
    Route::resource('categories', CategoriesController::class);
    Route::get('/api/categories', 'CategoriesController@getCategoriesJson');
    //Brand
    Route::resource('brands', BrandsController::class);
    Route::get('/api/brands', 'BrandsController@getBrandsJson');
    //Size
    Route::resource('sizes', SizesController::class);
    Route::get('/api/sizes', 'SizesController@getSizesJson');
    //Product
    Route::resource('products', ProductsController::class);
    Route::get('/api/products', 'ProductsController@getProductsJson');
    //Stock
    Route::get('/stocks', 'StocksController@stock')->name('stock');
    Route::post('/stocks', 'StocksController@stockSubmit')->name('stockSubmit');
    Route::get('/stocks/history', 'StocksController@history')->name('stockHistory');

    //Return product
    Route::get('/return-products', 'ReturnProductsController@returnProduct')->name('returnProduct');
    Route::post('/return-products', 'ReturnProductsController@returnProductSubmit')->name('returnProductSubmit');
    Route::get('/return-products/history', 'ReturnProductsController@history')->name('returnProductHistory');
});
