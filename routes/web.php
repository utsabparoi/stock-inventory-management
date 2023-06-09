<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\StockController;
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
//front home view route
Route::get('/', 'HomeController@index')->name('home');

// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
//Admin
Route::get('/logout', 'UsersController@logout')->name('users.logout');

Route::middleware(['auth:sanctum'])->group(function(){
    //Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //User
    Route::resource('users', UsersController::class);
    //Category
    Route::resource('categories', CategoriesController::class);
    Route::get('/api/categories', 'CategoriesController@getCategoriesJson');
    //Product
    Route::resource('products', ProductsController::class);
    Route::get('/api/products', 'ProductsController@getProductsJson');
    //Stock
    Route::resource('stocks', StockController::class);
    //About Us
    Route::resource('about_us', AboutUsController::class);
    //User Contact info List
    Route::get('contact-list', 'ContactListController@index')->name('contact_list');
    Route::delete('contact/{id}', 'ContactListController@destroy')->name('delete_contact');
    Route::post('language/switch', 'LanguageController@switch')->name('language.switch');
});

//User Contact to Admin
Route::resource('user_contact', ContactUsController::class);
Route::get('about-us', 'HomeController@aboutUs')->name('aboutUs');
Route::get('category/{id}', 'HomeController@singleCategory')->name('single-category');




